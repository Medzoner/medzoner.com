<?php

// src/Site/BlogBundle/Controller/CommentController.php

namespace Site\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Site\BlogBundle\Entity\Comment;
use Site\BlogBundle\Form\CommentType;
use Symfony\Component\HttpFoundation\Request;

/**
 * Comment controller.
 */
class CommentController extends Controller {

    public function newAction($blog_id) {
        $blog = $this->getBlog($blog_id);

        $comment = new Comment();
        $comment->setBlog($blog);
        $form = $this->createForm(new CommentType(), $comment);

        return $this->render('SiteBlogBundle:Comment:form.html.twig', array(
                    'comment' => $comment,
                    'form' => $form->createView()
        ));
    }

    public function createAction(Request $request, $blog_id) {
        $blog = $this->getBlog($blog_id);

        $comment = new Comment();
        $comment->setBlog($blog);
        $request = $this->getRequest();
        $form = $this->createForm(new CommentType(), $comment);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()
                    ->getManager();
            $em->persist($comment);
            $em->flush();

            return $this->redirect($this->generateUrl('site_blog_show', array(
                                'id' => $comment->getBlog()->getId(),
                                'slug' => $comment->getBlog()->getSlug())) .
                            '#comment-' . $comment->getId()
            );
        }

        return $this->render('SiteBlogBundle:Comment:create.html.twig', array(
                    'comment' => $comment,
                    'form' => $form->createView()
        ));
    }

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
