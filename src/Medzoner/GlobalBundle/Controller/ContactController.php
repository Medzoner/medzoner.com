<?php

namespace Medzoner\GlobalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Medzoner\GlobalBundle\Entity\Contact;

/**
 * Class ContactController
 * @package Medzoner\GlobalBundle\Controller
 */
class ContactController extends Controller
{
    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     */
    public function contactAction(Request $request)
    {
        $Contact = new Contact();

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
                    ->setFrom('medzux@gmail.com')
                    ->setTo('medzux@gmail.com')
                    ->setBody($this->renderView(
                        'MedzonerGlobalBundle:Contact:contactEmail.txt.twig', array('enquiry' => $Contact))
                    );

            $this->get('mailer')->send($message);

            $this->get('session')->getFlashBag()->set('blogger-notice', 'Votre message a bien été envoyé. Merci!');

            // Redirect - This is important to prevent users re-posting
            // the form if they refresh the page
            return $this->redirect($this->generateUrl('site_contact'));
        }

        return $this->render('@MedzonerGlobal/Contact/contact.html.twig', array(
                    'form' => $form->createView(),)
        );
    }
}
