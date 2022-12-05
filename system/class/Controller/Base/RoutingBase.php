<?php
namespace Service\Controller\Base;

abstract class RoutingBase extends WebBase
{
    protected function init()
    {
        parent::init();
    }

    public function setMode($mode) {
        // mode自動設定
        $this->mode = $mode;
    }
}