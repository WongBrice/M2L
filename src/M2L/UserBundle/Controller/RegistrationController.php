<?php

namespace M2L\UserBundle\Controller;

use FOS\UserBundle\Controller\RegistrationController as BaseController;
use Symfony\Component\HttpFoundation\Request;

/*
 * Ceci est le controller qui surchage les fonctions du controller RegistrationController
 * provenant du Bundle FOSUserBundle.
 */
class RegistrationController extends BaseController 
{
    /*
     * Cette fonction surchage celle provenant du Bundle FOSUserBundle,
     * permettant de retourner la vue "register.html.twig, qui est la page d'inscription.
     * La fonction est surchagée, dû aux rajouts apportés à la fonction mère.
     */
    public function registerAction(Request $request) 
    {
        $response = parent::registerAction($request);

        return $response;
    }
}
