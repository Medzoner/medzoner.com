<?php

namespace Tests\Unit\GlobalBundle\Services;

use DateTime;
use Medzoner\Domain\ModelRead\SendContactModelRead;
use Medzoner\GlobalBundle\Services\SendContactService;
use PHPUnit\Framework\TestCase;
use Swift_Mailer;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Loader\FilesystemLoader;

class SendContactServiceTest extends TestCase
{
    /**
     * @var SendContactService
     */
    private $sendContactService;

    protected function setUp(): void
    {
        $this->mailer = $this->prophesize(Swift_Mailer::class);
        $loader = new FilesystemLoader(['MedzonerGlobal' => 'src/Medzoner/GlobalBundle/Resources/views']);
        $loader->setPaths(['src/Medzoner/GlobalBundle/Resources/views'], 'MedzonerGlobal');
        $twig = new Environment($loader);
        $this->sendContactService = new SendContactService($twig, $this->mailer->reveal());
    }

    /**
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function test_success()
    {
        $contact = (new SendContactModelRead())
            ->setEmail('email@email.com')
            ->setName('a name')
            ->setMessage('a message')
            ->setDateAdd(new DateTime('now'));
        $message = $this->sendContactService->send($contact);
        $this->assertContains($contact->getName(), $message->getBody());
        $this->assertContains($contact->getMessage(), $message->getBody());
        $this->assertContains($contact->getEmail(), $message->getBody());
        $this->assertContains($contact->getDateAdd()->format('Y-m-d'), $message->getBody());
    }
}
