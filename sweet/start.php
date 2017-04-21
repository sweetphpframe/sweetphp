<?php
// +----------------------------------------------------------------------
// | SweetPHP
// +----------------------------------------------------------------------
// | Copyright (c) 2017  All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: MrYang
// +----------------------------------------------------------------------
declare(strict_types=1);
function __require($files,$isReturn=false)
{
    $return = [];
    $files=is_array($files)?$files:array($files);
    foreach ($files as $file) {
        $return[]=require_once $file;
    }
    if ($isReturn) {
        return count($return)==1?$return[0]:$return;
    }
}

function __include($files,$isReturn=false)
{
    $return = [];
    $files=is_array($files)?$files:array($files);
    foreach ($files as $file) {
        $return[]= include_once $file;
    }
    if ($isReturn) {
        return count($return)==1?$return[0]:$return;
    }
}

function dump($argc)
{
    echo "<pre>";
    var_dump($argc);
}
__require(__DIR__ . "/base.php");
\sweet\App::run();

