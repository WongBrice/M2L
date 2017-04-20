<?php

namespace M2L\PagesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use M2L\PagesBundle\Entity\Frais;
use M2L\PagesBundle\Form\FraisType;
use M2L\PagesBundle\Form\FraisEditType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use FOS\UserBundle\Model\UserInterface;

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
     * Cette fonction retourne vers la vue frais.html.twig, qui est la page "Note de Frais"
     */
    public function fraisAction() 
    {
        $user = $this->container->get('security.context')->getToken()->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }
        
        $repository = $this
                ->getDoctrine()
                ->getManager()
                ->getRepository('M2LPagesBundle:Frais');

        $listFrais = $repository->findBy(array('user' => $user));

        if (!$listFrais) {
            throw new NotFoundHttpException("Aucune note trouvée");
        }

        return $this->render('M2LPagesBundle:Main:frais.html.twig', array('listFrais' => $listFrais));
    }
    
    /**
     * Cette fonction retourne vers la vue add.html.twig, qui est une partie de la page "Note de frais"
     * Elle sert également à récupérer les informations par le biais du formulaire qui se trouve sur la vue
     * et qui seront persistés dans la table "frais"
     */
    public function addfraisAction(Request $request) 
    {
        $user = $this->container->get('security.context')->getToken()->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }
        
        $frais = new Frais();

        $form = $this->get('form.factory')->create(new FraisType(), $frais);

        if ($form->handleRequest($request)->isValid()) {
            
            $frais->setUser( $this->getUser() );

            $em = $this->getDoctrine()->getManager();

            $em->persist($frais);

            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Note de frais ajoutée');
            
            return $this->redirect($this->generateUrl('m2l_pages_frais', array('id' => $frais->getId())));
        }

        return $this->render('M2LPagesBundle:Main:add.html.twig', array(
            'form' => $form->createView(),
        ));
    }
    
    /**
     * Cette fonction retourne vers la vue edit.html.twig, qui est une partie de la page "Note de frais"
     * Elle sert également à modificer les informations persistés dans la table "frais"
     * par le biais du formulaire qui se trouve sur la vue
     */
    public function editfraisAction(Frais $frais, Request $request) 
    {
        $form = $this->get('form.factory')->create(new FraisEditType(), $frais);

        if ($form->handleRequest($request)->isValid()) {
            
            $frais->setUser( $this->getUser() );

            $em = $this->getDoctrine()->getManager();

            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Note de frais modifiée');
            
            return $this->redirect($this->generateUrl('m2l_pages_frais', array('id' => $frais->getId())));
        }

        return $this->render('M2LPagesBundle:Main:edit.html.twig', array(
            'frais' => $frais,
            'form' => $form->createView(),
        ));
    }
    
    /**
     * Cette fonction retourne vers la vue delete.html.twig, qui est une partie de la page "Note de frais"
     * Elle sert également à effacer les informations persistés dans la table "frais"
     * par le biais du formulaire qui se trouve sur la vue
     */
    public function deletefraisAction(Frais $frais, Request $request) 
    {
        $em = $this->getDoctrine()->getManager();

        $form = $this->get('form.factory')->create();
        
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            
            $em->remove($frais);
            
            $em->flush();
            
            $request->getSession()->getFlashBag()->add('notice', 'Note de frais supprimée');
            
            return $this->redirect($this->generateUrl('m2l_pages_frais'));
        }

        return $this->render('M2LPagesBundle:Main:delete.html.twig', array(
            'frais' => $frais,
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
