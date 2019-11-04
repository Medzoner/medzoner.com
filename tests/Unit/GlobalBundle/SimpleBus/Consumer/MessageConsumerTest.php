<?php

namespace Tests\Unit\GlobalBundle\SimpleBus\Consumer;

use Doctrine\DBAL\Connection;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Medzoner\GlobalBundle\SimpleBus\Consumer\MessageConsumer;
use Monolog\Handler\TestHandler;
use Monolog\Logger;
use PhpAmqpLib\Message\AMQPMessage;
use PHPUnit\Framework\TestCase;
use Prophecy\Argument;
use Psr\Log\LoggerInterface;
use SimpleBus\Asynchronous\Consumer\SerializedEnvelopeConsumer;
use SimpleBus\Message\CallableResolver\Exception\UndefinedCallable;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Tests\TestCommon;

/**
 * Class MessageConsumerTest
 */
class MessageConsumerTest extends TestCase
{
    /**
     * @var MessageConsumer
     */
    private $messageConsumer;

    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;

    /**
     * @var SerializedEnvelopeConsumer
     */
    private $consumer;

    protected function setUp(): void
    {
        $this->consumer = $this->prophesize(SerializedEnvelopeConsumer::class);
        $this->eventDispatcher = $this->prophesize(EventDispatcherInterface::class);
        $this->logger = new Logger('test');
        $this->logger->pushHandler(new TestHandler());
        $this->entityManager = $this->prophesize(EntityManagerInterface::class);
        $this->messageConsumer = new MessageConsumer(
            $this->consumer->reveal(),
            $this->eventDispatcher->reveal(),
            $this->logger,
            $this->entityManager->reveal()
        );
    }

    public function test_success()
    {
        $connection = $this->prophesize(Connection::class);
        $this->entityManager->getConnection()->willReturn($connection->reveal());
        $connection->close()->shouldBeCalled();
        $connection->connect()->shouldBeCalled();
        $commandMessage =  new AMQPMessage();
        $commandMessage->body = '{}';
        $this->messageConsumer->execute($commandMessage);

        $logs = TestCommon::getMessageFromLogger($this->logger);
        $this->assertContains(sprintf('[MESSAGE_CONSUMER] EntityManager close connection success'), $logs);
        $this->assertContains(sprintf('[MESSAGE_CONSUMER] EntityManager connection success'), $logs);
        $this->assertContains(sprintf('MessageConsumer ok'), $logs);
    }

    public function test_fail_when_undefinedCallable()
    {
        $connection = $this->prophesize(Connection::class);
        $this->entityManager->getConnection()->willReturn($connection->reveal());
        $connection->close()->shouldBeCalled();
        $connection->connect()->shouldBeCalled();
        $this->eventDispatcher->dispatch(Argument::any(), Argument::any())->willThrow(new Exception());
        $this->eventDispatcher->dispatch(Argument::any(), Argument::any())->willThrow(new UndefinedCallable());
        $commandMessage =  new AMQPMessage();
        $commandMessage->body = '{}';
        $this->messageConsumer->execute($commandMessage);

        $logs = TestCommon::getMessageFromLogger($this->logger);
        $this->assertContains(sprintf('MessageConsumer message not handleable: '), $logs);
    }

    public function test_fail_when_error()
    {
        $connection = $this->prophesize(Connection::class);
        $this->entityManager->getConnection()->willReturn($connection->reveal());
        $connection->close()->shouldBeCalled();
        $connection->connect()->shouldBeCalled();
        $this->eventDispatcher->dispatch(Argument::any(), Argument::any())->willThrow(new Exception());
        $this->eventDispatcher->dispatch(Argument::any(), Argument::any())->willThrow(new Exception());
        $commandMessage =  new AMQPMessage();
        $commandMessage->body = '{}';
        $this->messageConsumer->execute($commandMessage);

        $logs = TestCommon::getMessageFromLogger($this->logger);
        $this->assertContains(sprintf('essageConsumer Throwable exception message: '), $logs);
    }

    public function test_fail_on_close_db()
    {
        $connection = $this->prophesize(Connection::class);
        $this->entityManager->getConnection()->willReturn($connection->reveal());
        $connection->close()->willThrow(new Exception());
        $commandMessage =  new AMQPMessage();
        $commandMessage->body = '{}';
        $this->messageConsumer->execute($commandMessage);

        $logs = TestCommon::getMessageFromLogger($this->logger);
        $this->assertContains(sprintf('[MESSAGE_CONSUMER] EntityManager error on close connection'), $logs);
    }

    public function test_fail_on_connect_db()
    {
        $connection = $this->prophesize(Connection::class);
        $this->entityManager->getConnection()->willReturn($connection->reveal());
        $connection->close()->shouldBeCalled();
        $connection->connect()->willThrow(new Exception());
        $commandMessage =  new AMQPMessage();
        $commandMessage->body = '{}';
        $this->messageConsumer->execute($commandMessage);

        $logs = TestCommon::getMessageFromLogger($this->logger);
        $this->assertContains(sprintf('[MESSAGE_CONSUMER] EntityManager error on connect'), $logs);
    }
}
