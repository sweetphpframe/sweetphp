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


class App
{

    public static function run()
    {
        self::initCommon();
        $request = Request::instance()->parseUrl();
        Loader::action($request);
    }

    public static function initCommon()
    {
        __include(SP_PATH . "function.php");
    }


}