<?php
// src/Acme/DemoBundle/Menu/Builder.php
namespace DD\ShopBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\Security\Core\SecurityContext;


class Builder extends ContainerAware
{

    public function mainMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('class', 'nav');
        $home = $this->container->get('translator')->trans('Home');
        $menu->addChild($home, array('route' => 'dd_shop_homepage'));
        //$menu->addChild('Catalog', array('route' => 'catalog'));

        if ($this->container->get('security.context')->isGranted('ROLE_USER')) {
            $catalog = $this->container->get('translator')->trans('Catalog');
            $menu->addChild($catalog, array('route' => 'catalog'));
        }
        return $menu;
    }
    public function adminMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('class', 'dropdown-menu');
        $menu->addChild('Show User', array('route' => 'user'));
        $menu->addChild('Show Role', array('route' => 'role'));
        $menu->addChild('Show Resource', array('route' => 'resource'));
        $menu->addChild('Show Category', array('route' => 'hierarchy'));
        $menu->addChild('Show Product', array('route' => 'product'));

        return $menu;
    }
    public function moderMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('class', 'dropdown-menu');
        $menu->addChild('Show Resource', array('route' => 'resource'));
        $menu->addChild('Show Category', array('route' => 'category'));
        $menu->addChild('Show Product', array('route' => 'product'));

        return $menu;
    }
    public function accountMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('class', 'nav');
        if (!$this->container->get('security.context')->isGranted('ROLE_USER')) {
            $menu->addChild('Login', array('route' => 'login'));
            /*$menu->addChild('About Me', array(
                'route' => 'page_show',
                'routeParameters' => array('id' => 42)
            ));*/
        }
        else{
            $user = $this->container->get('security.context')->getToken()->getUser();
            $menu->addChild($user->getUsername(), array('route' => 'index'));

        }
        return $menu;
    }

    public function locale(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('class', 'nav');
        $locale = $this->container->get('request')->getLocale();
        $menu->addChild($locale, array('route' => 'locale'));
        return $menu;
    }

}