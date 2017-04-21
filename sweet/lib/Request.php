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


class Request
{
    private $queryString;
    protected static $instance;
    protected  $urlParam = [];
    protected  $input = [];

    protected function __construct()
    {
        $this->queryString = $_SERVER["QUERY_STRING"];
        $this->input = file_get_contents("php://input");
    }

    public static function instance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new static();
        }
        return self::$instance;
    }

    public function parseUrl()
    {
        parse_str($this->queryString,  $this->urlParam);
        $this->urlParam['module']           = isset($this->urlParam['module']) ?$this->urlParam['module']: Conf::getValue("default_module");
        $this->urlParam['app']              = isset($this->urlParam['app']) ? ucfirst($this->urlParam['app']) : Conf::getValue("default_app");
        $this->urlParam['action']           = isset($this->urlParam['action']) ?$this->urlParam['action']: Conf::getValue("default_controller");

        $this->urlParam['namespace']        = Conf::getValue("app_namespace") . '\\' . Conf::getValue("default_module") . '\\' . Conf::getValue("layer");
        $this->urlParam['namespace_path']   = APP_PATH . DS . $this->urlParam['module'] . DS . Conf::getValue("layer").'\\';

        return $this->urlParam;
    }

}