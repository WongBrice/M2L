<?php

namespace M2L\PagesBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

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
