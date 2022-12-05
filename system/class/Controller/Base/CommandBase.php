<?php
namespace Service\Controller\Base;

use UflAs\Date;

abstract class CommandBase extends Base
{
    /** @var array allowed overwrite */
    protected $singletons = array('conf' => 'Config', 'db' => 'Database');
    /** @var array allowed overwrite */
    protected $instances = array('request' => 'Request');

    protected function getLogString()
    {
        return json_encode([
            'date' => Date::nowString(),
            'requestType' => 'CLI'
        ]);
    }

    protected function getLogFileName()
    {
        return 'cmd-'.parent::getLogFileName();
    }


}