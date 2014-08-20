<?php
namespace DD\ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class CatalogController extends Controller
{
    public function indexAction()
    {
        $request = $this->get('request');
        $id = $request->query->get('id');
        $sort = $request->query->get('sort');
        $direction = $request->query->get('direction');
        if (!$id){
            return $this->render('DDShopBundle:Catalog:main.html.twig', array('products'=>''));
        }
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
                return $this->render('DDShopBundle:Catalog:main.html.twig', array('products'=>''));
            }
            $paginator  = $this->get('knp_paginator');
            $pagination = $paginator->paginate(
                $products,
                $this->get('request')->query->get('page', 1)/*page number*/,
                5/*limit per page*/
            );

            return $this->render('DDShopBundle:Catalog:main.html.twig', array('products'=>$pagination));

        }

    }
}
