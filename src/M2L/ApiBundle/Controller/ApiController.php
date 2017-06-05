<?php

namespace M2L\ApiBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

/**
 * Ceci est le controller qui contiendra les fonctions dédiées à l'API
 */
class ApiController extends FOSRestController
{
    /**
     * Cette fonction retourne la page de l'api lorsque 
     * l'accès avec le token se fait avec succès.
     */
    public function getTestAction()
    {
        $user = $this->get('security.context')->getToken()->getUser();
        $data = array("hello" => "world");
        $view = $this->view($data);
        return $this->handleView($view);
    }
}