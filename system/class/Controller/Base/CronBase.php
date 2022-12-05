<?php
namespace Service\Controller\Base;

use UflAs\Cron\ICron;

class CronBase extends CommandBase
{
    /** @var ICron[] */
    protected $targets;

    /**
     * @return void
     */
    public function execute()
    {
        foreach ($this->targets as $target) {
            $target->execute();
        }
    }
}
