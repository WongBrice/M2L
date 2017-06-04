<?php

namespace M2L\PagesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use M2L\PagesBundle\Entity\Frais;
use M2L\PagesBundle\Entity\Adherent;
use M2L\PagesBundle\Entity\Contact;
use M2L\PagesBundle\Form\FraisType;
use M2L\PagesBundle\Form\FraisValidateType;
use M2L\PagesBundle\Form\FraisEditType;
use M2L\PagesBundle\Form\AdherentType;
use M2L\PagesBundle\Form\AdherentEditType;
use M2L\PagesBundle\Form\ContactType;
use Symfony\Component\HttpFoundation\Request;
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
    public function fraisAction(Request $request) 
    {
        $user = $this->container->get('security.context')->getToken()->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) 
        {
            throw new AccessDeniedException('This user does not have access to this section.');
        }
        
        $repository = $this
                ->getDoctrine()
                ->getManager()
                ->getRepository('M2LPagesBundle:Frais');

        $listFrais = $repository->findBy(array('user' => $user));
        
        if (!$listFrais) 
        {
            $request->getSession()->getFlashBag()->add('notice', 'Liste vide');
        }

        return $this->render('M2LPagesBundle:Main:frais.html.twig', array('listFrais' => $listFrais));
    }
    
    /**
     * Cette fonction retourne vers la vue add_frais.html.twig, qui est une partie de la page "Note de frais"
     * Elle sert également à récupérer les informations par le biais du formulaire qui se trouve sur la vue
     * et qui seront persistés dans la table "frais"
     */
    public function addfraisAction(Request $request) 
    {
        $user = $this->container->get('security.context')->getToken()->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) 
        {
            throw new AccessDeniedException('This user does not have access to this section.');
        }
        
        $frais = new Frais();

        $form = $this->get('form.factory')->create(new FraisType(), $frais);

        if ($form->handleRequest($request)->isValid()) 
        {
            
            $frais->setUser( $this->getUser() );

            $em = $this->getDoctrine()->getManager();

            $em->persist($frais);

            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Note de frais ajoutée');
            
            return $this->redirect($this->generateUrl('m2l_pages_frais', array('id' => $frais->getId())));
        }

        return $this->render('M2LPagesBundle:Main:add_frais.html.twig', array(
            'form' => $form->createView(),
        ));
    }
    
    /**
     * Cette fonction retourne vers la vue edit_frais.html.twig, qui est une partie de la page "Note de frais"
     * Elle sert également à modificer les informations persistés dans la table "frais"
     * par le biais du formulaire qui se trouve sur la vue
     */
    public function editfraisAction(Frais $frais, Request $request) 
    {
        $form = $this->get('form.factory')->create(new FraisEditType(), $frais);

        if ($form->handleRequest($request)->isValid()) 
        {
            $frais->setUser( $this->getUser() );

            $em = $this->getDoctrine()->getManager();

            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Note de frais modifiée');
            
            return $this->redirect($this->generateUrl('m2l_pages_frais', array('id' => $frais->getId())));
        }

        return $this->render('M2LPagesBundle:Main:edit_frais.html.twig', array(
            'frais' => $frais,
            'form' => $form->createView(),
        ));
    }
    
    /**
     * Cette fonction retourne vers la vue delete_frais.html.twig, qui est une partie de la page "Note de frais"
     * Elle sert également à effacer les informations persistés dans la table "frais"
     * par le biais du formulaire qui se trouve sur la vue
     */
    public function deletefraisAction(Frais $frais, Request $request) 
    {
        $em = $this->getDoctrine()->getManager();

        $form = $this->get('form.factory')->create();
        
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) 
        {
            $em->remove($frais);
            
            $em->flush();
            
            $request->getSession()->getFlashBag()->add('notice', 'Note de frais supprimée');
            
            return $this->redirect($this->generateUrl('m2l_pages_frais'));
        }

        return $this->render('M2LPagesBundle:Main:delete_frais.html.twig', array(
            'frais' => $frais,
            'form' => $form->createView(),
        ));
    }
    
    /**
     * Cette fonction retourne vers la vue validate_frais.html.twig, qui est une partie de la page "Espace trésorier"
     * Elle sert également à modificer les informations persistés dans la table "frais"
     * par le biais du formulaire qui se trouve sur la vue
     */
    public function validatefraisAction(Frais $frais, Request $request) 
    {
        $form = $this->get('form.factory')->create(new FraisValidateType(), $frais);

        if ($form->handleRequest($request)->isValid()) 
        {
            $em = $this->getDoctrine()->getManager();

            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Note de frais validée');
            
            return $this->redirect($this->generateUrl('m2l_pages_tresorier', array('id' => $frais->getId())));
        }

        return $this->render('M2LPagesBundle:Main:validate_frais.html.twig', array(
            'frais' => $frais,
            'form' => $form->createView(),
        ));
    }
    
    /**
     * Cette fonction retourne vers la vue adherent.html.twig, qui est la page "Espace Représentant"
     */
    public function adherentAction(Request $request) 
    {
        $user = $this->container->get('security.context')->getToken()->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) 
        {
            throw new AccessDeniedException('This user does not have access to this section.');
        }
        
        $repository = $this
                ->getDoctrine()
                ->getManager()
                ->getRepository('M2LPagesBundle:Adherent');

        $listAdherent = $repository->findBy(array('user' => $user));
        
        if (!$listAdherent) 
        {
            $request->getSession()->getFlashBag()->add('notice', 'Liste vide');
        }

        return $this->render('M2LPagesBundle:Main:adherent.html.twig', array('listAdherent' => $listAdherent));
    }
    
    /**
     * Cette fonction retourne vers la vue add_adherent.html.twig, qui est une partie de la page "Espace Représentant"
     * Elle sert également à récupérer les informations par le biais du formulaire qui se trouve sur la vue
     * et qui seront persistés dans la table "adherent"
     */
    public function addadherentAction(Request $request) 
    {
        $user = $this->container->get('security.context')->getToken()->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) 
        {
            throw new AccessDeniedException('This user does not have access to this section.');
        }
        
        $adherent = new Adherent();

        $form = $this->get('form.factory')->create(new AdherentType(), $adherent);

        if ($form->handleRequest($request)->isValid()) 
        {
            $adherent->setUser( $this->getUser() );

            $em = $this->getDoctrine()->getManager();

            $em->persist($adherent);

            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Adhérent ajouté');
            
            return $this->redirect($this->generateUrl('m2l_pages_adherent', array('id' => $adherent->getId())));
        }

        return $this->render('M2LPagesBundle:Main:add_adherent.html.twig', array(
            'form' => $form->createView(),
        ));
    }
    
    /**
     * Cette fonction retourne vers la vue edit_adherent.html.twig, qui est une partie de la page "Espace Représentant"
     * Elle sert également à modificer les informations persistés dans la table "adherent"
     * par le biais du formulaire qui se trouve sur la vue
     */
    public function editadherentAction(Adherent $adherent, Request $request) 
    {
        $form = $this->get('form.factory')->create(new AdherentEditType(), $adherent);

        if ($form->handleRequest($request)->isValid()) 
        {
            $adherent->setUser( $this->getUser() );

            $em = $this->getDoctrine()->getManager();

            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Adhérent modifié');
            
            return $this->redirect($this->generateUrl('m2l_pages_adherent', array('id' => $adherent->getId())));
        }

        return $this->render('M2LPagesBundle:Main:edit_adherent.html.twig', array(
            'adherent' => $adherent,
            'form' => $form->createView(),
        ));
    }
    
    /**
     * Cette fonction retourne vers la vue delete_adherent.html.twig, qui est une partie de la page "Espace Représentant"
     * Elle sert également à effacer les informations persistés dans la table "adherent"
     * par le biais du formulaire qui se trouve sur la vue
     */
    public function deleteadherentAction(Adherent $adherent, Request $request) 
    {
        $em = $this->getDoctrine()->getManager();

        $form = $this->get('form.factory')->create();
        
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) 
        {
            $em->remove($adherent);
            
            $em->flush();
            
            $request->getSession()->getFlashBag()->add('notice', 'Adhérent supprimé');
            
            return $this->redirect($this->generateUrl('m2l_pages_adherent'));
        }

        return $this->render('M2LPagesBundle:Main:delete_adherent.html.twig', array(
            'adherent' => $adherent,
            'form' => $form->createView(),
        ));
    }
    
    /**
     * Cette fonction retourne vers la vue contact.html.twig, qui est la page "Contact"
     */
    public function contactAction(Request $request) 
    {
        $contact = new Contact();

        $form = $this->get('form.factory')->create(new ContactType(), $contact);

        if ($form->handleRequest($request)->isValid()) 
        {
            $em = $this->getDoctrine()->getManager();

            $em->persist($contact);

            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Votre message a bien été envoyé. Il sera traité dans les plus brefs délais.');
            
            return $this->redirect($this->generateUrl('m2l_pages_contact_success', array('id' => $contact->getId())));
        }

        return $this->render('M2LPagesBundle:Main:contact.html.twig', array(
            'form' => $form->createView(),
        ));
    }
    
    /**
     * Cette fonction retourne vers la vue contact_success.html.twig, qui est la page "Contact"
     */
    public function contactsuccessAction() 
    {
        return $this->render('M2LPagesBundle:Main:contact_success.html.twig');
    }
}
