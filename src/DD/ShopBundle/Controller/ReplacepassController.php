<?php
namespace DD\ShopBundle\Controller;

use DD\ShopBundle\Entity\User;
use Symfony\Component\Form\Extension\Validator\Constraints\Form;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ReplacepassController extends Controller
{

    private function createMyForm(){
        $password = array('message'=>'Type your message here');
        $form = $this->createFormBuilder($password)
            ->add('username', 'text')
            ->add('email','email')
            ->add('save', 'submit', array('label' => 'Create Post'))
            ->getForm();

        return $form;
    }
    public function replaceAction(Request $request)
    {
        $form=$this->createMyForm();
        if($request->getMethod()=='POST'){
            $form->bind($request);

            if ($form->isValid()) {
                $username = $form->getData();
                $username = $username['username'];
                $email = $form->getData();
                $email = $email['email'];
                $repository = $this->getDoctrine()->getRepository('DDShopBundle:User');
                if($user = $repository->findOneBy(array('username'=>$username, 'email'=>$email)))
                {
                    $id = $user->getId();
                    $passkey = sha1(uniqid($email, true));
                    $user->setPasskey($passkey);
                    $this->getDoctrine()->getManager()->flush();
                    $url = $this->container->get('router')->getContext()->getHost().
                        $this->generateUrl('new_pass', array('id'=>$id, 'passkey'=>$passkey));
                    $this->sendEmail($id, $email, $url);
                }
                else echo('folse');
            }
        }
        return $this->render('DDShopBundle:Replacepass:replace.html.twig', array('form' => $form->createView()));
    }

    private  function sendEmail($id, $email, $url)
    {
        $message = \Swift_Message::newInstance()
            ->setSubject('Hello Email1')
            ->setFrom('semynovich.dmitriy@gmail.com')
            ->setTo($email)
            ->setBody($this->renderView('DDShopBundle:Replacepass:email.txt.twig', array('url'=>$url)), 'text/html');
        $this->get('mailer')->send($message);
    return $this->render('DDShopBundle::layout.html.twig');
    }


}