<?php

namespace Medzoner\Domain\EventHandler;

use Medzoner\Domain\Event\RegisteredContactEvent;
use Medzoner\GlobalBundle\Document\ContactDocument;
use Medzoner\GlobalBundle\Repository\ContactRepositoryODM;
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
     * @var ContactRepositoryODM
     */
    private $contactRepositoryODM;

    /**
     * RegisteredContactEventHandler constructor.
     *
     * @param SendContactService $sendContactService
     * @param ContactRepositoryODM $contactRepositoryODM
     */
    public function __construct(
        SendContactService $sendContactService,
        ContactRepositoryODM $contactRepositoryODM
    )
    {
        $this->sendContactService = $sendContactService;
        $this->contactRepositoryODM = $contactRepositoryODM;
    }

    /**
     * @param RegisteredContactEvent $event
     */
    public function handle(RegisteredContactEvent $event)
    {
        $contact = $event->getContact();

        $contactDocument = new ContactDocument();
        $contactDocument
            ->setName($contact->getName())
            ->setMessage($contact->getMessage())
            ->setEmail($contact->getEmail())
            ->setDateAdd(new \DateTime('now'))
        ;
        $this->contactRepositoryODM->save($contactDocument);

        $sendContact = new SendContactModelRead();
        $sendContact
            ->setName($contact->getName())
            ->setMessage($contact->getMessage())
            ->setEmail($contact->getEmail())
            ->setDateAdd(new \DateTime('now'))
        ;

        $this->sendContactService->send($sendContact);
    }
}
