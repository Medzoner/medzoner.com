<?php

namespace Medzoner\Domain\EventHandler;

use Medzoner\Domain\Command\SendContactCommand;
use Medzoner\Domain\Event\RegisteredContactEvent;
use SimpleBus\Message\Bus\MessageBus;

/**
 * Class RegisteredContactEventHandler
 */
class RegisteredContactEventHandler
{
    /**
     * @var MessageBus
     */
    private $messageBus;

    /**
     * RegisteredContactEventHandler constructor.
     * @param MessageBus $messageBus
     */
    public function __construct(
        MessageBus $messageBus
    )
    {
        $this->messageBus = $messageBus;
    }

    /**
     * @param RegisteredContactEvent $event
     */
    public function handle(RegisteredContactEvent $event)
    {
        $contact = $event->getContact();

        $sendContactCommand = new SendContactCommand();
        $sendContactCommand
            ->setName($contact->getName())
            ->setMessage($contact->getMessage())
            ->setEmail($contact->getEmail())
            ->setDateAdd(new \DateTime('now'))
        ;

        $this->messageBus->handle($sendContactCommand);
    }
}
