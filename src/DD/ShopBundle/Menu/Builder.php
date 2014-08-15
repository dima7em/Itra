<?php
// src/Acme/DemoBundle/Menu/Builder.php
namespace DD\ShopBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class Builder extends ContainerAware
{

    public function mainMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('class', 'nav');
        $menu->addChild('Home', array('route' => 'dd_shop_homepage'));
        $menu->addChild('Catalog', array('route' => 'category_tree'));
        $menu->addChild('Account', array('route' => 'dd_shop_homepage'));

        return $menu;
    }
    public function adminMenu(FactoryInterface $factory, array $options)
    {
            $menu = $factory->createItem('root');
            $menu->setChildrenAttribute('class', 'dropdown-menu');
            $menu->addChild('Shou User', array('uri' => 'user'))->setAttribute('divider_append', true);
            $menu->addChild('Profile', array('uri' => '#'))->setAttribute('divider_append', true);
            $menu->addChild('Logout', array('uri' => '#'));
            return $menu;

    }
}