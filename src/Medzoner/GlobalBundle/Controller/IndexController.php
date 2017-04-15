<?php

namespace Medzoner\GlobalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class IndexController
 * @package Medzoner\GlobalBundle\Controller
 */
class IndexController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $this->blogPagination(1);
        return $this->render('@MedzonerGlobal/Index/index.html.twig', [
                    'blogs' => [],
                    'pagination' => [],
        ]);
    }

    /**
     * @param $page
     *
     * @return array
     */
    public function blogPagination($page)
    {
        $maxArticles = 10;
        $em = $this->getDoctrine()
                ->getManager();
        $articles_count = $em->getRepository('MedzonerGlobalBundle:Contact')
                ->findAll();
        return array(
            'page' => $page,
            'route' => 'site_blog_page',
            'pages_count' => 1,
            'route_params' => array()
        );
    }
}
