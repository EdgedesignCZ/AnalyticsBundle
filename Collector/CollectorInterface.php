<?php

namespace Edge\Bundle\AnalyticsBundle\Collector;

/**
 * Interface for writing analytics data into log file.
 *
 * @author roxtri <nikol.jezkova@edgedesign.cz>
 */
interface CollectorInterface
{
    public function writeData($data);
}
