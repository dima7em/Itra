<?php

namespace Acme\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle;

class MaileController extends Controller
{
    public function indexAction($name)
    {
        $message = \Swift_Message::newInstance()
            ->setSubject('Hello Email')
            ->setFrom('semynovich.dmitriy@gmail.com')
            ->setTo('dima_7em@mail.ru')
            ->setBody('Here is the message itself')
        ;
        $this->get('mailer')->send($message);

        return $this->render('AcmeDemoBundle::layout.html.twig');
}
}