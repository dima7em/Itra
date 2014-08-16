<?php
// src/Acme/DemoBundle/Menu/Builder.php
namespace DD\ShopBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;
use DD\ShopBundle\Menu\RequestVoter;


class Builder extends ContainerAware
{

    public function mainMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('class', 'nav');
        $menu->addChild('Home', array('route' => 'dd_shop_homepage'));


        if (!false===$this->container->get('security.context')->isGranted('IS_AUTHENTICATED_ANONYMOUSLY')) {
            $menu->addChild('Catalog', array('route' => 'catalog'));
        }

        return $menu;

    }
    public function adminMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('class', 'dropdown-menu');
        $menu->addChild('Show User', array('route' => 'user'))->setAttribute('divider_append', true);
        $menu->addChild('Show Role', array('route' => 'role'))->setAttribute('divider_append', true);
        $menu->addChild('Show Resource', array('route' => 'resource'))->setAttribute('divider_append', true);
        $menu->addChild('Show Category', array('route' => 'category'))->setAttribute('divider_append', true);
        $menu->addChild('Show Product', array('route' => 'product'))->setAttribute('divider_append', true);

        return $menu;
    }
    public function accountMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('class', 'nav');
        if (!false===$this->container->get('security.context')->isGranted('IS_AUTHENTICATED_ANONYMOUSLY')) {
            $menu->addChild('Account', array('route' => 'dd_shop_homepage'));
        }
        else{
            $menu->addChild('Login', array('route' => 'login'));
        }

        return $menu;
    }

}