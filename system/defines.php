<?php
if (!defined('DS')) {
    define('DS', DIRECTORY_SEPARATOR);
}
if (isset($_SERVER['argc'])) {
    define('REAL_IP', 'none');
    define('IS_LEGACY_BROWSER', false);
} else {
    define('REAL_IP', $_SERVER['HTTP_X_REAL_IP'] ?? $_SERVER['REMOTE_ADDR']);
    define('IS_LEGACY_BROWSER', str_contains($_SERVER['HTTP_USER_AGENT'], 'IE 9'));
}
const DEBUGGER_IP_LIST = [];
define('IS_DEBUGGABLE', in_array(REAL_IP, DEBUGGER_IP_LIST, true));

const SYSTEM_DIR = __DIR__;
define('PUBLIC_DIR', dirname(SYSTEM_DIR).DS.'public');
define('STORAGE_DIR', dirname(SYSTEM_DIR).DS.'storage');

const USE_DEBUG_LOG = true;