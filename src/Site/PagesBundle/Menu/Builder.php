<?php

namespace Site\PagesBundle\Menu;

use Knp\Menu\FactoryInterface,
    Symfony\Component\DependencyInjection\ContainerAware;

class Builder extends ContainerAware {

    public function mainMenu(FactoryInterface $factory, array $options) {

        $request = $this->container->get('request');
        $routeName = $request->get('_route');

        $menu = $factory->createItem('root');

        //Home
        $menu->addChild('HOME', array('route' => 'site'));

        //Blog
        /*
          $blogMenu = $menu->addChild('BLOG', array('route' => 'site_blog_homepage'));
          $aBlogRoutes = array('site_blog_page', 'site_blog_show', 'site_blog_homepage');
          foreach ($aBlogRoutes as $aBlogRoute) {
          if ($aBlogRoute == $routeName) {
          $blogMenu->setCurrent(true);
          }
          }
         */

        //Tools
        $menuTools = $menu->addChild('+ Plus', array('route' => 'site_pages_proxy', 'attributes' => array('class' => 'has-dropdown not-click')));

        $aToolsRoutes = array('site_book', 'site_pages_proxy', 'site_foundation');
        foreach ($aToolsRoutes as $aToolRoute) {
            if ($aToolRoute == $routeName) {
                $menuTools->setCurrent(true);
            }
        }/*
        $menuTools->addChild('PROXY', array('route' => 'site_pages_proxy'));
        $menuTools->addChild('FOUNDATION FRAMEWORK', array('route' => 'site_foundation',));
         *
         */
        $menuTools->addChild('BOOK', array('route' => 'site_book',));
        $menuTools->addChild('CV', array('route' => 'site_cv',));

        $menu->setChildrenAttributes(array('class' => 'right'));
        $menuTools->setChildrenAttributes(array('class' => 'dropdown'));
        return $menu;
    }

}
