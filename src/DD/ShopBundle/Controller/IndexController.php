<?php

namespace DD\ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class IndexController extends Controller
{
    public function indexAction()
    {
        $user = $this->getUser();
        return $this->render('DDShopBundle::index.html.twig',  array('user' => $user));
    }


}
