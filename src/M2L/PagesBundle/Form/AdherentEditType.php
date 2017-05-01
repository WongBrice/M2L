<?php

namespace M2L\PagesBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class AdherentEditType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
    }
    
    public function getParent() 
    {
        return AdherentType::class;
    }

}
