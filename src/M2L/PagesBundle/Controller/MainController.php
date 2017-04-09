<?php

namespace M2L\PagesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use M2L\PagesBundle\Entity\Frais;
use M2L\PagesBundle\Form\FraisType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Ceci est le controller qui contiendra les fonctions dédiées à l'espace trésorier
 * et à ceux possédant le role "ROLE_ADMIN".
 */
class MainController extends Controller 
{
    
    /**
     * Cette fonction retourne vers la vue principale index.html.twig, qui est la page "Accueil"
     */
    public function indexAction() 
    {
        return $this->render('M2LPagesBundle:Main:index.html.twig');
    }
    
    /**
     * Cette fonction retourne vers la vue view.html.twig, qui est partie de la page "Note de Frais"
     */
    public function viewAction() 
    {
        return $this->render('M2LPagesBundle:Main:view.html.twig');
    }
    
    
    /**
     * Cette fonction sert à récupérer les informations de la table "frais"
     * pour les afficher sur la vue view de la page "Note de frais" en ajax
     */
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
                'motif' => $frais->getMotif(),
                'km' => $frais->getKm(),
                'cout' => $frais->getCout(),
                'peage' => $frais->getPeage(),
                'repas' => $frais->getRepas(),
                'heberg' => $frais->getHeberg(),
                'createdAt' => $frais->getCreatedAt()->format('Y/m/d à H:i'),
            ];
        }

        return new Response(json_encode($output), 200, ['Content-Type' => 'application/json']);
    }
    
    /**
     * Cette fonction retourne vers la vue frais.html.twig, qui est une partie de la page "Note de frais"
     * Elle sert également à récupérer les informations par le biais du formulaire qui se trouve sur la vue
     * et qui seront persistés dans la table "frais"
     */
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
    
    /**
     * Cette fonction retourne vers la vue contact.html.twig, qui est la page "Contact"
     */
    public function contactAction() 
    {
        return $this->render('M2LPagesBundle:Main:contact.html.twig');
    }
}
