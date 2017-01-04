<?php

namespace Medzoner\GlobalBundle\Controller;

use Medzoner\Domain\QueryHandler\ListJobBoardQueryHandler;
use Medzoner\Domain\Query\ListJobBoardQuery;
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class CvController
 */
class CvController
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
     * @var ListJobBoardQueryHandler
     */
    private $jobBoardQueryHandler;

    /**
     * CvController constructor.
     *
     * @param RequestStack $request
     * @param EngineInterface $templating
     * @param ListJobBoardQueryHandler $jobBoardQueryHandler
     */
    public function __construct(
        RequestStack $request,
        EngineInterface $templating,
        ListJobBoardQueryHandler $jobBoardQueryHandler
    )
    {
        $this->request = $request->getMasterRequest();

        $this->templating = $templating;

        $this->jobBoardQueryHandler = $jobBoardQueryHandler;
    }

    /**
     * @return Response
     */
    public function indexAction()
    {
        $query = new ListJobBoardQuery(
            $this->request->request->all()
        );

        $jobBoard = $this->jobBoardQueryHandler->handle($query);

        return $this->templating->renderResponse(
            'MedzonerGlobalBundle:Cv:index.html.twig',
            [
                'jobboard' => $jobBoard
            ]
        );
    }
}
