<?php

use Service\Controller\Base\WebBase;

include_once 'front.init.php';

class Index extends WebBase {
    /**
     * @return void
     */
    public function execute(): void
    {
        $this->response->assign('text',"Hello Contents");
        $this->response->html("index.tpl");
    }
}

$index = new Index();
$index->execute();