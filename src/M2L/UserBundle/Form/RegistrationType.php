<?php

namespace M2L\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('first_name')
                ->add('last_name')
                ->add('address')
                ->add('city')
                ->add('postal_code')
                ->add('phone')
                ;
    }

    public function getParent()
    {
        return 'fos_user_registration';
    }

    public function getName()
    {
        return 'm2l_user_registration';
    }
}
