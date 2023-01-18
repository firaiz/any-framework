<?php
namespace Service\Controller\Base;

use Firaiz\Ufl\Cron\ICron;

class CronBase extends CommandBase
{
    /** @var ICron[] */
    protected array $targets;

    /**
     * @return void
     */
    public function execute():void
    {
        foreach ($this->targets as $target) {
            $target->execute();
        }
    }
}
