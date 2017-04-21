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


class SweetFile extends \SplFileObject
{

    function __construct($file_name, $open_mode='r+')
    {
        parent::__construct($file_name, $open_mode);
    }

    function appendContent($str)
    {
        //$this->fwrite($str);
    }

}