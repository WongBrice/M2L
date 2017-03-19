<?php

namespace M2L\PagesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class AdminController extends Controller 
{
    
    /**
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function tresorierAction() 
    {
        return $this->render('M2LPagesBundle:Main:tresorier.html.twig');
    }

    /**
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function listAction(Request $request) 
    {
        $length = $request->get('length');
        $length = $length && ($length != -1) ? $length : 0;

        $start = $request->get('start');
        $start = $length ? ($start && ($start != -1) ? $start : 0) / $length : 0;

        $search = $request->get('search');
        $filters = [
            'query' => @$search['value']
        ];

        $user = $this->getDoctrine()->getRepository('M2LUserBundle:User')->search(
                $filters, $start, $length
        );

        $output = array(
            'data' => array(),
            'recordsFiltered' => count($this->getDoctrine()->getRepository('M2LUserBundle:User')->search($filters, 0, false)),
            'recordsTotal' => count($this->getDoctrine()->getRepository('M2LUserBundle:User')->search(array(), 0, false))
        );

        foreach ($user as $user) 
        {
            $output['data'][] = [
                'username' => $user->getUsername(),
                'email' => $user->getEmail(),
                'first_name' => $user->getFirstName(),
                'last_name' => $user->getLastName(),
                'birthdate' => $user->getBirthdate()->format('Y-m-d'),
                'address' => $user->getAddress(),
                'city' => $user->getCity(),
                'postal_code' => $user->getPostalCode(),
                'phone' => $user->getPhone(),
                'licence' => $user->getLicence(),
                'ligue' => $user->getLigue(),
                'type' => $user->getType(),
            ];
        }

        return new Response(json_encode($output), 200, ['Content-Type' => 'application/json']);
    }
}
