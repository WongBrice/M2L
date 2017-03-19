<?php

namespace M2L\UserBundle\Controller;

use FOS\UserBundle\Controller\ProfileController as BaseController;

class ProfileController extends BaseController
{
    public function editAction()
    {
        $response = parent::editAction();

        return $response;
    }
}
