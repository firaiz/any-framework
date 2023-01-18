<?php
namespace Service\Controller\Base;

use Firaiz\Ufl\Date;

abstract class CommandBase extends Base
{
    /** @var array allowed overwrite */
    protected array $singletons = array('conf' => 'Config', 'db' => 'Database');
    /** @var array allowed overwrite */
    protected array $instances = array('request' => 'Request');

    protected function getLogString(): bool|string
    {
        return json_encode([
            'date' => Date::nowString(),
            'requestType' => 'CLI'
        ]);
    }

    protected function getLogFileName(): string
    {
        return 'cmd-'.parent::getLogFileName();
    }


}