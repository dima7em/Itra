<?php
namespace DD\ShopBundle\Controller;

use DD\ShopBundle\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class CategorytreeControllerr extends Controller
{
    public function recentArticlesAction($max = 3)
    {
        // make a database call or other logic to get the "$max" most recent articles
        $articles = 'dfdfd';

        return $this->render('DDShopBundle:Categorytree:tree.html.twig', array('articles' => $articles));
    }
}