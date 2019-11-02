<?php

namespace Medzoner\GlobalBundle\Controller;

use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;
use Symfony\Component\HttpFoundation\Response;

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
     * @var EngineInterface
     */
    private $templating;

    /**
     * IndexController constructor.
     * @param RequestStack $request
     * @param EngineInterface $templating
     */
    public function __construct(
        RequestStack $request,
        EngineInterface $templating
    ) {
        $this->request = $request->getMasterRequest();
        $this->templating = $templating;
    }

    /**
     * @return Response
     */
    public function indexAction(): Response
    {
        return  $this->templating->renderResponse('@MedzonerGlobal/Index/index.html.twig', ['footerFixed' => true]);
    }

    /**
     * @return Response
     */
    public function render(): Response
    {
        return  $this->templating->renderResponse('@MedzonerGlobal/Index/home.html.twig', []);
    }
}
