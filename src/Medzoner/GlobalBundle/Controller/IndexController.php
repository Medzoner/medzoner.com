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
        //throw new \RuntimeException();
        $em = $this->getDoctrine()
                ->getManager();

        $blogs = $em->getRepository('SiteBlogBundle:Blog')
                ->getLatestBlogs(5);

        $pagination = $this->blogPagination(1);
        return $this->render('@MedzonerGlobal/Index/index.html.twig', array(
                    'blogs' => $blogs,
                    'pagination' => $pagination,
        ));
    }

    /**
     * @param $page
     *
     * @return array
     */
    public function blogPagination($page)
    {
        $maxArticles = $this->container
                ->getParameter('site_blog.blog.max_articles_per_page');
        $em = $this->getDoctrine()
                ->getManager();
        $articles_count = $em->getRepository('SiteBlogBundle:Blog')
                ->countPublishedTotal();
        return array(
            'page' => $page,
            'route' => 'site_blog_page',
            'pages_count' => ceil($articles_count / $maxArticles),
            'route_params' => array()
        );
    }
}
