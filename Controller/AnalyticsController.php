<?php

namespace Edge\Bundle\AnalyticsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class AnalyticsController extends Controller
{

    /**
     * Return response with analytics.min.js
     *
     * @return Response
     */
    public function analyticsjsAction()
    {
        return $this->render('EdgeAnalyticsBundle:Analytics:analyticsjs.html.twig');
    }

    /**
     *
     * @return Response
     */
    public function collectAction()
    {
        return $this->render('EdgeAnalyticsBundle:Analytics:collect.html.twig');
    }

}
