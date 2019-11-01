<?php

namespace Medzoner\GlobalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class FoundationController
 */
class FoundationController extends AbstractController
{
    /**
     * @return Response
     */
    public function indexAction()
    {
        return $this->render('MedzonerGlobalBundle:Foundation:index.html.twig', array('name' => '$name'));
    }
}
