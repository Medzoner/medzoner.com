<?php

namespace Site\PagesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class FoundationController
 * @package Site\PagesBundle\Controller
 */
class FoundationController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        return $this->render('SitePagesBundle:Foundation:index.html.twig', array('name' => '$name'));
    }
}
