<?php

namespace Medzoner\ApiBundle\Controller;

use FOS\ElasticaBundle\Finder\TransformedFinder;
use FOS\ElasticaBundle\Manager\RepositoryManager;
use FOS\RestBundle\View\View;
use FOS\RestBundle\View\ViewHandler;
use Medzoner\Domain\Query\ListContactQuery;
use Medzoner\Domain\QueryHandler\ListContactQueryHandler;
use Medzoner\GlobalBundle\Entity\Contact;
use Medzoner\GlobalBundle\Repository\ContactRepositoryElastica;
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
     * @var ContactRepositoryElastica
     */
    private $contactRepository;

    /**
     * ContactController constructor.
     *
     * @param RequestStack $request
     * @param ViewHandler $viewHandler
     * @param ListContactQueryHandler $listContactQueryHandler
     * @param ContactRepositoryElastica $contactRepository
     */
    public function __construct(
        RequestStack $request,
        ViewHandler $viewHandler,
        ListContactQueryHandler $listContactQueryHandler,
        ContactRepositoryElastica $contactRepository
    )
    {
        $this->request = $request->getMasterRequest();
        $this->listContactQueryHandler = $listContactQueryHandler;
        $this->viewHandler = $viewHandler;
        $this->contactRepository = $contactRepository;
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

    /**
     * @param Request $request
     * @return Response
     */
    public function searchAction(Request $request)
    {
        $q = $request->query->get('q', null);
        //$contacts = $this->listContactQueryHandler->handle(new ListContactQuery([]));

        $contacts = $this->contactRepository->search($q);

        return $this->viewHandler->handle(View::create($contacts, Response::HTTP_OK));
    }
}
