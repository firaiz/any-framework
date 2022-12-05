<?php
if ($_SERVER['SCRIPT_FILENAME'] === __FILE__) {
    header("", true, 404);
    exit;
}

include_once dirname(__DIR__).DIRECTORY_SEPARATOR.'system'.DIRECTORY_SEPARATOR.'common.init.php';