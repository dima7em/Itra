<?php
namespace DD\ShopBundle\Controller;

use DD\ShopBundle\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class NewpassController extends Controller
{

    public function newAction(Request $request)
    {
        $password = array('message'=>'Type your message here');
        $form = $this->createFormBuilder($password)
            ->add('Password', 'repeated', array(
                'first_name'  => 'password',
                'second_name' => 'confirm',
                'type'        => 'password',))
            ->add('save', 'submit', array('label' => 'Create Post'))
            ->getForm();

        if($request->getMethod()=='POST'){
            $form->bind($request);

            if ($form->isValid())
            {
                echo('valid');
            }
        }

        return $this->render(
            'DDShopBundle:Replacepass:new.html.twig',
            array('form' => $form->createView())
        );
    }


}