<?php

namespace Edge\Bundle\AnalyticsBundle\Controller;

use Edge\Bundle\AnalyticsBundle\Collector\CollectorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

/**
 * AnalyticsController start js sctipt, which send post data to actionto send and wtite data into log.
 *
 * @author roxtri <nikol.jezkova@edgedesign.cz>
 */
class AnalyticsController extends Controller
{

    /**
     * Return response with analytics.min.js
     *
     * @return Response
     */
    public function analyticsjsAction()
    {
        $path = __DIR__ . '/../' . 'Resources/public/analytics.min.js';
        $obsah = file_get_contents($path);

        $response = new Response();
        $response->headers->set('Content-Type', 'text/javascript');
        $response->setContent($obsah);

        return $response;
    }

    /**
     * Write data into Log file.
     *
     * @return Response
     */
    public function collectAction(Request $request)
    {
        $data = $request->request->all();

        $collector = $this->get($this->container->getParameter("collector"));
        if (!$collector instanceof CollectorInterface) {
            throw new \InvalidArgumentException('Collector must be instence of Edge\Bundle\AnalyticsBundle\Collector\CollectorInterface');
        }

        if ($data) {
            $collector->writeData($data);
        }

        $path = __DIR__ . '/../' . 'Resources/public/ea.gif';
        $obsah = @file_get_contents($path);

        $response = new Response();
        $response->headers->set('Content-Type', 'image/jpeg');
        $response->setContent($obsah);

        return $response;
    }

}