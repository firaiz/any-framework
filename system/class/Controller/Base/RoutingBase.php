<?php
namespace Service\Controller\Base;

abstract class RoutingBase extends WebBase
{
    public function setMode($mode):void
    {
        // mode自動設定
        $this->mode = $mode;
    }
}