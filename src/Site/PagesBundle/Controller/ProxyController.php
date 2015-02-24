<?php

namespace Site\PagesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Site\PagesBundle\Entity\Proxy;

class ProxyController extends Controller {

    /**
     * 
     * @param type $url
     * @return type
     */
    public function indexAction($url = null) {

        try {
            $oProxy = new Proxy();
        } catch (Exception $e) {
            return 'Error: ' . $e->getMessage();
        }

        return $this->render('SitePagesBundle:Proxy:index.html.twig', array('proxy' => $oProxy->run($url, $_GET, $_POST)));
    }

}

