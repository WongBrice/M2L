<?php

namespace M2L\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserController extends Controller
{
    public function indexAction()
    {
        return $this->render('M2LUserBundle:User:index.html.twig');
    }
}
