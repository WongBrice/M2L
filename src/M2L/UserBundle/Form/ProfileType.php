<?php

namespace M2L\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProfileType extends AbstractType
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
        return 'fos_user_profile';
    }

    public function getName()
    {
        return 'm2l_user_profile';
    }
}
