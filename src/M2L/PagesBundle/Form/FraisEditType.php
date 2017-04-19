<?php

namespace M2L\PagesBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class FraisEditType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->remove('createdAt', 'datetime')
            ;
    }
    
    public function getParent() 
    {
        return FraisType::class;
    }

}
