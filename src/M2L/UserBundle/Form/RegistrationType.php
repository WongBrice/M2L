<?php

namespace M2L\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('first_name', 'text')
                ->add('last_name', 'text')
                ->add('birthdate', 'datetime', array(
                    'widget' => 'single_text',
                    'format' => 'yyyy-MM-dd',
                    'attr' => array(
                        'class' => 'flatpickr'
                    )
                ))
                ->add('address', 'text')
                ->add('city', 'text')
                ->add('postal_code', 'text')
                ->add('phone', 'text')
                ->add('licence', 'text')
                ->add('ligue', 'choice', array(
                    'choices' => array(
                        'Football' => 'Football',
                        'Tennis' => 'Tennis',
                        'Natation' => 'Natation',
                        'Judo' => 'Judo',
                    )
                ))
                ->add('type', 'choice', array(
                    'choices' => array(
                        'Adhérent' => 'Adhérent',
                        'Représentant' => 'Représentant',
                    )
                ))
                ;
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'M2L\UserBundle\Entity\User',
        ));
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
