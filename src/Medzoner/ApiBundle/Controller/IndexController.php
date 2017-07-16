<?php

namespace Medzoner\ApiBundle\Controller;

use FOS\HttpCache\Handler\TagHandler;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;
use Symfony\Component\HttpFoundation\Response;

use FOS\HttpCacheBundle\CacheManager;

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
     * @var TagHandler
     */
    private $symfonyResponseTagger;

    /**
     * @var CacheManager
     */
    private $cacheManager;

    /**
     * IndexController constructor.
     * @param RequestStack $request
     * @param EngineInterface $templating
     * @param TagHandler $symfonyResponseTagger
     * @param CacheManager $cacheManager
     */
    public function __construct(
        RequestStack $request,
        EngineInterface $templating,
        TagHandler $symfonyResponseTagger,
        CacheManager $cacheManager
    )
    {
        $this->request = $request->getMasterRequest();
        $this->templating = $templating;
        $this->symfonyResponseTagger = $symfonyResponseTagger;
        $this->cacheManager = $cacheManager;
    }

    /**
     * @return Response
     */
    public function indexAction()
    {
        return  $this->templating->renderResponse('@MedzonerApi/Index/index.html.twig', []);
    }

    /**
     * @return Response
     */
    public function indexHtml()
    {
        $this->symfonyResponseTagger->addTags(['homepage']);

        return  $this->templating->renderResponse('@MedzonerApi/Index/home.html.twig', []);
    }
}
