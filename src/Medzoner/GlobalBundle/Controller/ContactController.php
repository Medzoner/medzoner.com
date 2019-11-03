<?php

namespace Medzoner\GlobalBundle\Controller;

use DateTime;
use Medzoner\Domain\Command\RegisterContactCommand;
use Medzoner\GlobalBundle\Form\RegistrationType;
use SimpleBus\Message\Bus\MessageBus;
use Symfony\Component\Form\FormFactory;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Router;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

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
     * @var Environment
     */
    private $templating;

    /**
     * @var FormFactory
     */
    private $formFactory;

    /**
     * @var Session
     */
    private $session;

    /**
     * @var Router
     */
    private $router;

    /**
     * @var MessageBus
     */
    private $messageBus;

    /**
     * IndexController constructor.
     *
     * @param RequestStack $request
     * @param Environment $templating
     * @param FormFactory $formFactory
     * @param Session $session
     * @param Router $router
     * @param MessageBus $messageBus
     */
    public function __construct(
        RequestStack $request,
        Environment $templating,
        FormFactory $formFactory,
        Session $session,
        Router $router,
        MessageBus $messageBus
    ) {
        $this->request = $request->getMasterRequest();
        $this->templating = $templating;
        $this->formFactory = $formFactory;
        $this->session = $session;
        $this->router = $router;
        $this->messageBus = $messageBus;
    }

    /**
     * @param Request $request
     * @return Response
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function contactAction(Request $request): Response
    {
        $registerContactCommand = (new RegisterContactCommand())->setDateAdd(new DateTime('now'));

        $form = $this->formFactory->create(RegistrationType::class, $registerContactCommand, ['method' => 'POST']);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->messageBus->handle($registerContactCommand);

            $this->session->getFlashBag()->set('blogger-notice', 'Votre message a bien été envoyé. Merci!');

            return new RedirectResponse($this->router->generate('site_contact'));
        }

        return new Response($this->templating->render('@MedzonerGlobal/Contact/contact.html.twig', [
            'form' => $form->createView(),
            'message' => $this->session->getFlashBag()->get('blogger-notice'),
            'footerFixed' => true
        ]));
    }
}
