<?php

namespace Medzoner\GlobalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class PortfolioController
 * @package Medzoner\GlobalBundle\Controller
 */
class PortfolioController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $dm = $this->get('doctrine_mongodb')->getManager();

        $products = $dm->getRepository('MedzonerGlobalBundle:Project')
                ->findAll();

        return $this->render('MedzonerGlobalBundle:Portfolio:index.html.twig', array(
                    'projects' => $products
        ));
    }
}
