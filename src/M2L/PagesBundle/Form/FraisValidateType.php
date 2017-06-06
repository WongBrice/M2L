<?php

namespace M2L\PagesBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

/*
 * Cette classe permet d'avoir l'interface de formulaire
 * pour la vue de validation des frais.
 */
class FraisValidateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('validate', 'choice', array(
                    'choices' => array(
                        'Valide' => 'Valide',
                    )
                ))
        ;
    }

}
