<?php
use Service\Controller\Base\CronBase;
use Service\Model\Process\Cron\Daily\OneDailyPatch;
use Service\Model\Process\Cron\Daily\TwoDailyPatch;

include_once dirname(__DIR__) . '/common.init.php';

class Daily extends CronBase {
    protected function init()
    {
        parent::init();

        $this->targets[] = new OneDailyPatch();
        $this->targets[] = new TwoDailyPatch();
    }
}

$obj = new Daily();
$obj->execute();