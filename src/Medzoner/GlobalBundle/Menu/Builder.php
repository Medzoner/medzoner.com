<?php

namespace Medzoner\GlobalBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

/**
 * Class Builder
 *
 * @package Medzoner\GlobalBundle\Menu
 */
class Builder implements ContainerAwareInterface
{
    use ContainerAwareTrait;

    /**
     * @param FactoryInterface $factory
     * @param array $options
     * @return \Knp\Menu\ItemInterface
     */
    public function mainMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');

        //Home
        $menu->addChild('HOME', array('route' => 'site'));
        $menu->addChild('CV', array('route' => 'site_cv',));
        $menu->addChild('CONTACT', array('route' => 'site_contact',));

        return $menu;
    }
}
