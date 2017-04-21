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


class SweetException extends \Exception
{
    protected $exceptions = [];

    final function setException($name,$data)
    {
        $this->exceptions[$name] = $data;
    }

    final function getException()
    {
        return $this->exceptions;
    }

}