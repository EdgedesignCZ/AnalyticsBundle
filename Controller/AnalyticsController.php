<?php

namespace Edge\Bundle\AnalyticsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class AnalyticsController extends Controller
{

    /**
     * Return response with analytics.min.js
     *
     * @return Response
     */
    public function analyticsjsAction(Request $request)
    {
        $request->request->set('data', array(1,2,3));

        return $this->render('EdgeAnalyticsBundle:Analytics:analyticsjs.html.twig');
    }

    /**
     *
     * @return Response
     */
    public function collectAction(Request $request)
    {
        $data = $request->request->get('data');

        $collector = $this->get($this->container->getParameter("collector"));
        $collector->logged($data);

        return $this->render('EdgeAnalyticsBundle:Analytics:collect.html.twig');
    }

}
