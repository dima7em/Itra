<?php
namespace DD\ShopBundle\Controller;

use DD\ShopBundle\Entity\User;
use JsonSchema\Constraints\Object;
use Symfony\Component\Form\Extension\Validator\Constraints\Form;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Validator\Constraints\Null;

class ReplacepassController extends Controller
{

    public function replaceAction(Request $request)
    {
        $form=$this->createReplaceForm();
        if($request->getMethod()=='POST'){
            $form->bind($request);

            if ($form->isValid()) {
                $username = $form->getData();
                $username = $username['username'];
                $email = $form->getData();
                $email = $email['email'];
                return $this->redirect($this->generateUrl('change',
                            array('username' => $username, 'email'=>$email)));
            }
        }
        return $this->render('DDShopBundle:Replacepass:replace.html.twig',
                            array('form' => $form->createView()));
    }

    private function createReplaceForm(){
        $password = array('message'=>'Type your message here');
        $form = $this->createFormBuilder($password)
            ->add('username', 'text')
            ->add('email','email')
            ->add('save', 'submit', array('label' => 'Create Post'))
            ->getForm();
        return $form;
    }

    public function changeAction($username, $email){
        $repository = $this->getDoctrine()->getRepository('DDShopBundle:User');
        if($user = $repository->findOneBy(array('username'=>$username, 'email'=>$email)))
        {
            $id = $user->getId();
            $passkey = sha1(uniqid($email, true));
            $user->setPasskey($passkey);
            $this->getDoctrine()->getManager()->flush();

            $url = $this->container->get('router')->getContext()->getHost().
                    $this->generateUrl('new', array('id'=>$id, 'passkey'=>$passkey));

            return $this->sendEmail($email, $url);
        }
        else {
            $this->get('session')->getFlashBag()->add('notice', 'Password was as');
            $form=$this->createReplaceForm();
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
            ->setBody($this->renderView('DDShopBundle:Replacepass:email.txt.twig', array('url'=>$url)), 'text/html');

        $this->get('mailer')->send($message);
        return $this->redirect($this->generateUrl('message'));
    }

    public function messageAction(){
        return $this->render('DDShopBundle:Replacepass:message.html.twig');
    }

    public function newAction(Request $request, $id, $passkey){

        $repository = $this->getDoctrine()->getRepository('DDShopBundle:User');

        if($entity = $repository->findOneBy(array('id'=>$id, 'passkey'=>$passkey)))
        {
            $form = $this->createNewForm();
            if($request->getMethod()=='POST'){
                $form->bind($request);
                if ($form->isValid())
                {
                    $password = $form->getData();
                    $password = $password['Password'];
                    $entity->setPassword($password);
                    $this->getDoctrine()->getManager()->flush();
                }
            }
            return $this->render('DDShopBundle:Replacepass:new.html.twig',
                                array('form' => $form->createView()));
        }
        else {
            $this->get('session')->getFlashBag()->add('notice', 'Ваш ключ недействителен, попробуйте его обносить заполнив порму');
            $form=$this->createReplaceForm();
            return $this->render('DDShopBundle:Replacepass:replace.html.twig',
                array('form' => $form->createView()));
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
