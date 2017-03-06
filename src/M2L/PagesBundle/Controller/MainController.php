<?php

namespace M2L\PagesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MainController extends Controller
{
    public function indexAction()
    {
        return $this->render('M2LPagesBundle:Main:index.html.twig');
    }
    
    public function contactAction()
    {
        return $this->render('M2LPagesBundle:Main:contact.html.twig');
    }
}
