<?php

namespace Medzoner\GlobalBundle\Controller;

use Medzoner\Domain\QueryHandler\ListJobBoardQueryHandler;
use Medzoner\Domain\Query\ListJobBoardQuery;
use Medzoner\GlobalBundle\Provider\JobBoard\ExperienceProvider;
use Medzoner\GlobalBundle\Provider\JobBoard\FormationProvider;
use Medzoner\GlobalBundle\Provider\JobBoard\LangProvider;
use Medzoner\GlobalBundle\Provider\JobBoard\OtherProvider;
use Medzoner\GlobalBundle\Provider\JobBoard\StackProvider;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

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
     * @var Environment
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
     * @param Environment $templating
     * @param ListJobBoardQueryHandler $jobBoardQueryHandler
     */
    public function __construct(
        RequestStack $request,
        Environment $templating,
        ListJobBoardQueryHandler $jobBoardQueryHandler
    ) {
        $this->request = $request->getMasterRequest();

        $this->templating = $templating;

        $this->jobBoardQueryHandler = $jobBoardQueryHandler;
    }

    /**
     * @return Response
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function indexAction(): Response
    {
        $query = new ListJobBoardQuery(
            $this->request->request->all()
        );

        $jobBoard = $this->jobBoardQueryHandler->handle($query);

        return new Response($this->templating->render(
            '@MedzonerGlobal/Technos/index.html.twig',
            [
                'jobboard' => $jobBoard,
                'stacks' => StackProvider::getStack(),
                'experiences' => ExperienceProvider::getExperience(),
                'formations' => FormationProvider::getFormation(),
                'langs' => LangProvider::getLang(),
                'others' => OtherProvider::getOther(),
            ]
        ));
    }
}
