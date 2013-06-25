<?php

namespace Edge\Bundle\AnalyticsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function jsAction($name)
    {
        return $this->render('EdgeAnalyticsBundle:Default:js.html.twig', array('name' => $name));
    }
}
