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


class Conf
{
    private static $config = [];

    public static function load($file)
    {
        self::$config=__include($file,true);
    }

    public static function getValue($key)
    {
        if (isset(self::$config[$key])) {
            return self::$config[$key];
        }
        return false;
    }

}