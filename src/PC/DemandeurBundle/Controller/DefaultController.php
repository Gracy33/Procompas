<?php

namespace PC\DemandeurBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('PCDemandeurBundle:Default:index.html.twig');
    }
}
