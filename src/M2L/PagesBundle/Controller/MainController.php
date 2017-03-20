<?php

namespace M2L\PagesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use M2L\PagesBundle\Entity\Frais;
use M2L\PagesBundle\Form\FraisType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class MainController extends Controller 
{

    public function indexAction() 
    {
        return $this->render('M2LPagesBundle:Main:index.html.twig');
    }
    
    public function viewAction() 
    {
        return $this->render('M2LPagesBundle:Main:view.html.twig');
    }
    
    public function listfraisAction(Request $request) 
    {
        $length = $request->get('length');
        $length = $length && ($length != -1) ? $length : 0;

        $start = $request->get('start');
        $start = $length ? ($start && ($start != -1) ? $start : 0) / $length : 0;

        $search = $request->get('search');
        $filters = [
            'query' => @$search['value']
        ];

        $frais = $this->getDoctrine()->getRepository('M2LPagesBundle:Frais')->search(
                $filters, $start, $length
        );

        $output = array(
            'data' => array(),
            'recordsFiltered' => count($this->getDoctrine()->getRepository('M2LPagesBundle:Frais')->search($filters, 0, false)),
            'recordsTotal' => count($this->getDoctrine()->getRepository('M2LPagesBundle:Frais')->search(array(), 0, false))
        );

        foreach ($frais as $frais) 
        {
            $output['data'][] = [
                'trajet' => $frais->getTrajet(),
                'km' => $frais->getKm(),
                'peage' => $frais->getPeage(),
                'repas' => $frais->getRepas(),
                'heberg' => $frais->getHeberg(),
                'createdAt' => $frais->getCreatedAt()->format('Y/m/d à H:i'),
            ];
        }

        return new Response(json_encode($output), 200, ['Content-Type' => 'application/json']);
    }
    
    public function fraisAction(Request $request) 
    {
        $frais = new Frais();

        $form = $this->get('form.factory')->create(new FraisType(), $frais);

        if ($form->handleRequest($request)->isValid()) {

            $em = $this->getDoctrine()->getManager();

            $em->persist($frais);

            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Note de frais ajoutée');
            
            return $this->redirect($this->generateUrl('m2l_pages_view', array('id' => $frais->getId())));
        }

        return $this->render('M2LPagesBundle:Main:frais.html.twig', array(
                    'form' => $form->createView(),
        ));
    }

    public function contactAction() 
    {
        return $this->render('M2LPagesBundle:Main:contact.html.twig');
    }
}
