<?php

namespace Medzoner\Domain\CommandHandler;

use Medzoner\Domain\Command\SendContactCommand;
use Symfony\Component\Templating\EngineInterface;

/**
 * Class SendContactCommandHandler
 */
class SendContactCommandHandler
{
    /**
     * @var \Swift_Mailer
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
     * @param \Swift_Mailer $mailer
     */
    public function __construct(
        EngineInterface $templating,
        \Swift_Mailer $mailer
    )
    {
        $this->mailer = $mailer;
        $this->templating = $templating;
    }

    /**
     * @param SendContactCommand $sendContactCommand
     * @return \Swift_Message
     */
    public function handle(SendContactCommand $sendContactCommand) {
        $message = \Swift_Message::newInstance()
            ->setSubject('Contact site')
            ->setFrom('medzux@gmail.com')
            ->setTo('medzux@gmail.com')
            ->setBody($this->templating->render(
                'MedzonerGlobalBundle:Contact:contactEmail.txt.twig', ['enquiry' =>
                    $sendContactCommand
                ]
            )
            );

        $this->mailer->send($message);

        return $message;
    }
}
