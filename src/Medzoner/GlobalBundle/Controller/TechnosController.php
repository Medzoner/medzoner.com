<?php

namespace Medzoner\GlobalBundle\Controller;

use Medzoner\Domain\QueryHandler\ListJobBoardQueryHandler;
use Medzoner\Domain\Query\ListJobBoardQuery;
use Medzoner\GlobalBundle\Provider\JobBoard\ExperienceProvider;
use Medzoner\GlobalBundle\Provider\JobBoard\FormationProvider;
use Medzoner\GlobalBundle\Provider\JobBoard\LangProvider;
use Medzoner\GlobalBundle\Provider\JobBoard\OtherProvider;
use Medzoner\GlobalBundle\Provider\JobBoard\StackProvider;
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class TechnosController
 */
class TechnosController
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
    ) {
        $this->request = $request->getMasterRequest();

        $this->templating = $templating;

        $this->jobBoardQueryHandler = $jobBoardQueryHandler;
    }

    /**
     * @return Response
     */
    public function indexAction(): Response
    {
        $query = new ListJobBoardQuery(
            $this->request->request->all()
        );

        $jobBoard = $this->jobBoardQueryHandler->handle($query);

        return $this->templating->renderResponse(
            'MedzonerGlobalBundle:Technos:index.html.twig',
            [
                'jobboard' => $jobBoard,
                'stacks' => StackProvider::getStack(),
                'experiences' => ExperienceProvider::getExperience(),
                'formations' => FormationProvider::getFormation(),
                'langs' => LangProvider::getLang(),
                'others' => OtherProvider::getOther(),
            ]
        );
    }
}
