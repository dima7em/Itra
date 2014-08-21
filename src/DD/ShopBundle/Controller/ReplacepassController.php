<?php
namespace DD\ShopBundle\Controller;


use Symfony\Component\BrowserKit\Response;
use Symfony\Component\Console\Helper\FormatterHelper;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class ReplacepassController extends Controller
{

    public function replaceAction(Request $request)
    {
        $form=$this->createReplacePassForm();
        if($request->getMethod()=='POST'){
            $form->bind($request);

            if ($form->isValid()) {
                $username = $form->getData();
                $username = $username['username'];
                $email = $form->getData();
                $email = $email['email'];
                return $this->forward('DDShopBundle:Replacepass:changeUser',
                    array('username' => $username, 'email'=>$email));
            }
        }
        return $this->render('DDShopBundle:Replacepass:replace.html.twig',
            array('form' => $form->createView()));
    }

    private function createReplacePassForm(){
        $password = array('message'=>'Type your message here');
        $form = $this->createFormBuilder($password)
            ->add('username', 'text')
            ->add('email','email')
            ->add('save', 'submit', array('label' => 'Create Post'))
            ->getForm();
        return $form;
    }

    public function changeUserAction(Request $request, $username, $email){
        $repository = $this->getDoctrine()->getRepository('DDShopBundle:User');
        if($user = $repository->findOneBy(array('username'=>$username, 'email'=>$email)))
        {
            $id = $user->getId();
            $passkey = sha1(uniqid($email, true));
            $date = new \DateTime();
            $date->modify('+1 hour');
            $user->setPasskey($passkey);
            $user->setDate($date);
            $this->getDoctrine()->getManager()->flush();

            $url = $request->getHost().$this->generateUrl('new',
                           array('id'=>$id, 'passkey'=>$passkey));

            return $this->sendEmail($email, $url);
        }
        else {
            $this->get('session')->getFlashBag()
                ->add('notice', 'We can not find a user with an email, check your input.');
            $form=$this->createReplacePassForm();
            return $this->render('DDShopBundle:Replacepass:replace.html.twig',
                array('form' => $form->createView()));
        }
    }


    private  function sendEmail($email, $url)
    {
        $message = \Swift_Message::newInstance()
            ->setSubject('DDShopBundle. Change Pass')
            ->setFrom('semynovich.dmitriy@gmail.com')
            ->setTo($email)
            ->setBody($this->renderView('DDShopBundle:Replacepass:email.txt.twig',
                                        array('url'=>$url)), 'text/html');

        $this->get('mailer')->send($message);
        $this->get('session')->getFlashBag()
            ->add('notice', 'On your e-mail was sent a link by clicking on which you
                             will be able to complete the password change');
        return $this->redirect($this->generateUrl('message'));
    }

    public function messageAction(){
        return $this->render('DDShopBundle:Replacepass:message.html.twig');
    }

    public function errorAction(){
        return $this->render('DDShopBundle:Replacepass:error.html.twig');
    }


    public function newAction(Request $request, $id, $passkey){

        $repository = $this->getDoctrine()->getRepository('DDShopBundle:User');
        $entity = $repository->findOneBy(array('id'=>$id, 'passkey'=>$passkey));
        if($entity && $entity->getDate()>new \DateTime())
        {
            $form = $this->createNewForm();
            if($request->getMethod()=='POST'){
                $form->bind($request);
                if ($form->isValid())
                {
                    $password = $form->getData();
                    $password = $password['Password'];
                    $passkey = sha1(uniqid($password, true));
                    $entity->setPassword($password);
                    $entity->setPasskey($passkey);
                    $this->getDoctrine()->getManager()->flush();

                    $this->get('session')->getFlashBag()
                        ->add('notice', 'Your password has been changed');
                    return $this->redirect($this->generateUrl('message'));
                }
            }
            return $this->render('DDShopBundle:Replacepass:new.html.twig',
                array('form' => $form->createView()));
        }
        else {
            $url = $request->getHttpHost().$this->generateUrl('replacepass');
            $this->get('session')->getFlashBag()
                ->add('notice', "Most likely your link invalid!
                                 <a href=http://". $url.">Try to generate a new page:</a>");
            //$form=$this->createReplacePassForm();
            return $this->render('DDShopBundle:Replacepass:error.html.twig');
        }
    }

    private function createNewForm(){
        $password = array('message'=>'Type your message here');
        $form = $this->createFormBuilder($password)
            ->add('Password', 'repeated', array(
                'first_name'  => 'password',
                'second_name' => 'confirm',
                'type'        => 'password',))
            ->add('save', 'submit', array('label' => 'Create Post'))
            ->getForm();
        return $form;
    }
}
