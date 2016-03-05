<?php

namespace PC\DemandeurBundle\Controller;

use PC\DemandeurBundle\Entity\Utilisateur;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Exception\Core\Type\TextType;

class AuthentificationController extends Controller
{
    public function indexAction(Request $request){
        
        $content = $this->get('templating')->render('PCDemandeurBundle:Authentification:index.html.twig');
        return new Response($content);
//     $utilisateur = new Utilisateur();
//
//        $form = $this->createFormBuilder($utilisateur)
//            ->add('nom', TextType::class)
//            ->add('prenom', DateType::class)
//            ->add('save', SubmitType::class, array('label' => 's\'enregistrer'))
//            ->getForm();
//
//        return $this->render('PCDemandeurBundle:Authentification:index.html.twig', array(
//            'form' => $form->createView(),
//        ));
    }
    public function connectAction(Request $request)
    {
        $login= 'elo';
        $password = 'elo';
        $em = $this->getDoctrine()->getManager();
        $utilisateur = $em->getRepository('PCDemandeurBundle:Utilisateur')->findBy(array('login' => $login, 'password' => $password));
        
        $prenom = $utilisateur[0]->getPrenom();
        
            $session = $request->getSession();
            $session->set('prenom',$prenom );
            $content = $this->get('templating')->render('PCDemandeurBundle:Authentification:index.html.twig', array('prenom' =>$prenom));
            return new Response($content);
     
//            $content = $this->get('templating')->render('PCDemandeurBundle:Authentification:index.html.twig');
//            return new Response($content);
//            
        

    }
    
//    public function disconnect()
//    {
//        $this->get('session')->clear();
//    }
}

