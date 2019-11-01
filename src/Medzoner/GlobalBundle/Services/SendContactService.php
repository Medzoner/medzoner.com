<?php

namespace Medzoner\GlobalBundle\Services;

use \Medzoner\Domain\ModelRead\SendContactModelRead;
use Swift_Mailer;
use Swift_Message;
use Symfony\Component\Templating\EngineInterface;

/**
 * Class SendContactService
 */
class SendContactService
{
    /**
     * @var Swift_Mailer
     */
    private $mailer;

    /**
     * @var EngineInterface
     */
    private $templating;

    /**
     * SendContactCommand constructor.
     *
     * @param EngineInterface $templating
     * @param Swift_Mailer $mailer
     */
    public function __construct(
        EngineInterface $templating,
        Swift_Mailer $mailer
    ) {
        $this->mailer = $mailer;
        $this->templating = $templating;
    }

    /**
     * @param SendContactModelRead $sendContact
     * @return Swift_Message
     */
    public function send(SendContactModelRead $sendContact)
    {
        $message = Swift_Message::newInstance()
            ->setSubject('Contact site')
            ->setFrom('medzux@gmail.com')
            ->setTo('medzux@gmail.com')
            ->setBody(
                $this->templating->render(
                    'MedzonerGlobalBundle:Contact:contactEmail.txt.twig',
                    [
                        'enquiry' => $sendContact
                    ]
                )
            );

        $this->mailer->send($message);

        return $message;
    }
}
