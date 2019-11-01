<?php

namespace Medzoner\GlobalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class SearchController
 * @package Site\PagesBundle\Controller
 */
class SearchController extends AbstractController
{
    /**
     * @return Response
     */
    public function indexAction()
    {
        return $this->render(
            'MedzonerGlobalBundle:Search:index.html.twig',
            ['articles' => [], 'users' => []]
        );
    }
}
