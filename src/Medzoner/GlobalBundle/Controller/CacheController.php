<?php

namespace Medzoner\GlobalBundle\Controller;

use FOS\HttpCache\Handler\TagHandler;
use FOS\HttpCacheBundle\CacheManager;
use Symfony\Bundle\TwigBundle\TwigEngine;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class CacheController
 */
class CacheController
{
    /**
     * @var null|Request
     */
    public $request;

    /**
     * @var TwigEngine
     */
    private $templating;

    /**
     * @var array
     */
    private $groupsKeys;
    /**
     * @var RequestStack
     */
    private $requestStack;

    /**
     * CacheController constructor.
     * @param RequestStack $requestStack
     * @param TwigEngine $templating
     * @param TagHandler $cacheManager
     * @param array $groupsKeys
     */
    public function __construct(
        RequestStack $requestStack,
        TwigEngine $templating,
        TagHandler $cacheManager,
        array $groupsKeys
    )
    {
        $this->templating = $templating;
        $this->request = $requestStack ? $requestStack->getMasterRequest() : null;
        $this->groupsKeys = $groupsKeys;
        $this->cacheManager = $cacheManager;
        $this->requestStack = $requestStack;
    }

    /**
     * @return Response
     */
    public function indexAction()
    {
        $tags = ['homepage'];
        if ($tags)
            $this->cacheManager->invalidateTags(['homepage']);

        return new JsonResponse(['cache-invalidated' => true, 'keys' => $tags], Response::HTTP_OK);
    }
}
