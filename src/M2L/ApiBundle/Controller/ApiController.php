<?php

namespace M2L\ApiBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class ApiController extends FOSRestController
{
    public function getApiAction()
    {
        $user = $this->get('security.context')->getToken()->getUser();
        $data = array("hello" => "world");
        $view = $this->view($data);
        return $this->handleView($view);
    }
}