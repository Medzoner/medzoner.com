<?php

namespace Site\PagesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

class CvController extends Controller
{

    public function indexAction()
    {
        
        return $this->render('SitePagesBundle:Cv:index.html.twig');
    }
    
  
}
