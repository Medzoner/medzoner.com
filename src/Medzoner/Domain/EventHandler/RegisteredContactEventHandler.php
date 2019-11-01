<?php

namespace Medzoner\Domain\EventHandler;

use DateTime;
use Exception;
use Medzoner\Domain\Event\RegisteredContactEvent;
use Medzoner\GlobalBundle\Document\ContactDocument;
use Medzoner\GlobalBundle\Repository\ContactRepositoryORM;
use Medzoner\GlobalBundle\Services\SendContactService;
use \Medzoner\Domain\ModelRead\SendContactModelRead;

/**
 * Class RegisteredContactEventHandler
 */
class RegisteredContactEventHandler
{
    /**
     * @var SendContactService
     */
    private $sendContactService;

    /**
     * @var ContactRepositoryORM
     */
    private $contactRepository;

    /**
     * RegisteredContactEventHandler constructor.
     *
     * @param SendContactService $sendContactService
     * @param ContactRepositoryORM $contactRepository
     */
    public function __construct(
        SendContactService $sendContactService,
        ContactRepositoryORM $contactRepository
    ) {
        $this->sendContactService = $sendContactService;
        $this->contactRepository = $contactRepository;
    }

    /**
     * @param RegisteredContactEvent $event
     * @throws Exception
     */
    public function handle(RegisteredContactEvent $event)
    {
        $contact = $event->getContact();

        $contactDocument = new ContactDocument();
        $contactDocument
            ->setName($contact->getName())
            ->setMessage($contact->getMessage())
            ->setEmail($contact->getEmail())
            ->setDateAdd(new DateTime('now'))
        ;
        $this->contactRepository->save($contactDocument);

        $sendContact = new SendContactModelRead();
        $sendContact
            ->setName($contact->getName())
            ->setMessage($contact->getMessage())
            ->setEmail($contact->getEmail())
            ->setDateAdd(new DateTime('now'))
        ;

        $this->sendContactService->send($sendContact);
    }
}
