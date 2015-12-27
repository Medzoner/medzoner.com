<?php

namespace Medzoner\UserBundle\EventListener;

use Symfony\Component\Security\Http\Authentication\DefaultAuthenticationSuccessHandler,
    Symfony\Component\HttpFoundation\Request,
    Symfony\Component\Security\Core\Authentication\Token\TokenInterface,
    Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Http\HttpUtils;

/**
 * 
 */
class AuthenticationSuccessHandler extends DefaultAuthenticationSuccessHandler {

    /**
     *
     * @var type 
     */
    private $container;

    /**
     * 
     * @param \Symfony\Component\Security\Http\HttpUtils $httpUtils
     * @param array $options
     * @param type $container
     */
    public function __construct(HttpUtils $httpUtils, array $options, $container) {
        parent::__construct($httpUtils, $options);
        $this->container = $container;
    }

    /**
     * 
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param \Symfony\Component\Security\Core\Authentication\Token\TokenInterface $token
     * @return \Symfony\Component\HttpFoundation\JsonResponse|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function onAuthenticationSuccess(Request $request, TokenInterface $token) {
        if ($request->isXmlHttpRequest()) {
            return new JsonResponse(array('status' => true));
        }

        $security = $this->container->get('security.context');

        $login = false;
        if ($security->isGranted('ROLE_SUPER_ADMIN')) {
            $login = true;
        } elseif ($security->isGranted('ROLE_ADMIN')) {
            $login = true;
        } elseif ($security->isGranted('ROLE_USER')) {
            $login = true;
        }

        if ($login) {
            $_target_path = $request->request->get('_target_path');

            if (!empty($_target_path)) {
                $referer_url = $_target_path;
                $response = new RedirectResponse($referer_url);
            } else {
                $router = $this->container->get('router');
                $response = new RedirectResponse($router->generate('site_blog_homepage'));
            }
        }

        return $response;
    }

}
