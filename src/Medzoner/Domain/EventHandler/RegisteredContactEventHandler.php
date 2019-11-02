<?php

namespace Medzoner\Domain\EventHandler;

use DateTime;
use Exception;
use Medzoner\Domain\Event\RegisteredContactEvent;
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
     * RegisteredContactEventHandler constructor.
     *
     * @param SendContactService $sendContactService
     */
    public function __construct(
        SendContactService $sendContactService
    ) {
        $this->sendContactService = $sendContactService;
    }

    /**
     * @param RegisteredContactEvent $event
     * @throws Exception
     */
    public function handle(RegisteredContactEvent $event)
    {
        $contact = $event->getContact();

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
