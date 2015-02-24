<?php

namespace Site\UserBundle\EventListener;

use Symfony\Component\Security\Http\Logout\DefaultLogoutSuccessHandler,
    Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

/**
 * 
 */
class LogoutSuccessHandler extends DefaultLogoutSuccessHandler {

    /**
     * 
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function onLogoutSuccess(Request $request) {

        $referer_url = $request->headers->get('referer');
        
        if(empty($referer_url)){
            $referer_url = '/';
        }
        
        $response = new RedirectResponse($referer_url);


        return $response;
    }

}
