<?php
namespace Service\Controller;

use Service\Controller\Base\RoutingBase;

class Timeline extends RoutingBase {
    /**
     * @return void
     */
    public function execute(): void
    {
        $this->response->assign('text',"Hello execute Contents");
        $this->response->html("index.tpl");
    }

    public function display($test)
    {
        $this->response->setLayout(null);
        $this->response->assign('text',"Hello Test Contents");
        $this->response->html("index.tpl");
    }
}
