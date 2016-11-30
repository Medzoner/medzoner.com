<?php

namespace Medzoner\GlobalBundle\Controller;

use Medzoner\GlobalBundle\Services\JobBoardService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class CvController
 * @package Medzoner\GlobalBundle\Controller
 */
class CvController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        /** @var JobBoardService $jobBordService */
        $jobBordService = $this->get('medzoner.jobboard.service');

        return $this->render(
            'MedzonerGlobalBundle:Cv:index.html.twig',
            [
                'jobboard' => $jobBordService->getJobBoard()
            ]
        );
    }
}
