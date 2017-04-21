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

namespace sweet;

class Error
{
    public static function register()
    {
        error_reporting(E_ALL);
        set_error_handler([__CLASS__, 'appError']);
        set_exception_handler([__CLASS__, 'appException']);
        register_shutdown_function([__CLASS__, 'appShutdown']);
    }

    public static function appError($error_level, $error_message, $error_file = '', $error_line = 0, $error_context = [])
    {
        $error_msg = "    文件:" . $error_file . "\n    行号：" . $error_line . "\n    级别：" . $error_level . "\n   信息:" . $error_message;
        Log::writeLog($error_msg, "error");
    }

    public static function appException($e)
    {
        if ($e instanceof SweetException) {
            Log::writeLog('     ' . $e->__toString(), "exception");
        }
    }

    public static function appShutdown()
    {
        Log::save();
    }
}