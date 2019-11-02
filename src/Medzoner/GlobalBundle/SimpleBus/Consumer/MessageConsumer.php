<?php

namespace Medzoner\GlobalBundle\SimpleBus\Consumer;

use Doctrine\ORM\EntityManagerInterface;
use Exception;
use PhpAmqpLib\Message\AMQPMessage;
use Psr\Log\LoggerInterface;
use SimpleBus\Asynchronous\Consumer\SerializedEnvelopeConsumer;
use SimpleBus\Message\CallableResolver\Exception\UndefinedCallable;
use SimpleBus\RabbitMQBundleBridge\RabbitMQMessageConsumer;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * Class MessageConsumer
 */
class MessageConsumer extends RabbitMQMessageConsumer
{
    /**
     * @var LoggerInterface
     */
    private $logger;
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * MessageConsumer constructor.
     * @param SerializedEnvelopeConsumer $consumer
     * @param EventDispatcherInterface $eventDispatcher
     * @param LoggerInterface $logger
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(
        SerializedEnvelopeConsumer $consumer,
        EventDispatcherInterface $eventDispatcher,
        LoggerInterface $logger,
        EntityManagerInterface $entityManager
    ) {
        parent::__construct($consumer, $eventDispatcher);
        $this->logger = $logger;
        $this->entityManager = $entityManager;
    }

    /**
     * Flag for message ack when failed for stop consuming
     */
    public const MSG_ACK_FAILED = 3;

    /**
     * @param AMQPMessage $msg
     * @return int|mixed
     */
    public function execute(AMQPMessage $msg)
    {
        $this->restartEntityManagerConnection();

        try {
            parent::execute($msg);
            $this->logger->info('MessageConsumer ok');
            return self::MSG_ACK;
        } catch (UndefinedCallable $exception) {
            $this->logger->info(sprintf('MessageConsumer message not handleable: %s', $exception->getMessage()));
            return self::MSG_ACK;
        } catch (Exception $exception) {
            $this->logger->error(sprintf('MessageConsumer Throwable exception message: %s', $exception->getMessage()));
            return self::MSG_REJECT;
        }
    }

    /**
     * Restart the connection for bypass the problem of wait_timeout MySql.
     */
    private function restartEntityManagerConnection(): void
    {
        try {
            $this->entityManager->getConnection()->close();
            $this->logger->info('[MESSAGE_CONSUMER] CLOSING EntityManager close connection success');
        } catch (\Exception $e) {
            $this->logger->info('[MESSAGE_CONSUMER] CLOSING EntityManager error on close connection');
        }
        try {
            $this->entityManager->getConnection()->connect();
            $this->logger->info('[MESSAGE_CONSUMER] BBB EntityManager connection success');
        } catch (\Exception $e) {
            $this->logger->info('[MESSAGE_CONSUMER] CCC EntityManager error on connect');
        }
    }
}
