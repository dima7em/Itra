<?php

namespace DD\ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('DDShopBundle:Default:index.html.twig', array('name' => $name));
    }
}
