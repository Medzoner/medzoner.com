<?php

namespace Tests\Functionnal\GlobalBundle\Controller;

use Medzoner\Domain\QueryHandler\ListJobBoardQueryHandler;
use Medzoner\GlobalBundle\Controller\TechnosController;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Dotenv\Dotenv;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class TechnosControllerTest extends KernelTestCase
{
    /**
     * @var RequestStack
     */
    private $requestStack;

    /**
     * @var ListJobBoardQueryHandler
     */
    private $jobBoardQueryHandler;

    /**
     * @var Environment
     */
    private $templating;

    /**
     * @var TechnosController
     */
    private $controller;

    protected function setUp(): void
    {
        $dotenv = new Dotenv();
        $dotenv->load(__DIR__.'/../../../../.env.test');
        self::bootKernel(['environment' => 'test']);
        $container = self::$kernel->getContainer();
        $this->jobBoardQueryHandler = $container->get('medzoner.jobboard.queryhandler');

        $this->requestStack = $container->get('request_stack');
        $request = new Request();
        $request->setDefaultLocale('fr');
        $this->requestStack->push($request);
        $this->templating = $container->get('twig');

        $this->controller = new TechnosController(
            $this->requestStack,
            $this->templating,
            $this->jobBoardQueryHandler
        );
    }

    /**
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function test_success(): void
    {
        $response = $this->controller->indexAction();

        $this->assertInstanceOf(Response::class, $response);
    }
}
