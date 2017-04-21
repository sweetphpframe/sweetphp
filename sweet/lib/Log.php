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


class Log
{
    protected static $logs=[];

    public static function writeLog($msg,$type='log')
    {
        self::$logs[$type][]=$msg;
    }

    public static function save()
    {
        $class= '\\sweet\\log\\driver\\File';

        if (class_exists($class)) {
            echo "B";
        }else{
            echo "c";
        }
//        $logFile->save(self::$logs);
    }

}