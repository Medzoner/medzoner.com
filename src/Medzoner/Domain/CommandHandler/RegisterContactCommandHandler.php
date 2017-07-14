<?php

namespace Medzoner\Domain\CommandHandler;
use Medzoner\Domain\Command\RegisterContactCommand;
use Medzoner\Domain\Command\SendContactCommand;
use Medzoner\Domain\Event\RegisteredContactEvent;
use Medzoner\GlobalBundle\Entity\Contact;
use Medzoner\GlobalBundle\Event\RegisterContactEvent;
use Medzoner\GlobalBundle\Repository\ContactRepository;
use SimpleBus\Message\Bus\MessageBus;
use Symfony\Component\Templating\EngineInterface;

/**
 * Class RegisterContactCommandHandler
 */
class RegisterContactCommandHandler
{
    /**
     * @var ContactRepository
     */
    private $contactRepository;

    /**
     * @var MessageBus
     */
    private $eventBus;

    /**
     * SendContactCommand constructor.
     *
     * @param ContactRepository $contactRepository
     * @param MessageBus $eventBus
     */
    public function __construct(
        ContactRepository $contactRepository,
        MessageBus $eventBus
    )
    {
        $this->contactRepository = $contactRepository;
        $this->eventBus = $eventBus;
    }

    /**
     * @param RegisterContactCommand $contactCommand
     * @return Contact
     */
    public function handle(RegisterContactCommand $contactCommand) {
        $contact = new Contact();
        $contact
            ->setDateAdd(new \DateTime('now'))
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
