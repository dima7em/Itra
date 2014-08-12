<?php
namespace DD\ShopBundle\Controller;

use DD\ShopBundle\Entity\Resource;
use DD\ShopBundle\Entity\User;
use JsonSchema\Constraints\Object;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CategorytreeController extends Controller
{
    public function treeAction(Request $request)
    {
        $resource=$this->getDoctrine()
            ->getRepository('DDShopBundle:Resource')
            ->findAll();

        return $this->render('DDShopBundle:Categorytree:tree.html.twig', array('resource'=>$resource));

    }
}