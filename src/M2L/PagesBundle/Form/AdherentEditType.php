<?php

namespace M2L\PagesBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

/*
 * Cette classe permet d'avoir l'interface de formulaire
 * pour la vue de modification des adhérents.
 */
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
