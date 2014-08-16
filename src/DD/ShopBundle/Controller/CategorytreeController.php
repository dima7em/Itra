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
           $a=$menu ->addChild($resname->getName())->setAttribute('dropdown', true)->setAttribute('class', true);
            foreach($resname->getCategory() as $category)
            {
                $a->addChild($category->getName())->setAttribute('divider_append', true);
            }
        }
        $renderer = new ListRenderer(new Matcher());

      // return 'fuck';
        return $this->render('DDShopBundle:Categorytree:tree.html.twig', array('menu'=> $renderer->render($menu)));

    }
}