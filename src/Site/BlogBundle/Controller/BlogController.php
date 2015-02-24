<?php

// src/Site/BlogBundle/Controller/BlogController.php

namespace Site\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Site\BlogBundle\Entity\Blog;
use Site\BlogBundle\Form\BlogType;

/**
 * Blog controller.
 */
class BlogController extends Controller {

    /**
     * 
     * @param type $blog_id
     * @return type
     */
    public function newAction() {

        if (false === $this->get('security.context')->isGranted('ROLE_ADMIN')) {
            throw new AccessDeniedException();
        }

        $blog = new Blog();
        $form = $this->createForm(new BlogType(), $blog);

        return $this->render('SiteBlogBundle:Blog:new.html.twig', array(
                    'blog' => $blog,
                    'form' => $form->createView()
        ));
    }

    /**
     * 
     * @param Request $request
     * @param type $blog_id
     * @return type
     * @throws AccessDeniedException
     */
    public function createAction(Request $request) {

        if (false === $this->get('security.context')->isGranted('ROLE_ADMIN')) {
            throw new AccessDeniedException();
        }

        $blog = new Blog();

        $form = $this->createForm(new BlogType(), $blog);
        
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()
                    ->getManager();
            $blog->upload();
            
            $em->persist($blog);
            $em->flush();

            return $this->redirect($this->generateUrl('site_blog_show', array(
                                'id' => $blog->getId(),
                                'slug' => $blog->getSlug())) .
                            '#blog-' . $blog->getId()
            );
        }

        return $this->render('SiteBlogBundle:Blog:new.html.twig', array(
                    'blog' => $blog,
                    'form' => $form->createView()
        ));
    }

    /**
     * 
     * @param type $blog_id
     * @return type
     * @throws type
     */
    protected function getBlog($blog_id) {
        $em = $this->getDoctrine()
                ->getManager();

        $blog = $em->getRepository('SiteBlogBundle:Blog')->find($blog_id);

        if (!$blog) {
            throw $this->createNotFoundException('Unable to find Blog post.');
        }

        return $blog;
    }

}
