<?php

namespace M2L\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('first_name', 'text', array(
                    'attr' => array(
                        'label' => 'Prénom',
                        'placeholder' => 'Votre Prénom'
                    )
                ))
                ->add('last_name', 'text', array(
                    'attr' => array(
                        'placeholder' => 'Votre Nom'
                    )
                ))
                ->add('birthdate', 'datetime', array(
                    'widget' => 'single_text',
                    'format' => 'yyyy-MM-dd',
                    'attr' => array(
                        'placeholder' => 'Votre Date de Naissance',
                        'class' => 'flatpickr'
                    )
                ))
                ->add('address', 'text', array(
                    'attr' => array(
                        'placeholder' => 'Votre Adresse'
                    )
                ))
                ->add('city', 'text', array(
                    'attr' => array(
                        'placeholder' => 'Votre Commune'
                    )
                ))
                ->add('postal_code', 'text', array(
                    'attr' => array(
                        'placeholder' => 'Votre Code Postal'
                    )
                ))
                ->add('phone', 'text', array(
                    'attr' => array(
                        'placeholder' => 'Votre N° de Téléphone'
                    )
                ))
                ->add('licence', 'text', array(
                    'attr' => array(
                        'placeholder' => 'Votre N° de Licence'
                    )
                ))
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
    
    public function configureOptions(OptionsResolver $resolver)
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
