<?php

namespace Medzoner\GlobalBundle\Controller;

use Medzoner\GlobalBundle\Form\RegistrationType;
use Symfony\Component\Form\FormFactory;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Medzoner\GlobalBundle\Entity\Contact;

use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Router;

/**
 * Class ContactController
 */
class ContactController
{
    /**
     * @var RequestStack
     */
    private $request;

    /**
     * @var EngineInterface
     */
    private $templating;

    /**
     * @var FormFactory
     */
    private $formFactory;

    /**
     * @var \Swift_Mailer
     */
    private $mailer;

    /**
     * @var Session
     */
    private $session;
    /**
     * @var Router
     */
    private $router;

    /**
     * IndexController constructor.
     * @param RequestStack $request
     * @param EngineInterface $templating
     * @param FormFactory $formFactory
     * @param \Swift_Mailer $mailer
     * @param Session $session
     * @param Router $router
     */
    public function __construct(
        RequestStack $request,
        EngineInterface $templating,
        FormFactory $formFactory,
        \Swift_Mailer $mailer,
        Session $session,
        Router $router
    )
    {
        $this->request = $request->getMasterRequest();
        $this->templating = $templating;
        $this->formFactory = $formFactory;
        $this->mailer = $mailer;
        $this->session = $session;
        $this->router = $router;
    }

    /**
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function contactAction(Request $request)
    {
        $contact = new Contact();

        $form = $this->formFactory->create(RegistrationType::class, $contact, ['method' => 'POST']);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $message = \Swift_Message::newInstance()
                    ->setSubject('Contact site')
                    ->setFrom('medzux@gmail.com')
                    ->setTo('medzux@gmail.com')
                    ->setBody($this->templating->render(
                        'MedzonerGlobalBundle:Contact:contactEmail.txt.twig', ['enquiry' => $contact])
                    );

            $this->mailer->send($message);

            $this->session->getFlashBag()->set('blogger-notice', 'Votre message a bien été envoyé. Merci!');

            // Redirect - This is important to prevent users re-posting
            // the form if they refresh the page
            return new RedirectResponse($this->router->generate('site_contact'));
        }

        return $this->templating->renderResponse('@MedzonerGlobal/Contact/contact.html.twig', [
                    'form' => $form->createView(),]
        );
    }
}
