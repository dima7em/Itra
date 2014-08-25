<?php

namespace DD\ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    public function indexAction()
    {
        return $this->render('DDShopBundle:Default:Home.html.twig', array('name' => 'DDShopBundlE'));
    }
}
