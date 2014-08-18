<?php
namespace DD\ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class CatalogController extends Controller
{
    public function indexAction()
    {
        return $this->render('DDShopBundle:Catalog:main.html.twig');
    }
}
