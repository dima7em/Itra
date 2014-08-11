<?php
namespace DD\ShopBundle\Controller;

use DD\ShopBundle\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;





class ReplacepassController extends Controller
{

    public function replaceAction(Request $request)
    {
        $password = array('message'=>'Type your message here');
        $form = $this->createFormBuilder($password)
                ->add('username', 'text')
                ->add('email','email')
                ->add('save', 'submit', array('label' => 'Create Post'))
                ->getForm();


        if($request->getMethod()=='POST'){
            $form->bind($request);

            if ($form->isValid()) {

                $username=$form->getData()['username'];
                $email=$form->getData()['email'];
                //echo($username." ".$email);
                $user=new User();
                $repository = $this->getDoctrine()->getRepository('DDShopBundle:User');
                if($repository->findOneBy(array('username'=>$username, 'email'=>$email)))
                {
                    $this->sendEmail();
                }
                else echo('folse');
            }

        }
        return $this->render(
            'DDShopBundle:Replacepass:replace.html.twig',
            array('form' => $form->createView())
        );

    }
    private  function sendEmail()
    {
        $message = \Swift_Message::newInstance()
            ->setSubject('Hello Email1')
            ->setFrom('semynovich.dmitriy@gmail.com')
            ->setTo('dima_7em@mail.ru')
            ->setBody('Here is the message itself')
        ;
        $this->get('mailer')->send($message);

        return $this->render('DDShopBundle::layout.html.twig');
    }


}