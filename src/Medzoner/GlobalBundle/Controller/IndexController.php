<?php

namespace Medzoner\GlobalBundle\Controller;

use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

/**
 * Class IndexController
 */
class IndexController
{
    /**
     * @var RequestStack
     */
    private $request;

    /**
     * @var Environment
     */
    private $templating;

    /**
     * IndexController constructor.
     * @param RequestStack $request
     * @param Environment $templating
     */
    public function __construct(
        RequestStack $request,
        Environment $templating
    ) {
        $this->request = $request->getMasterRequest();
        $this->templating = $templating;
    }

    /**
     * @return Response
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function indexAction(): Response
    {
        return new Response($this->templating->render('@MedzonerGlobal/Index/index.html.twig', ['footerFixed' => true]));
    }

    /**
     * @return Response
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function render(): Response
    {
        return new Response($this->templating->render('@MedzonerGlobal/Index/home.html.twig', []));
    }
}
