<?php

namespace Tests\Functionnal\GlobalBundle\Controller;

use Medzoner\GlobalBundle\Controller\IndexController;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Dotenv\Dotenv;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class IndexControllerTest extends KernelTestCase
{
    /**
     * @var RequestStack
     */
    private $requestStack;

    /**
     * @var Environment
     */
    private $templating;

    /**
     * @var IndexController
     */
    private $controller;

    protected function setUp(): void
    {
        $dotenv = new Dotenv();
        $dotenv->load(__DIR__.'/../../../../.env.test');
        self::bootKernel(['environment' => 'test']);
        $container = self::$kernel->getContainer();

        $this->requestStack = $container->get('request_stack');
        $request = new Request();
        $request->setDefaultLocale('fr');
        $this->requestStack->push($request);
        $this->templating = $container->get('twig');

        $this->controller = new IndexController(
            $this->requestStack,
            $this->templating
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
