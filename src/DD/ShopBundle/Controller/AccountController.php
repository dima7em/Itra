<?php
namespace DD\ShopBundle\Controller;

use DD\ShopBundle\Entity\User;
use Proxies\__CG__\DD\ShopBundle\Entity\Role;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use DD\ShopBundle\Form\Type\RegistrationType;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NoResultException;
use Symfony\Component\HttpFoundation\Request;

class AccountController extends Controller
{

    public function createAction(Request $request)
    {
        $user = new User();
        $eml = $this->getDoctrine()->getRepository('DDShopBundle:Role');
        $role =$eml->findOneByRole('ROLE_USER');
        $form = $this->createForm(new RegistrationType(), $user);


        if($request->getMethod()=='POST'){
            $form->bind($request);

            if ($form->isValid()) {

                $user->setFlag('0');
                $user->setRole($role);


                $em = $this->getDoctrine()->getManager();
                $em->persist($user);
                $em->flush();
                return $this->redirect("login");


            }

            }



        return $this->render(
            'DDShopBundle:Account:register.html.twig',
            array('user'=> $user ,'form' => $form->createView())
        );
    }

}