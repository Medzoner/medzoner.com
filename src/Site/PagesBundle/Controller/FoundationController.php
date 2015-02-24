<?php

namespace Site\PagesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FoundationController extends Controller {

    public function indexAction() {
        
        return $this->render('SitePagesBundle:Foundation:index.html.twig', array('name' => '$name'));
    }

}

