<?php

namespace Medzoner\GlobalBundle\Services;

use \Medzoner\Domain\ModelRead\SendContactModelRead;
use Swift_Mailer;
use Swift_Message;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

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
     * @var Environment
     */
    private $templating;

    /**
     * SendContactCommand constructor.
     *
     * @param Environment $templating
     * @param Swift_Mailer $mailer
     */
    public function __construct(
        Environment $templating,
        Swift_Mailer $mailer
    ) {
        $this->mailer = $mailer;
        $this->templating = $templating;
    }

    /**
     * @param SendContactModelRead $sendContact
     * @return Swift_Message
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function send(SendContactModelRead $sendContact)
    {
        $message = (new Swift_Message())
            ->setSubject('Contact site')
            ->setFrom('medzux@gmail.com')
            ->setTo('medzux@gmail.com')
            ->setBody(
                $this->templating->render(
                    '@MedzonerGlobal/Contact/contactEmail.txt.twig',
                    [
                        'enquiry' => $sendContact
                    ]
                )
            );

        $this->mailer->send($message);

        return $message;
    }
}
