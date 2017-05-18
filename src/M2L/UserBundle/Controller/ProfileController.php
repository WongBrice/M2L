<?php

namespace M2L\UserBundle\Controller;

use FOS\UserBundle\Controller\ProfileController as BaseController;
use Symfony\Component\HttpFoundation\Request;

class ProfileController extends BaseController
{
    public function editAction(Request $request)
    {
        $response = parent::editAction($request);

        return $response;
    }
}
