<?php
namespace DD\ShopBundle\Controller;

use DD\ShopBundle\Entity\Resource;
use DD\ShopBundle\Entity\User;
use JsonSchema\Constraints\Object;
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

        foreach($resource as $d)
        {
           $a=$menu ->addChild($d->getName())->setAttribute('dropdown', true)->setAttribute('class', true);
            foreach($d->getCategory() as $c)
            {
                $a->addChild($c->getName())->setAttribute('divider_append', true);
            }
        }
        $renderer = new ListRenderer(new Matcher());

        //echo $renderer->render($menu);
        return $this->render('DDShopBundle:Categorytree:tree.html.twig', array('menu'=> $renderer->render($menu)));

    }
}