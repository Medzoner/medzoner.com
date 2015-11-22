<?php

namespace Medzoner\GlobalBundle\Controller;

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
        return $this->render('MedzonerGlobalBundle:Cv:index.html.twig');
    }
}
