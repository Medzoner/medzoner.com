<?php

namespace Medzoner\GlobalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class SearchController
 * @package Site\PagesBundle\Controller
 */
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
        
        return $this->render('MedzonerGlobalBundle:Search:index.html.twig',
            array('articles' => $articles, 'users' => $users)
        );
    }
}
