<?php

namespace M2L\PagesBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/*
 * Cette classe permet d'avoir l'interface de formulaire
 * pour la vue de saisie des adhérents.
 */
class AdherentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('adh_first_name', 'text')
                ->add('adh_last_name', 'text')
                ->add('adh_birthdate', 'datetime', array(
                    'widget' => 'single_text',
                    'format' => 'yyyy-MM-dd',
                    'attr' => array(
                        'class' => 'flatpickr'
                    )
                ))
                ->add('adh_address', 'text')
                ->add('adh_city', 'text')
                ->add('adh_postal_code', 'text')
                ->add('adh_phone', 'text')
                ->add('adh_licence', 'text')
                ->add('adh_ligue', 'choice', array(
                    'choices' => array(
                        'Football' => 'Football',
                        'Tennis' => 'Tennis',
                        'Natation' => 'Natation',
                        'Judo' => 'Judo',
                    )
                ))
        ;
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'M2L\PagesBundle\Entity\Adherent',
        ));
    }
    
    public function getName()
    {
        return 'm2l_pages_adherent_add';
    }
}
