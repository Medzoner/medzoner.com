<?php

namespace Site\PagesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Site\PagesBundle\Entity\Proxy;

/**
 * Class ProxyController
 * @package Site\PagesBundle\Controller
 */
class ProxyController extends Controller {

    /**
     * @param null $url
     * @return string|\Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function indexAction($url = null)
    {
        $oProxy = new Proxy();

        return $this->render('SitePagesBundle:Proxy:index.html.twig', array('proxy' => $oProxy->run($url, $_GET, $_POST)));
    }
}
