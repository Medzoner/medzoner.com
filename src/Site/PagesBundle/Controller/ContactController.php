<?php

namespace Site\PagesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ContactController extends Controller {

    /**
     * 
     * @param \Site\PagesBundle\Controller\Request $request
     * @return type
     */
    public function contactAction(Request $request) {

        $Contact = new \Site\PagesBundle\Entity\Contact();

        $form = $this->createFormBuilder($Contact)
                ->add('name', 'text')
                ->add('email', 'email')
                ->add('message', 'textarea')
                ->add('Envoyer', 'submit')
                ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {

            $message = \Swift_Message::newInstance()
                    ->setSubject('Contact site')
                    ->setFrom('medzoner@medzoner.com')
                    ->setTo('medzux@gmail.com')
                    ->setBody($this->renderView('SitePagesBundle:Contact:contactEmail.txt.twig', array('enquiry' => $Contact)));
            $this->get('mailer')->send($message);

            $this->get('session')->getFlashBag()->set('blogger-notice', 'Votre message a bien été envoyé. Merci!');

            // Redirect - This is important to prevent users re-posting
            // the form if they refresh the page
            return $this->redirect($this->generateUrl('site_contact'));
        }

        return $this->render('SitePagesBundle:Contact:contact.html.twig', array(
                    'form' => $form->createView(),)
        );
    }

}
