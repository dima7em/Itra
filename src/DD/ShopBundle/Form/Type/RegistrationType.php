<?php
namespace DD\ShopBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('username')
                ->add('firstname')
                ->add('lastname')
                ->add('email')
                ->add('Password', 'repeated', array(
                      'first_name'  => 'password',
                      'second_name' => 'confirm',
                      'type'        => 'password',))
                ->add('Register', 'submit')
                ;
    }
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DD\ShopBundle\Entity\User'
        ));
    }

    public function getName()
    {
        return 'dd_shopbundle_user';
    }
}