<?php

namespace Site\PagesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

class SearchController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $repositoryManager = $this->get('fos_elastica.manager.orm');

        $repositoryBlog = $repositoryManager->getRepository('SiteBlogBundle:Blog');
        $articles = $repositoryBlog->find('t');

        $repositoryUser = $repositoryManager->getRepository('SiteUserBundle:User');
        $users = $repositoryUser->find('medz');
        
        return $this->render('SitePagesBundle:Search:index.html.twig',
            array('articles' => $articles, 'users' => $users)
        );
    }
}
