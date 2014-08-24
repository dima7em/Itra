<?php
namespace DD\ShopBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Knp\Menu\MenuFactory;
use Knp\Menu\Matcher\Matcher;
use Knp\Menu\Renderer\ListRenderer;

class CategorytreeController extends Controller
{
    public function treeAction(Request $request)
    {
  /*      $factiry = new MenuFactory();
        $menu = $factiry->createItem('root');
        $menu ->setChildrenAttribute('class', 'nav pull-right');
        $menu ->addChild('User')->setAttribute('dropdown', true)->addChild('Pro3file', array('uri'=>'#'))->setAttribute('drivider_append', true);
       // $menu['User']->addChild('Profile', array('uri'=>'#'))->setAttribute('drivider_append', true);
        $menu['User']->addChild('FFF', array('uri'=>'#'));

*/
        $resource=$this->getDoctrine()
            ->getRepository('DDShopBundle:Resource')
            ->findAll();
        $factiry = new MenuFactory();
        $menu = $factiry->createItem('root');
        $menu ->setChildrenAttribute('class', 'nav nav-list tree');

        foreach($resource as $resname)
        {
            $res=$menu ->addChild($resname->getName())->setAttribute('dropdown', true)->setAttribute('class', true);
            $categories = $this ->getDoctrine()
                ->getRepository('DDShopBundle:Category')
                ->getAscCategory($resname->getId());
            foreach($categories as $category)
            {
                $url="http://".$this->container->get('router')->getContext()->getHost().$this->generateUrl('catalog', array('id'=>$category->getId()));
                $res->addChild($category->getName(),array('uri' => $url))->setAttribute('divider_append', true);
            }
        }
        $renderer = new ListRenderer(new Matcher());
        return $this->render('DDShopBundle:Categorytree:tree.html.twig',
                                array('menu'=> $renderer->render($menu)));
    }
    public function adminTreeAction()
    {
        $resources=$this->getDoctrine()
            ->getRepository('DDShopBundle:Resource')
            ->findAll();
        $tree=array();
        foreach($resources as $resource)
        {
            $res_name = $resource->getName();
            $tree[$res_name] = array();
            $categories = $this ->getDoctrine()
                ->getRepository('DDShopBundle:Category')
                ->getAscCategory($resource->getId());
            foreach($categories as $category)
            {
                $tree[$res_name][] = $category->getName();
            }
        }
        return $this->render('DDShopBundle:Categorytree:admintree.html.twig',
                               array('tree'=> $tree));
    }
}