<?php

namespace Site\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class IndexController extends Controller {

    /**
     * 
     * @return type
     */
    public function indexAction() {
        $em = $this->getDoctrine()
                ->getManager();

        $blogs = $em->getRepository('SiteBlogBundle:Blog')
                ->getLatestBlogs(5);

        $pagination = $this->blogPagination(1);

        return $this->render('SiteBlogBundle:Index:index.html.twig', array(
                    'blogs' => $blogs,
                    'pagination' => $pagination
        ));
    }

    /**
     * 
     * @param type $page
     * @return type
     */
    public function listAction($page) {
        $maxArticles = $this->container
                ->getParameter('site_blog.blog.max_articles_per_page');

        $em = $this->getDoctrine()
                ->getManager();

        $pagination = $this->blogPagination($page);

        $blogs = $em->getRepository('SiteBlogBundle:Blog')
                ->getList($page, $maxArticles);

        return $this->render('SiteBlogBundle:Index:index.html.twig', array(
                    'blogs' => $blogs,
                    'pagination' => $pagination
        ));
    }

    protected function blogPagination($page) {
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

    /**
     * 
     * @param type $id
     * @return type
     * @throws type
     */
    public function showAction($id, $slug, $comments) {
        $em = $this->getDoctrine()
                ->getManager();

        $blog = $em->getRepository('SiteBlogBundle:Blog')
                ->find($id);

        if (!$blog) {
            throw $this->createNotFoundException('Unable to find Blog post.');
        }


        $comments = $em->getRepository('SiteBlogBundle:Comment')
                ->getCommentsForBlog($blog->getId());

        return $this->render('SiteBlogBundle:Index:show.html.twig', array(
                    'blog' => $blog,
                    'comments' => $comments,
        ));
    }

    public function sidebarAction() {
        $em = $this->getDoctrine()
                ->getManager();

/**
        $tagWeights = $em->getRepository('SiteBlogBundle:Blog')
                ->getTagWeights($tags);
**/
        $commentLimit = $this->container
                ->getParameter('site_blog.comments.latest_comment_limit');
        $latestComments = $em->getRepository('SiteBlogBundle:Comment')
                ->getLatestComments($commentLimit);

        return $this->render('SiteBlogBundle:Index:sidebar.html.twig', array(
                    'latestComments' => $latestComments,
                    'tags' => array()
        ));
    }

}
