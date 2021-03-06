<?php

namespace Medzoner\Domain\CommandHandler;

use DateTime;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use JMS\Serializer\Serializer;
use Medzoner\Domain\Command\RegisterContactCommand;
use Medzoner\Domain\Event\RegisteredContactEvent;
use Medzoner\GlobalBundle\Entity\Contact;
use Medzoner\GlobalBundle\Repository\ContactRepositoryORM;
use SimpleBus\Message\Bus\MessageBus;
use SimpleBus\Message\Recorder\RecordsMessages;

/**
 * Class RegisterContactCommandHandler
 */
class RegisterContactCommandHandler
{
    /**
     * @var ContactRepositoryORM
     */
    private $contactRepository;

    /**
     * @var RecordsMessages
     */
    private $eventBus;

    /**
     * @var Serializer
     */
    private $serializer;

    /**
     * RegisterContactCommandHandler constructor.
     * @param ContactRepositoryORM $contactRepository
     * @param MessageBus $eventBus
     * @param $serializer
     */
    public function __construct(
        ContactRepositoryORM $contactRepository,
        MessageBus $eventBus,
        Serializer $serializer
    ) {
        $this->contactRepository = $contactRepository;
        $this->eventBus = $eventBus;
        $this->serializer = $serializer;
    }

    /**
     * @param RegisterContactCommand $contactCommand
     * @return Contact
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function handle(RegisterContactCommand $contactCommand)
    {
        $contact = new Contact();
        $contact
            ->setDateAdd($contactCommand->getDateAdd())
            ->setEmail($contactCommand->getEmail())
            ->setMessage($contactCommand->getMessage())
            ->setName($contactCommand->getName())
        ;

        $this->contactRepository->save($contact);

        $event = new RegisteredContactEvent();
        $event->setContact($contact);

        $this->eventBus->handle($event);

        return $contact;
    }
}
