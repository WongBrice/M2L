<?php

namespace M2L\PagesBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class FraisType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('trajet', TextType::class)
                ->add('motif', TextType::class)
                ->add('km', IntegerType::class)
                ->add('cout', 'number')
                ->add('peage', 'number')
                ->add('repas', 'number')
                ->add('heberg', 'number')
                ;
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'M2L\PagesBundle\Entity\Frais',
        ));
    }
    
    public function getName()
    {
        return 'm2l_pages_frais_add';
    }
}
