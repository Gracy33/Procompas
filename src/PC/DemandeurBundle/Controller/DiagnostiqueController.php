<?php

namespace PC\DemandeurBundle\Controller;

use PC\DemandeurBundle\Entity\DiagnostiqueResult;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class DiagnostiqueController extends Controller
{
    public function calculeAction(Request $request)
    {
        $donnes = array('q1a1'=> 2, 'q1a2' => 1, 'q1a3'=> 3, 'q1a4' => 3, 'q1b1' => 3, 'q1b2' =>3, 'q1b3' =>2, 'q1b4' => 1, 
            'q1c1' =>3, 'q1c2' => 3, 'q1c3' =>3, 'q1c4' =>2, 'q2a1'=>2, 'q2a2' =>1, 'q2a3'=>3, 'q2a4' => 3, 'q2b1' => 2, 
            'q2b2' =>0, 'q2b3' =>2, 'q2b4' => 1, 'q2c1' =>3, 'q2c2' => 3, 'q2c3' =>3, 'q2c4' =>2,  'q3a1'=>2, 'q3a2' =>1, 
            'q3a3'=>0, 'q3a4' => 3, 'q3b1' => 2, 'q3b2' =>3, 'q3b3' =>2, 'q3b4' => 1, 'q3c1' =>3, 'q3c2' => 2, 'q3c3' =>1, 'q3c4' =>0);
        
        $total1a=0;
        $total1b =0;
        $total1c= 0;
        
        $total2a = 0;
        $total2b =0;
        $total2c = 0;
        
        $total3a= 0;
        $total3b = 0;
        $total3c = 0;
        foreach($donnes as $cle => $points)
        {
            if($cle == 'q1a1' || $cle == 'q1a2' || $cle == 'q1a3' || $cle == 'q1a4')
            {
               $total1a += $points;  
            }
            else if($cle == 'q1b1' || $cle == 'q1b2' || $cle == 'q1b3' || $cle == 'q1b4')
            {
                $total1b += $points;
            }
            else if($cle == 'q1c1' || $cle == 'q1c2' || $cle == 'q1c3' || $cle == 'q1c4')
            {
                $total1c += $points;
            }
            else if($cle == 'q2a1' || $cle == 'q2a2' || $cle == 'q2a3' || $cle == 'q2a4')
            {
               $total2a += $points;  
            }
            else if($cle == 'q2b1' || $cle == 'q2b2' || $cle == 'q2b3' || $cle == 'q2b4')
            {
                $total2b += $points;
            }
            else if($cle == 'q2c1' || $cle == 'q2c2' || $cle == 'q2c3' || $cle == 'q2c4')
            {
                $total2c += $points;
            }
            else if($cle == 'q3a1' || $cle == 'q3a2' || $cle == 'q3a3' || $cle == 'q3a4')
            {
               $total3a += $points;  
            }
            else if($cle == 'q3b1' || $cle == 'q3b2' || $cle == 'q3b3' || $cle == 'q3b4')
            {
                $total3b += $points;
            }
            else if($cle == 'q3c1' || $cle == 'q3c2' || $cle == 'q3c3' || $cle == 'q3c4')
            {
                $total3c += $points;
            }
            
        }
        $totalQ1 = $total1a + $total1b + $total1c;
        $totalQ2 = $total2a + $total2b +$total2c;
        $totalQ3 = $total3a + $total3b +$total3c;
        $em =$this->getDoctrine()->getManager();

        if($totalQ1 >= 22 && $totalQ2 >= 22 && $totalQ3 >= 22 && $total1a >=7 && $total1b >=7 && $total1c >=7
                && $total2a >=7 && $total2b >=7 && $total2c >=7 && $total3a >=7 && $total3b >=7 && $total3c >=7)
        {
            $diagnostiqueRepository = $em->getRepository('PCDemandeurBundle:DiagnostiqueResult')->find(1);

            //$result = "Recherche autonome";
        }
        else if($totalQ1 >= 22 && $totalQ2 >= 22 && $totalQ3 >= 22 && $total1a < 7 
                || $totalQ1 >= 22 && $totalQ2 >= 22 && $totalQ3 >= 22 && $total1b <7 
                || $totalQ1 >= 22 && $totalQ2 >= 22 && $totalQ3 >= 22 && $total1c <7
                 || $totalQ1 >= 22 && $totalQ2 >= 22 && $totalQ3 >= 22 && $total3a <7
                || $totalQ1 >= 22 && $totalQ2 >= 22 && $totalQ3 >= 22 && $total3b <7 
                || $totalQ1 >= 22 && $totalQ2 >= 22 && $totalQ3 >= 22 && $total3c <7 )
        {
             $diagnostiqueRepository = $em->getRepository('PCDemandeurBundle:DiagnostiqueResult')->find(2);
            //$result = "Recherche active assistée par le diagnostic ";
        }
        else if($totalQ1 >= 22 && $totalQ3 >= 22 && $total2a < 7
                || $totalQ1 >= 22 && $totalQ3 >= 22 && $total2b <7 
                || $totalQ1 >= 22 && $totalQ3 >= 22 && $total2c <7 )
        {
             $diagnostiqueRepository = $em->getRepository('PCDemandeurBundle:DiagnostiqueResult')->find(3);
            //$result = "Accompagnement projet pro autonome";
        }
        else if($totalQ1 < 22 && $totalQ1 >= 18 && $totalQ3 < 22 && $totalQ3 >= 18 && $total2a <7
                || $totalQ1 < 22 && $totalQ1 >= 18 && $totalQ3 < 22 && $totalQ3 >= 18 && $total2b <7
                || $totalQ1 < 22 && $totalQ1 >= 18 && $totalQ3 < 22 && $totalQ3 >= 18 && $total2c <7)
        {
             $diagnostiqueRepository = $em->getRepository('PCDemandeurBundle:DiagnostiqueResult')->find(4);
             //$result = "Accompagnement projet pro assisté";
        }
        else if($totalQ1 <22 && $totalQ1 >= 18 || $totalQ2 <22 && $totalQ2 >= 18 || $totalQ3 <22 && $totalQ3 >= 18 )
        {
             $diagnostiqueRepository = $em->getRepository('PCDemandeurBundle:DiagnostiqueResult')->find(5);
            //$result = "Création projet pro autonome avec les outils";
        }
        else if($totalQ1 < 18 || $totalQ2 < 18 || $totalQ3 < 18)
        {
             $diagnostiqueRepository = $em->getRepository('PCDemandeurBundle:DiagnostiqueResult')->find(6);
            //$result = "Création projet pro assisté ";
        }
        $titre = $diagnostiqueRepository->getTitre();
        $explication = $diagnostiqueRepository->getExplication();
        $content = $this->get('templating')->render('PCDemandeurBundle:Diagnostique:resultat.html.twig', array('a' => $total1a, 'b' =>$total1b, 'c' => $total1c, 
            'total' => $totalQ1, 'total1' => $totalQ2, 'total2' => $totalQ3, 'titre' => $titre, 'explication'=>$explication ));
        return new Response($content);
     
    }
}
