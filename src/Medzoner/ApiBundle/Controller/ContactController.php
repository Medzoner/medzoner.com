<?php

namespace Medzoner\ApiBundle\Controller;

use FOS\RestBundle\View\View;
use FOS\RestBundle\View\ViewHandler;
use Medzoner\Domain\Query\ListContactQuery;
use Medzoner\Domain\QueryHandler\ListContactQueryHandler;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class ContactController
 */
class ContactController
{
    /**
     * @var RequestStack
     */
    private $request;
    /**
     * @var ListContactQueryHandler
     */
    private $listContactQueryHandler;
    /**
     * @var ViewHandler
     */
    private $viewHandler;

    /**
     * IndexController constructor.
     *
     * @param RequestStack $request
     * @param ViewHandler $viewHandler
     * @param ListContactQueryHandler $listContactQueryHandler
     */
    public function __construct(
        RequestStack $request,
        ViewHandler $viewHandler,
        ListContactQueryHandler $listContactQueryHandler
    )
    {
        $this->request = $request->getMasterRequest();
        $this->listContactQueryHandler = $listContactQueryHandler;
        $this->viewHandler = $viewHandler;
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function contactAction(Request $request)
    {
        $contacts = $this->listContactQueryHandler->handle(new ListContactQuery([]));

        return $this->viewHandler->handle(View::create($contacts, Response::HTTP_OK));
    }
}
