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

                $username = $form->getData()['username'];
                $email = $form->getData()['email'];
                //echo($username." ".$email);
                //$user=new User();
                $key = sha1(uniqid($email, true));
                $repository = $this->getDoctrine()->getRepository('DDShopBundle:User');
                if($user = $repository->findOneBy(array('username'=>$username, 'email'=>$email)))
                {
                    $id = $user->getId();
                    //echo($key);
                    $url = $this->container->get('router')->getContext()->getHost().
                        $this->generateUrl(
                            'new_pass',
                            array('id'=>$id, 'key'=>$key));
                    $this->sendEmail($id, $url);
                }
                else echo('folse');
            }

        }
        return $this->render(
            'DDShopBundle:Replacepass:replace.html.twig',
            array('form' => $form->createView())
        );

    }
    private  function sendEmail($id, $url)
    {
        $message = \Swift_Message::newInstance()
            ->setSubject('Hello Email1')
            ->setFrom('semynovich.dmitriy@gmail.com')
            ->setTo('dima_7em@mail.ru')
            ->setBody("<a href='".$url."'/>")
        ;
        $this->get('mailer')->send($message);

        return $this->render('DDShopBundle::layout.html.twig');
    }


}