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
use Medzoner\Domain\QueryHandler\ListJobBoardQueryHandler;
use Medzoner\GlobalBundle\Controller\ContactController;
use Medzoner\GlobalBundle\Controller\TechnosController;
use Medzoner\GlobalBundle\RabbitMq\Fallback;
use PhpAmqpLib\Message\AMQPMessage;
use SimpleBus\RabbitMQBundleBridge\RabbitMQMessageConsumer;
use SimpleBus\Serialization\Envelope\DefaultEnvelope;
use SimpleBus\SymfonyBridge\Bus\CommandBus;
use Swift_Message;
use Symfony\Bundle\FrameworkBundle\Routing\Router;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Dotenv\Dotenv;
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

class TechnosControllerTest extends KernelTestCase
{
    /**
     * @var RequestStack
     */
    private $requestStack;

    /**
     * @var ListJobBoardQueryHandler
     */
    private $jobBoardQueryHandler;

    /**
     * @var Environment
     */
    private $templating;

    /**
     * @var TechnosController
     */
    private $controller;

    protected function setUp(): void
    {
        $dotenv = new Dotenv();
        $dotenv->load(__DIR__.'/../../../../.env.test');
        self::bootKernel(['environment' => 'test']);
        $container = self::$kernel->getContainer();
        $this->jobBoardQueryHandler = $container->get('medzoner.jobboard.queryhandler');

        $this->requestStack = $container->get('request_stack');
        $request = new Request();
        $request->setDefaultLocale('fr');
        $this->requestStack->push($request);
        $this->templating = $container->get('twig');

        $this->controller = new TechnosController(
            $this->requestStack,
            $this->templating,
            $this->jobBoardQueryHandler
        );
    }

    /**
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function test_success(): void
    {
        $response = $this->controller->indexAction();

        $this->assertInstanceOf(Response::class, $response);
    }
}
