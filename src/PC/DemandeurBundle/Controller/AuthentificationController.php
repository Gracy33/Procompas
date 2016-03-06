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
      
        $form=$this->createFormBuilder(new Utilisateur)
                ->add('login')
                ->add('password')
                ->add('save',  SubmitType::class, array('label'=>'Login'))
                ->getForm();
        
        $form->handleRequest($request);
      
        if($request->isMethod('post') && $form->isValid())
        {
            $array = $request->request->get('form');
            $login;
            $password;
            foreach($array as $key => $valeur)
            {
                if($key == 'login')
                {
                    $login = $valeur;
                }
                if($key == 'password')
                {
                    $password = $valeur;
                }
            }
            
            $em = $this->getDoctrine()->getManager();
            $utilisateur = $em->getRepository('PCDemandeurBundle:Utilisateur')->findBy(array('login' => $login, 'password' => $password));
        
            $prenom = $utilisateur[0]->getPrenom();
            $nom = $utilisateur[0]->getNom();
        
            $session = $request->getSession();
            $session->set('prenom',$prenom );
            $session->set('nom', $nom);
            $content = $this->get('templating')->render('PCDemandeurBundle:Diagnostique:resultat.html.twig', array('prenom' =>$prenom));
            return new Response($content);
        }

        return $this->render('PCDemandeurBundle:Authentification:index.html.twig', array('form' =>$form->createView()));

    }
    public function inscriptionAction(Request $request){
        $utilisateur = new Utilisateur();
        
        
    }
    public function connectAction(Request $request)
    {
        $login= 'polo';
        $password = 'polo';
        $em = $this->getDoctrine()->getManager();
        $utilisateur = $em->getRepository('PCDemandeurBundle:Utilisateur')->findBy(array('login' => $login, 'password' => $password));
        
        $prenom = $utilisateur[0]->getPrenom();
        $nom = $utilisateur[0]->getNom();
        
            $session = $request->getSession();
            $session->set('prenom',$prenom );
            $session->set('nom', $nom);
            $content = $this->get('templating')->render('PCDemandeurBundle:Authentification:index.html.twig', array('prenom' =>$prenom));
            return new Response($content);
     
//            $content = $this->get('templating')->render('PCDemandeurBundle:Authentification:index.html.twig');
//            return new Response($content);
//      
    }
    
    public function disconnectAction()
    {
        $this->get('session')->clear();
        $content = $this->get('templating')->render('PCDemandeurBundle:Authentification:index.html.twig', array('prenom' =>$prenom));
            return new Response($content);
     
    }
}

