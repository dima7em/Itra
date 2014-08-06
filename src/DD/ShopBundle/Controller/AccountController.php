<?php
namespace DD\ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use DD\ShopBundle\Form\Type\RegistrationType;
use DD\ShopBundle\Form\Model\Registration;

class AccountController extends Controller
{
    public function registerAction()
    {
        $registration = new Registration();
        $form = $this->createForm(new RegistrationType(), $registration, array(
            'action' => $this->generateUrl('account_create'),
        ));

        return $this->render(
            'DDShopBundle:Account:register.html.twig',
            array('form' => $form->createView())
        );
    }
}