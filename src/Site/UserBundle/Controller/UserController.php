<?php

namespace Site\UserBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Event\FormEvent;
use FOS\UserBundle\Event\FilterUserResponseEvent;
use FOS\UserBundle\Event\GetResponseUserEvent;
use FOS\UserBundle\Model\UserInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

/**
 * Description of UserController
 *
 * @author mehdi
 */
class UserController extends Controller {

    /**
     * 
     * @return type
     */
    public function listAction() {
        $userManager = $this->get('fos_user.user_manager');
        $this->users = $userManager->findUsers();
        $this->trierUsersAlpha();

        return $this->render('SiteUserBundle:User:list.html.twig', array(
                    'users' => $this->users,
        ));
    }

    /**
     * 
     */
    private function trierUsersAlpha() {
        usort($this->users, array($this, 'comparerUsername'));
    }

    /**
     * 
     * @param type $a
     * @param type $b
     * @return type
     */
    private function comparerUsername($a, $b) {
        return strcmp($a->getUsernameCanonical(), $b->getUsernameCanonical());
    }

}
