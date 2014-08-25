<?php

namespace DD\ShopBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Knp\Menu\MenuFactory;
use Knp\Menu\Renderer\ListRenderer;
use Knp\Menu\Matcher\Matcher;

use DD\ShopBundle\Entity\Category;
use DD\ShopBundle\Form\CategoryType;

/**
 * Category controller.
 *
 */
class HierarchyController extends Controller
{
    public function indexAction(Request $request)
    {
        return $this->render('DDShopBundle:Category:hierarchy.html.twig');
    }

    public function categoryNextAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $array = $this->findHighCategory($request);

        $high_level_categories = array_pop($array);

        if($high_level_categories != null)
        {
            $entity = array_shift($array);

            $high_level_category = array_pop($high_level_categories);
            $high_level = $high_level_category->getLevel();

            $entity->setLevel($high_level);
            $high_level_category->setLevel($high_level+1);

            $em->flush();
        }
        return $this->hierarchyAction($request);
    }

    public function categoryPrevAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $array = $this->findLowCategory($request);

        $low_level_categories = array_pop($array);

        if($low_level_categories != null)
        {
             $entity = array_shift($array);

             $low_level_category = array_pop($low_level_categories);
             $low_level = $low_level_category->getLevel();

             $entity->setLevel($low_level);
             $low_level_category->setLevel($low_level-1);

             $em->flush();
        }
        return $this->hierarchyAction($request);
    }

    public function categoryFirstAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $array = $this->findHighCategory($request);

        $high_level_categories = array_pop($array);

        if($high_level_categories != null){

            $entity = array_shift($array);

            $high_level_category = $high_level_categories[0];
            $high_level = $high_level_category->getLevel();

            $high_level = ($high_level===0)?$high_level:0;

            $entity->setLevel($high_level);

            foreach($high_level_categories as $high_category)
            {
                $high_level++;
            //    var_dump($high_level);
                $high_category->setLevel($high_level);
            }

            $em->flush();
        }
        return $this->hierarchyAction($request);
    }
    public function categoryLastAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $array = $this->findLowCategory($request);

        $low_level_categories = array_pop($array);

        if($low_level_categories != null)
        {
            $entity = array_shift($array);
            $low_level_category = array_shift($low_level_categories);

            $low_level = $low_level_category->getLevel();


            $entity->setLevel($low_level);
            $low_level--;
            $low_level_category->setLevel($low_level);
            foreach($low_level_categories as $low_category)
            {
                //var_dump($low_category->getLevel());
                $low_level--;
                $low_category->setLevel($low_level);
            }
            $em->flush();
        }
        return $this->hierarchyAction($request);
    }
    public function menuAction(Request $request)
    {
        $name = $request->get('name');
        $position = $request->get('position');
        return $this->render('DDShopBundle:Category:levelcontrole.html.twig',
            array("category"=>$name,
                  "position"=>$position));
    }
    public function hierarchyAction(Request $request)
    {
        $name = $request->get('resource');
        $res_id = $this->getDoctrine()
            ->getRepository('DDShopBundle:Resource')
            ->findOneBy(array('name'=>$name))
            ->getId();
        $categories = $this ->getDoctrine()
            ->getRepository('DDShopBundle:Category')
            ->getAscCategory($res_id);
        $factiry = new MenuFactory();
        $menu = $factiry->createItem('My menu');
        $ul=array();
        foreach($categories as $category)
        {
            $ul[] = $category->getName();
        }
        //var_dump($menu);

        return $this->render('DDShopBundle:Category:ajaxli.html.twig', array('ul'=> $ul,
                                                                              'name' => $name));
    }

    private function findHighCategory(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $name_category = $request->get('name');
        $name_resource = $request->get('resource');
        //var_dump($name_category);
        $resource_id = $this ->getDoctrine()
            ->getRepository('DDShopBundle:Resource')
            ->findOneBy(array('name'=>$name_resource))
            ->getId();

        $entity = $em->getRepository('DDShopBundle:Category')
            ->findOneBy(array('name'=>$name_category,
                'resource' =>$resource_id));

        $level = $entity->getLevel();
        $high_level_categories = $this ->getDoctrine()
            ->getRepository('DDShopBundle:Category')
            ->getHighCategory($level, $resource_id);
        $result=array();
        $result[0]=$entity;
        $result[1]=$high_level_categories;
        return $result;
    }

    private function findLowCategory(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $name_category = $request->get('name');
        $name_resource = $request->get('resource');

        $resource_id = $this ->getDoctrine()
            ->getRepository('DDShopBundle:Resource')
            ->findOneBy(array('name'=>$name_resource))
            ->getId();

        $entity = $em->getRepository('DDShopBundle:Category')
            ->findOneBy(array('name'=>$name_category,
                'resource' =>$resource_id));

        $level = $entity->getLevel();
        $high_level_categories = $this ->getDoctrine()
            ->getRepository('DDShopBundle:Category')
            ->getLowCategory($level, $resource_id);
        $result=array();
        $result[0]=$entity;
        $result[1]=$high_level_categories;
        return $result;
    }
}
