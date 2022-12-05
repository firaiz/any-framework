<?php
error_reporting(E_ALL ^ E_NOTICE);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
ini_set('max_execution_time', 0);

// 複数環境時にここでconfigを切り分けるstaging=conf/staging.json
// 消すとdefault.jsonが呼ばれます
//putenv('SERVER_ENV=staging');

include_once __DIR__ . '/vendor/autoload.php';