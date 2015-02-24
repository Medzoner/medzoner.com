<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        if (0 === strpos($pathinfo, '/assetic/foundation_')) {
            if (0 === strpos($pathinfo, '/assetic/foundation_js')) {
                // _assetic_foundation_js
                if ($pathinfo === '/assetic/foundation_js.js') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'foundation_js',  'pos' => NULL,  '_format' => 'js',  '_route' => '_assetic_foundation_js',);
                }

                if (0 === strpos($pathinfo, '/assetic/foundation_js_')) {
                    // _assetic_foundation_js_0
                    if ($pathinfo === '/assetic/foundation_js_modernizr_1.js') {
                        return array (  '_controller' => 'assetic.controller:render',  'name' => 'foundation_js',  'pos' => 0,  '_format' => 'js',  '_route' => '_assetic_foundation_js_0',);
                    }

                    // _assetic_foundation_js_1
                    if ($pathinfo === '/assetic/foundation_js_jquery_2.js') {
                        return array (  '_controller' => 'assetic.controller:render',  'name' => 'foundation_js',  'pos' => 1,  '_format' => 'js',  '_route' => '_assetic_foundation_js_1',);
                    }

                    if (0 === strpos($pathinfo, '/assetic/foundation_js_foundation.')) {
                        // _assetic_foundation_js_2
                        if ($pathinfo === '/assetic/foundation_js_foundation.min_3.js') {
                            return array (  '_controller' => 'assetic.controller:render',  'name' => 'foundation_js',  'pos' => 2,  '_format' => 'js',  '_route' => '_assetic_foundation_js_2',);
                        }

                        // _assetic_foundation_js_3
                        if ($pathinfo === '/assetic/foundation_js_foundation.alert_4.js') {
                            return array (  '_controller' => 'assetic.controller:render',  'name' => 'foundation_js',  'pos' => 3,  '_format' => 'js',  '_route' => '_assetic_foundation_js_3',);
                        }

                    }

                }

            }

            if (0 === strpos($pathinfo, '/assetic/foundation_css')) {
                // _assetic_foundation_css
                if ($pathinfo === '/assetic/foundation_css.css') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'foundation_css',  'pos' => NULL,  '_format' => 'css',  '_route' => '_assetic_foundation_css',);
                }

                // _assetic_foundation_css_0
                if ($pathinfo === '/assetic/foundation_css_foundation_1.css') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'foundation_css',  'pos' => 0,  '_format' => 'css',  '_route' => '_assetic_foundation_css_0',);
                }

            }

        }

        if (0 === strpos($pathinfo, '/css/45d73fb')) {
            // _assetic_45d73fb
            if ($pathinfo === '/css/45d73fb.css') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => '45d73fb',  'pos' => NULL,  '_format' => 'css',  '_route' => '_assetic_45d73fb',);
            }

            if (0 === strpos($pathinfo, '/css/45d73fb_')) {
                // _assetic_45d73fb_0
                if ($pathinfo === '/css/45d73fb_slick_1.css') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => '45d73fb',  'pos' => 0,  '_format' => 'css',  '_route' => '_assetic_45d73fb_0',);
                }

                // _assetic_45d73fb_1
                if ($pathinfo === '/css/45d73fb_portfolio_2.css') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => '45d73fb',  'pos' => 1,  '_format' => 'css',  '_route' => '_assetic_45d73fb_1',);
                }

            }

        }

        if (0 === strpos($pathinfo, '/js/cabad63')) {
            // _assetic_cabad63
            if ($pathinfo === '/js/cabad63.js') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => 'cabad63',  'pos' => NULL,  '_format' => 'js',  '_route' => '_assetic_cabad63',);
            }

            // _assetic_cabad63_0
            if ($pathinfo === '/js/cabad63_slick_1.js') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => 'cabad63',  'pos' => 0,  '_format' => 'js',  '_route' => '_assetic_cabad63_0',);
            }

        }

        if (0 === strpos($pathinfo, '/css/86df342')) {
            // _assetic_86df342
            if ($pathinfo === '/css/86df342.css') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => '86df342',  'pos' => NULL,  '_format' => 'css',  '_route' => '_assetic_86df342',);
            }

            // _assetic_86df342_0
            if ($pathinfo === '/css/86df342_blog_1.css') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => '86df342',  'pos' => 0,  '_format' => 'css',  '_route' => '_assetic_86df342_0',);
            }

        }

        if (0 === strpos($pathinfo, '/js/a7706ea')) {
            // _assetic_a7706ea
            if ($pathinfo === '/js/a7706ea.js') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => 'a7706ea',  'pos' => NULL,  '_format' => 'js',  '_route' => '_assetic_a7706ea',);
            }

            // _assetic_a7706ea_0
            if ($pathinfo === '/js/a7706ea_modernizr_1.js') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => 'a7706ea',  'pos' => 0,  '_format' => 'js',  '_route' => '_assetic_a7706ea_0',);
            }

        }

        if (0 === strpos($pathinfo, '/css/65a924f')) {
            // _assetic_65a924f
            if ($pathinfo === '/css/65a924f.css') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => '65a924f',  'pos' => NULL,  '_format' => 'css',  '_route' => '_assetic_65a924f',);
            }

            if (0 === strpos($pathinfo, '/css/65a924f_')) {
                // _assetic_65a924f_0
                if ($pathinfo === '/css/65a924f_foundation.min_1.css') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => '65a924f',  'pos' => 0,  '_format' => 'css',  '_route' => '_assetic_65a924f_0',);
                }

                // _assetic_65a924f_1
                if ($pathinfo === '/css/65a924f_global_2.css') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => '65a924f',  'pos' => 1,  '_format' => 'css',  '_route' => '_assetic_65a924f_1',);
                }

                // _assetic_65a924f_2
                if ($pathinfo === '/css/65a924f_blog_3.css') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => '65a924f',  'pos' => 2,  '_format' => 'css',  '_route' => '_assetic_65a924f_2',);
                }

            }

        }

        if (0 === strpos($pathinfo, '/js/d7d6da2')) {
            // _assetic_d7d6da2
            if ($pathinfo === '/js/d7d6da2.js') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => 'd7d6da2',  'pos' => NULL,  '_format' => 'js',  '_route' => '_assetic_d7d6da2',);
            }

            if (0 === strpos($pathinfo, '/js/d7d6da2_')) {
                // _assetic_d7d6da2_0
                if ($pathinfo === '/js/d7d6da2_jquery_1.js') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'd7d6da2',  'pos' => 0,  '_format' => 'js',  '_route' => '_assetic_d7d6da2_0',);
                }

                if (0 === strpos($pathinfo, '/js/d7d6da2_f')) {
                    // _assetic_d7d6da2_1
                    if ($pathinfo === '/js/d7d6da2_fastclick_2.js') {
                        return array (  '_controller' => 'assetic.controller:render',  'name' => 'd7d6da2',  'pos' => 1,  '_format' => 'js',  '_route' => '_assetic_d7d6da2_1',);
                    }

                    if (0 === strpos($pathinfo, '/js/d7d6da2_foundation.')) {
                        // _assetic_d7d6da2_2
                        if ($pathinfo === '/js/d7d6da2_foundation.min_3.js') {
                            return array (  '_controller' => 'assetic.controller:render',  'name' => 'd7d6da2',  'pos' => 2,  '_format' => 'js',  '_route' => '_assetic_d7d6da2_2',);
                        }

                        // _assetic_d7d6da2_3
                        if ($pathinfo === '/js/d7d6da2_foundation.alert_4.js') {
                            return array (  '_controller' => 'assetic.controller:render',  'name' => 'd7d6da2',  'pos' => 3,  '_format' => 'js',  '_route' => '_assetic_d7d6da2_3',);
                        }

                        // _assetic_d7d6da2_4
                        if ($pathinfo === '/js/d7d6da2_foundation.dropdown_5.js') {
                            return array (  '_controller' => 'assetic.controller:render',  'name' => 'd7d6da2',  'pos' => 4,  '_format' => 'js',  '_route' => '_assetic_d7d6da2_4',);
                        }

                        if (0 === strpos($pathinfo, '/js/d7d6da2_foundation.t')) {
                            // _assetic_d7d6da2_5
                            if ($pathinfo === '/js/d7d6da2_foundation.tab_6.js') {
                                return array (  '_controller' => 'assetic.controller:render',  'name' => 'd7d6da2',  'pos' => 5,  '_format' => 'js',  '_route' => '_assetic_d7d6da2_5',);
                            }

                            // _assetic_d7d6da2_6
                            if ($pathinfo === '/js/d7d6da2_foundation.topbar_7.js') {
                                return array (  '_controller' => 'assetic.controller:render',  'name' => 'd7d6da2',  'pos' => 6,  '_format' => 'js',  '_route' => '_assetic_d7d6da2_6',);
                            }

                        }

                        // _assetic_d7d6da2_7
                        if ($pathinfo === '/js/d7d6da2_foundation.orbit_8.js') {
                            return array (  '_controller' => 'assetic.controller:render',  'name' => 'd7d6da2',  'pos' => 7,  '_format' => 'js',  '_route' => '_assetic_d7d6da2_7',);
                        }

                    }

                }

                // _assetic_d7d6da2_8
                if ($pathinfo === '/js/d7d6da2_orbit_9.js') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'd7d6da2',  'pos' => 8,  '_format' => 'js',  '_route' => '_assetic_d7d6da2_8',);
                }

            }

        }

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_purge
                if ($pathinfo === '/_profiler/purge') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:purgeAction',  '_route' => '_profiler_purge',);
                }

                // _profiler_info
                if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            if (0 === strpos($pathinfo, '/_configurator')) {
                // _configurator_home
                if (rtrim($pathinfo, '/') === '/_configurator') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_configurator_home');
                    }

                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  '_route' => '_configurator_home',);
                }

                // _configurator_step
                if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_configurator_step')), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',));
                }

                // _configurator_final
                if ($pathinfo === '/_configurator/final') {
                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
                }

            }

        }

        if (0 === strpos($pathinfo, '/blog')) {
            // site_blog_homepage
            if ($pathinfo === '/blog') {
                return array (  '_controller' => 'Site\\BlogBundle\\Controller\\IndexController::indexAction',  '_route' => 'site_blog_homepage',);
            }

            // site_blog_show
            if (preg_match('#^/blog/(?P<id>\\d+)/(?P<slug>[^/]++)(?:/(?P<comments>[^/]++))?$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_site_blog_show;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'site_blog_show')), array (  '_controller' => 'Site\\BlogBundle\\Controller\\IndexController::showAction',  'comments' => true,));
            }
            not_site_blog_show:

            // site_blog_page
            if (0 === strpos($pathinfo, '/blog/page') && preg_match('#^/blog/page(?:/(?P<page>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'site_blog_page')), array (  '_controller' => 'Site\\BlogBundle\\Controller\\IndexController::listAction',  'page' => 1,));
            }

        }

        // site_blog_sidebar
        if ($pathinfo === '/sidebar') {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_site_blog_sidebar;
            }

            return array (  '_controller' => 'Site\\BlogBundle\\Controller\\IndexController::sidebarAction',  '_route' => 'site_blog_sidebar',);
        }
        not_site_blog_sidebar:

        // site_blog_comment_create
        if (0 === strpos($pathinfo, '/comment') && preg_match('#^/comment/(?P<blog_id>\\d+)$#s', $pathinfo, $matches)) {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_site_blog_comment_create;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'site_blog_comment_create')), array (  '_controller' => 'Site\\BlogBundle\\Controller\\CommentController::createAction',));
        }
        not_site_blog_comment_create:

        if (0 === strpos($pathinfo, '/blog')) {
            // site_blog_new
            if ($pathinfo === '/blog/new') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_site_blog_new;
                }

                return array (  '_controller' => 'Site\\BlogBundle\\Controller\\BlogController::newAction',  '_route' => 'site_blog_new',);
            }
            not_site_blog_new:

            // site_blog_create
            if ($pathinfo === '/blog/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_site_blog_create;
                }

                return array (  '_controller' => 'Site\\BlogBundle\\Controller\\BlogController::createAction',  '_route' => 'site_blog_create',);
            }
            not_site_blog_create:

        }

        // site
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'site');
            }

            return array (  '_controller' => 'Site\\PagesBundle\\Controller\\PortfolioController::indexAction',  '_route' => 'site',);
        }

        // site_home
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'site_home');
            }

            return array (  '_controller' => 'Site\\PagesBundle\\Controller\\PortfolioController::indexAction',  '_route' => 'site_home',);
        }

        // site_book
        if ($pathinfo === '/book') {
            return array (  '_controller' => 'Site\\PagesBundle\\Controller\\PortfolioController::indexAction',  '_route' => 'site_book',);
        }

        // site_contact
        if ($pathinfo === '/contact') {
            return array (  '_controller' => 'Site\\PagesBundle\\Controller\\ContactController::contactAction',  '_route' => 'site_contact',);
        }

        // site_foundation
        if ($pathinfo === '/foundation') {
            return array (  '_controller' => 'Site\\PagesBundle\\Controller\\FoundationController::indexAction',  '_route' => 'site_foundation',);
        }

        if (0 === strpos($pathinfo, '/proxy')) {
            // site_pages_proxy
            if ($pathinfo === '/proxy') {
                return array (  '_controller' => 'Site\\PagesBundle\\Controller\\ProxyController::indexAction',  '_route' => 'site_pages_proxy',);
            }

            // site_pages_proxy_url
            if (preg_match('#^/proxy/(?P<url>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'site_pages_proxy_url')), array (  '_controller' => 'Site\\PagesBundle\\Controller\\ProxyController::indexAction',));
            }

        }

        // site_cv
        if ($pathinfo === '/cv') {
            return array (  '_controller' => 'Site\\PagesBundle\\Controller\\CvController::indexAction',  '_route' => 'site_cv',);
        }

        if (0 === strpos($pathinfo, '/log')) {
            if (0 === strpos($pathinfo, '/login')) {
                // fos_user_security_login
                if ($pathinfo === '/login') {
                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::loginAction',  '_route' => 'fos_user_security_login',);
                }

                // fos_user_security_check
                if ($pathinfo === '/login_check') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_fos_user_security_check;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::checkAction',  '_route' => 'fos_user_security_check',);
                }
                not_fos_user_security_check:

            }

            // fos_user_security_logout
            if ($pathinfo === '/logout') {
                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::logoutAction',  '_route' => 'fos_user_security_logout',);
            }

        }

        if (0 === strpos($pathinfo, '/profile')) {
            // fos_user_profile_show
            if (rtrim($pathinfo, '/') === '/profile') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_profile_show;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'fos_user_profile_show');
                }

                return array (  '_controller' => 'Site\\UserBundle\\Controller\\ProfileController::showAction',  '_route' => 'fos_user_profile_show',);
            }
            not_fos_user_profile_show:

            // fos_user_profile_edit
            if ($pathinfo === '/profile/edit') {
                return array (  '_controller' => 'Site\\UserBundle\\Controller\\ProfileController::editAction',  '_route' => 'fos_user_profile_edit',);
            }

        }

        if (0 === strpos($pathinfo, '/re')) {
            if (0 === strpos($pathinfo, '/register')) {
                // fos_user_registration_register
                if (rtrim($pathinfo, '/') === '/register') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'fos_user_registration_register');
                    }

                    return array (  '_controller' => 'Site\\UserBundle\\Controller\\RegistrationController::registerAction',  '_route' => 'fos_user_registration_register',);
                }

                if (0 === strpos($pathinfo, '/register/c')) {
                    // fos_user_registration_check_email
                    if ($pathinfo === '/register/check-email') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_fos_user_registration_check_email;
                        }

                        return array (  '_controller' => 'Site\\UserBundle\\Controller\\RegistrationController::checkEmailAction',  '_route' => 'fos_user_registration_check_email',);
                    }
                    not_fos_user_registration_check_email:

                    if (0 === strpos($pathinfo, '/register/confirm')) {
                        // fos_user_registration_confirm
                        if (preg_match('#^/register/confirm/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_fos_user_registration_confirm;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_registration_confirm')), array (  '_controller' => 'Site\\UserBundle\\Controller\\RegistrationController::confirmAction',));
                        }
                        not_fos_user_registration_confirm:

                        // fos_user_registration_confirmed
                        if ($pathinfo === '/register/confirmed') {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_fos_user_registration_confirmed;
                            }

                            return array (  '_controller' => 'Site\\UserBundle\\Controller\\RegistrationController::confirmedAction',  '_route' => 'fos_user_registration_confirmed',);
                        }
                        not_fos_user_registration_confirmed:

                    }

                }

            }

            if (0 === strpos($pathinfo, '/resetting')) {
                // fos_user_resetting_request
                if ($pathinfo === '/resetting/request') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_fos_user_resetting_request;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::requestAction',  '_route' => 'fos_user_resetting_request',);
                }
                not_fos_user_resetting_request:

                // fos_user_resetting_send_email
                if ($pathinfo === '/resetting/send-email') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_fos_user_resetting_send_email;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::sendEmailAction',  '_route' => 'fos_user_resetting_send_email',);
                }
                not_fos_user_resetting_send_email:

                // fos_user_resetting_check_email
                if ($pathinfo === '/resetting/check-email') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_fos_user_resetting_check_email;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::checkEmailAction',  '_route' => 'fos_user_resetting_check_email',);
                }
                not_fos_user_resetting_check_email:

                // fos_user_resetting_reset
                if (0 === strpos($pathinfo, '/resetting/reset') && preg_match('#^/resetting/reset/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_fos_user_resetting_reset;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_resetting_reset')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::resetAction',));
                }
                not_fos_user_resetting_reset:

            }

        }

        // fos_user_change_password
        if ($pathinfo === '/profile/change-password') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_fos_user_change_password;
            }

            return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ChangePasswordController::changePasswordAction',  '_route' => 'fos_user_change_password',);
        }
        not_fos_user_change_password:

        if (0 === strpos($pathinfo, '/group')) {
            // fos_user_group_list
            if ($pathinfo === '/group/list') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_group_list;
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\GroupController::listAction',  '_route' => 'fos_user_group_list',);
            }
            not_fos_user_group_list:

            // fos_user_group_new
            if ($pathinfo === '/group/new') {
                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\GroupController::newAction',  '_route' => 'fos_user_group_new',);
            }

            // fos_user_group_show
            if (preg_match('#^/group/(?P<groupName>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_group_show;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_group_show')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\GroupController::showAction',));
            }
            not_fos_user_group_show:

            // fos_user_group_edit
            if (preg_match('#^/group/(?P<groupName>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_group_edit')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\GroupController::editAction',));
            }

            // fos_user_group_delete
            if (preg_match('#^/group/(?P<groupName>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_group_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_group_delete')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\GroupController::deleteAction',));
            }
            not_fos_user_group_delete:

        }

        if (0 === strpos($pathinfo, '/media/cache/resolve')) {
            // liip_imagine_filter_runtime
            if (preg_match('#^/media/cache/resolve/(?P<filter>[A-z0-9_\\-]*)/rc/(?P<hash>[^/]++)/(?P<path>.+)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_liip_imagine_filter_runtime;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'liip_imagine_filter_runtime')), array (  '_controller' => 'liip_imagine.controller:filterRuntimeAction',));
            }
            not_liip_imagine_filter_runtime:

            // liip_imagine_filter
            if (preg_match('#^/media/cache/resolve/(?P<filter>[A-z0-9_\\-]*)/(?P<path>.+)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_liip_imagine_filter;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'liip_imagine_filter')), array (  '_controller' => 'liip_imagine.controller:filterAction',));
            }
            not_liip_imagine_filter:

        }

        // fos_js_routing_js
        if (0 === strpos($pathinfo, '/js/routing') && preg_match('#^/js/routing(?:\\.(?P<_format>js|json))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_js_routing_js')), array (  '_controller' => 'fos_js_routing.controller:indexAction',  '_format' => 'js',));
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
