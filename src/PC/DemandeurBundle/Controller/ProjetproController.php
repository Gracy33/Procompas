<?php

namespace PC\DemandeurBundle\Controller;

use PC\DemandeurBundle\Entity\DiagnostiqueResult;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class ProjetproController extends Controller
{
    public function projetAction(Request $request)
    {
        return $this->get('templating')->renderResponse('PCDemandeurBundle:Projetpro:projetpro.html.twig');
    }
}
