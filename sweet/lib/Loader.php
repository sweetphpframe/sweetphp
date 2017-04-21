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


class Loader
{
    private static $nameSpace=[];
    private static $mapFiles = [];
    public static function register(string $autoload='')
    {
        $autoload = empty($autoload)?'sweet\\Loader::autoload':$autoload;
        spl_autoload_register($autoload , true, true);
        self::addNameSpacePath([
            'sweet'    => LIB_PATH ,
        ]);
    }

    public static function autoload($class)
    {
        if ($file=self::findFileByClass($class)) {
            __include($file);
            return true;
        }
        return false;
    }

    private static function findFileByClass($class)
    {
        //存在
        if (!empty(self::$mapFiles[$class])) {
            return self::$mapFiles[$class];
        }
        $dirName = dirname($class);

        //如果有注册空间，先查找注册空间里面的类
        if ($dirName!="."&&isset(self::$nameSpace[$dirName])) {
            $file_path=self::$nameSpace[$dirName].ucfirst(basename($class)).SP_EXT;
            if (is_file($file_path)) {
                self::$mapFiles[$class]=$file_path;
                return $file_path;
            }
            //避免加载其它空间的类
            return self::$mapFiles[$class] = false;
        }

        //如果没有注册空间，则查找所有注册空间路径
        foreach (self::$nameSpace as $path) {
            $file_path=$path.ucfirst(basename($class)).SP_EXT;
            if (is_file($file_path)) {
                self::$mapFiles[$class]=$file_path;
                return $file_path;
            }
        }
        return self::$mapFiles[$class] = false;
    }

    public static function addNameSpacePath($namespace, $path='')
    {
        if (is_array($namespace)) {
            foreach ($namespace as $name => $path) {
                self::$nameSpace[$name] = $path;
            }
        }else{
            self::$nameSpace[$namespace] =$path;
        }
    }

    public static function action($request)
    {
        if (empty($request)) {
            throw new \Exception("Request Empty");
        }
        self::addNameSpacePath($request['namespace'],$request['namespace_path']);
        $class='\\'.$request['namespace'].'\\'.$request['app'];
        if (class_exists($class)) {
            self::invokeClass($class,$request['action']);
        }
    }

    public static function invokeClass($class,$action='')
    {
        $reflect=new \ReflectionMethod($class, $action);
        $reflect->invokeArgs(isset($class)?new $class():null,[]);
    }

}