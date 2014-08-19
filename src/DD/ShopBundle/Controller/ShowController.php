<?php

namespace DD\ShopBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class ShowController extends Controller
{
    public function ShowAction()
    {
        $request = $this->get('request');
        $id = $request->query->get('id');
        $category = $this->getDoctrine()
            ->getRepository('DDShopBundle:Category')
            ->find($id);

        if (!$category) {
            throw $this->createNotFoundException(
                'No category found for id '.$id
            );
        }else{

            $products = $category->getProducts();
            if (!$products) {
                return $this->render('DDShopBundle:Catalog:show.html.twig', array('products'=>'No Products in this Category'));
            }

            return $this->render('DDShopBundle:Catalog:show.html.twig', array('products'=>$products));

        }

    }


}