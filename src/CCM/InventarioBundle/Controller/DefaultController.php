<?php

namespace CCM\InventarioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('InventarioBundle:Default:index.html.twig', array('name' => $name));
    }
}
