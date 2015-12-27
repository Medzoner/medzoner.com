<?php

namespace Medzoner\GlobalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Medzoner\GlobalBundle\Entity\Proxy;

/**
 * Class ProxyController
 * @package Medzoner\GlobalBundle\Controller
 */
class ProxyController extends Controller {

    /**
     * @param null $url
     * @return string|\Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function indexAction($url = null)
    {
        $proxy = new Proxy();

        return $this->render(
            'MedzonerGlobalBundle:Proxy:index.html.twig',
            array('proxy' => $proxy->run($url, $_GET, $_POST))
        );
    }
}
