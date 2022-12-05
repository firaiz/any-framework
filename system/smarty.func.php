<?php
if (!function_exists('add_file_hash')) {
    function add_file_hash($fileName, $paramName = null) {
        if (!file_exists(PUBLIC_DIR.DS.$fileName)) {
            return $fileName;
        }
        return $fileName.'?'.(is_null($paramName) ? '' : $paramName.'=').hash_file('haval160,4', PUBLIC_DIR.DS.$fileName);
    }
}
