<?php
namespace DD\ShopBundle\Controller;

use DD\ShopBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use DD\ShopBundle\Form\Type\RegistrationType;
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

                $user->setPasskey('1');
                $user->setFlag('0');
                $user->setRole($role);
                $user->setDate(new \DateTime());

                $repository = $this->getDoctrine()->getRepository('DDShopBundle:User');
                if($repository->findUser($user))
                {
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($user);
                    $em->flush();
                    return $this->redirect("login");
                }
                else
                {
                    $this->get('session')->getFlashBag()
                        ->add('notice', 'The user with an email already exists.');
                    return $this->render(
                        'DDShopBundle:Account:register.html.twig',
                        array('user'=> $user ,'form' => $form->createView())
                    );
                }

            }

        }



        return $this->render(
            'DDShopBundle:Account:register.html.twig',
            array('user'=> $user ,'form' => $form->createView())
        );
    }

}