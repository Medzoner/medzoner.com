<?php

namespace Tests\Functionnal\GlobalBundle\Controller;

use Doctrine\Common\DataFixtures\Executor\ORMExecutor;
use Doctrine\Common\DataFixtures\Purger\ORMPurger;
use Doctrine\DBAL\Schema\SchemaException;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\SchemaTool;
use Doctrine\ORM\Tools\ToolsException;
use Exception;
use JMS\Serializer\Serializer;
use M6Web\Component\RedisMock\RedisMock;
use Medzoner\Domain\Command\RegisterContactCommand;
use Medzoner\Domain\Event\RegisteredContactEvent;
use Medzoner\GlobalBundle\Controller\ContactController;
use Medzoner\GlobalBundle\RabbitMq\Fallback;
use PhpAmqpLib\Message\AMQPMessage;
use SimpleBus\RabbitMQBundleBridge\RabbitMQMessageConsumer;
use SimpleBus\Serialization\Envelope\DefaultEnvelope;
use SimpleBus\SymfonyBridge\Bus\CommandBus;
use Swift_Message;
use Symfony\Bundle\FrameworkBundle\Routing\Router;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Form\FormFactory;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class ContactControllerTest extends KernelTestCase
{
    /**
     * @var Serializer
     */
    private $serializer;

    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * @var Fallback
     */
    private $eventProducer;

    /**
     * @var RabbitMQMessageConsumer
     */
    private $eventConsumer;

    /**
     * @var RedisMock
     */
    private $redis;

    /**
     * @var RabbitMQMessageConsumer
     */
    private $commandConsumer;

    /**
     * @var Fallback
     */
    private $commandProducer;

    /**
     * @var Request
     */
    private $request;

    /**
     * @var ContactController
     */
    private $controller;

    /**
     * @var Router
     */
    private $router;

    /**
     * @var Session
     */
    private $session;

    /**
     * @var FormFactory
     */
    private $formFactory;

    /**
     * @var Environment
     */
    private $templating;

    /**
     * @var RequestStack
     */
    private $requestStack;

    /**
     * @var CommandBus
     */
    private $commandBus;

    protected function setUp(): void
    {
        self::bootKernel();
        $container = self::$kernel->getContainer();
        $this->commandBus = $container->get('command_bus');
        $this->requestStack = $container->get('request_stack');
        $this->templating = $container->get('twig');
        $this->formFactory = $container->get('form.factory');
        $this->session = $container->get('session');
        $this->router = $container->get('router');
        $this->commandProducer = $container->get('old_sound_rabbit_mq.asynchronous_commands_producer');
        $this->eventProducer = $container->get('old_sound_rabbit_mq.asynchronous_events_producer');
        $this->commandConsumer = $container->get('simple_bus.rabbit_mq_bundle_bridge.commands_consumer');
        $this->eventConsumer = $container->get('simple_bus.rabbit_mq_bundle_bridge.events_consumer');
        $this->serializer = $container->get('simple_bus.asynchronous.object_serializer');
        $this->em = $container->get('doctrine')->getManager();
        $this->redis = $container->get('predis_mocked');

        $this->request = new Request();
        $this->request->setDefaultLocale('fr');
        $this->requestStack->push($this->request);

        $this->controller = new ContactController(
            $this->requestStack,
            $this->templating,
            $this->formFactory,
            $this->session,
            $this->router,
            $this->commandBus
        );
    }

    /**
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function test_without_submit_form(): void
    {
        $response = $this->controller->contactAction($this->requestStack->getMasterRequest());

        $this->assertInstanceOf(Response::class, $response);
    }

    /**
     * @throws SchemaException
     * @throws ToolsException
     * @throws Exception
     */
    public function test_with_submitted_form(): void
    {
        $form = [
            'name' => 'a name',
            'email' => 'toto@toto.com',
            'message' => 'a message'
        ];
        $this->request->setMethod(Request::METHOD_POST);
        $this->request->request->set('registration', $form);
        $response = $this->controller->contactAction($this->requestStack->getMasterRequest());
        $this->assertInstanceOf(RedirectResponse::class, $response);

        $commandMsgBody = $this->commandProducer->messages[0]['body'];

        /** @var DefaultEnvelope $commandEnvelope */
        $commandEnvelope = $this->serializer->deserialize($commandMsgBody, DefaultEnvelope::class, 'json');

        $command = $this->serializer->deserialize($commandEnvelope->serializedMessage(), $commandEnvelope->messageType(), 'json');
        $this->assertInstanceOf(RegisterContactCommand::class, $command);

        $this->resetBdd();
        $commandMessage =  new AMQPMessage();
        $commandMessage->body = $commandMsgBody;
        $this->commandConsumer->execute($commandMessage);

        $eventMsgBody = $this->eventProducer->messages[0]['body'];

        /** @var DefaultEnvelope $eventEnvelope */
        $eventEnvelope = $this->serializer->deserialize($eventMsgBody, DefaultEnvelope::class, 'json');

        $event = $this->serializer->deserialize($eventEnvelope->serializedMessage(), $eventEnvelope->messageType(), 'json');
        $this->assertInstanceOf(RegisteredContactEvent::class, $event);

        $eventMessage =  new AMQPMessage();
        $eventMessage->body = $eventMsgBody;
        $this->eventConsumer->execute($eventMessage);

        $mailSerialized = $this->redis->getData()['swiftmailer'][0];
        /** @var Swift_Message $mail */
        $mail = unserialize($mailSerialized);
        $this->assertInstanceOf(Swift_Message::class, $mail);
        $this->assertContains($form['name'], $mail->getBody());
        $this->assertContains($form['email'], $mail->getBody());
        $this->assertContains($form['message'], $mail->getBody());
    }

    /**
     * @throws SchemaException
     * @throws ToolsException
     * @throws Exception
     */
    public function resetBdd(): void
    {
        $metadata  = $this->em->getMetadataFactory()->getAllMetadata();
        if (empty($metadata)) {
            throw new SchemaException('No Metadata Classes to process.');
        }
        $tool = new SchemaTool($this->em);
        $tool->dropSchema($metadata);
        $tool->createSchema($metadata);
        $purger = new ORMPurger();
        $executor = new ORMExecutor($this->em, $purger);
        $executor->purge();
    }
}
