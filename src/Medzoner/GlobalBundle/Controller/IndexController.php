<?php

namespace Medzoner\GlobalBundle\Controller;

//use FOS\HttpCache\Handler\TagHandler;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;
use Symfony\Component\HttpFoundation\Response;

//use FOS\HttpCacheBundle\Http\SymfonyResponseTagger;
//use FOS\HttpCacheBundle\CacheManager;

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
     * @var SymfonyResponseTagger
     */
    //private $symfonyResponseTagger;

    /**
     * @var CacheManager
     */
    //private $cacheManager;

    /**
     * IndexController constructor.
     * @param RequestStack $request
     * @param EngineInterface $templating
     * @param TagHandler $symfonyResponseTagger
     * @param CacheManager $cacheManager
     */
    public function __construct(
        RequestStack $request,
        EngineInterface $templating//,
//        TagHandler $symfonyResponseTagger,
//        CacheManager $cacheManager
    )
    {
        $this->request = $request->getMasterRequest();
        $this->templating = $templating;
        //$this->symfonyResponseTagger = $symfonyResponseTagger;
        //$this->cacheManager = $cacheManager;
    }

    /**
     * @return Response
     */
    public function indexAction()
    {
        return  $this->templating->renderResponse('@MedzonerGlobal/Index/index.html.twig', ['footerFixed' => true]);
    }

    /**
     * @return Response
     */
    public function render()
    {
        //$this->symfonyResponseTagger->addTags(['homepage']);

        return  $this->templating->renderResponse('@MedzonerGlobal/Index/home.html.twig', []);
    }
}
