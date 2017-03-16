<?php

namespace M2L\PagesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class MainController extends Controller 
{

    public function indexAction() 
    {
        return $this->render('M2LPagesBundle:Main:index.html.twig');
    }
    
    public function fraisAction() 
    {
        return $this->render('M2LPagesBundle:Main:frais.html.twig');
    }

    public function contactAction() 
    {
        return $this->render('M2LPagesBundle:Main:contact.html.twig');
    }

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

        $users = $this->getDoctrine()->getRepository('M2LUserBundle:User')->search(
                $filters, $start, $length
        );

        $output = array(
            'data' => array(),
            'recordsFiltered' => count($this->getDoctrine()->getRepository('M2LUserBundle:User')->search($filters, 0, false)),
            'recordsTotal' => count($this->getDoctrine()->getRepository('M2LUserBundle:User')->search(array(), 0, false))
        );

        foreach ($users as $user) {
            $output['data'][] = [
                'username' => $user->getUsername(),
                'email' => $user->getEmail(),
                'birthdate' => $user->getBirthdate()->format('Y-m-d'),
            ];
        }

        return new Response(json_encode($output), 200, ['Content-Type' => 'application/json']);
    }
}
