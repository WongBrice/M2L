<?php

namespace M2L\PagesBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('name', 'text')
                ->add('email', 'email')
                ->add('subject', 'text')
                ->add('content', 'textarea')
        ;
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'M2L\PagesBundle\Entity\Contact',
        ));
    }
    
    public function getName()
    {
        return 'm2l_pages_contact';
    }
}
