<?php
namespace DD\ShopBundle\Controller;

use DD\ShopBundle\Entity\User;
use JsonSchema\Constraints\Object;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class NewpassController extends Controller
{

    public function newAction(Request $request, $id, $passkey)
    {
        $password = array('message'=>'Type your message here');
        $form = $this->createFormBuilder($password)
            ->add('Password', 'repeated', array(
                'first_name'  => 'password',
                'second_name' => 'confirm',
                'type'        => 'password',))
            ->add('save', 'submit', array('label' => 'Create Post'))
            ->getForm();

        $repository = $this->getDoctrine()->getRepository('DDShopBundle:User');

        if($user = $repository->findOneBy(array('id'=>$id, 'passkey'=>$passkey)))
        {
            if($request->getMethod()=='POST'){
                //echo('sd');
                $form->bind($request);
                if ($form->isValid())
                {
                    //$em = $this->getDoctrine()->getEntityManagers();
                    $password = $form->getData()['Password'];
                    $user->setPassword($password);
                    $this->getDoctrine()->getEntityManager()->flush();
                    //echo($password);
                }
                else{};
            }

            return $this->render(
                'DDShopBundle:Replacepass:new.html.twig',
                array('form' => $form->createView()));
        }
        else {};
    }
}