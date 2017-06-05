<?php

namespace M2L\UserBundle\Controller;

use FOS\UserBundle\Controller\ProfileController as BaseController;
use Symfony\Component\HttpFoundation\Request;

/*
 * Ceci est le controller qui surchage les fonctions du controller ProfileController
 * provenant de FOSUserBundle.
 */
class ProfileController extends BaseController
{
    /*
     * Cette fonction surchage celle provenant du Bundle FOSUserBundle,
     * permettant de retourner la vue "show.html.twig, qui est la page de profile.
     * La fonction est surchagée, dû aux rajouts apportés à la fonction mère.
     */
    public function editAction(Request $request)
    {
        $response = parent::editAction($request);

        return $response;
    }
}
