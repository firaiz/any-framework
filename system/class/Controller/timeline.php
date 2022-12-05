<?php
use Service\Controller\Base\RoutingBase;

class Timeline extends RoutingBase {
    /**
     * @return void
     */
    public function execute()
    {
        switch($this->mode) {
            case 'test':
                $this->response->assign('text',"Hello Test Contents");
                break;
            case 'detect':
                $this->response->assign('text',"Hello Detect Contents");
                break;
            case 'excel':
                $this->response->assign('text',"Hello Excel Contents");
                break;
        }
        $this->response->html("index.tpl");
    }
}
