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
define("SP_VERSION", 1.0);
define("SP_START_TIME", microtime(true));
define("SP_START_MEMORY", memory_get_usage());
define("SP_EXT", ".php");
define("DS", DIRECTORY_SEPARATOR);
defined('SP_PATH') or define('SP_PATH', __DIR__ . DS);
define('LIB_PATH', SP_PATH . 'lib' . DS);
defined('APP_PATH') or define('APP_PATH', dirname($_SERVER['SCRIPT_FILENAME']) . DS);
defined('ROOT_PATH') or define('ROOT_PATH', dirname(realpath(APP_PATH)) . DS);
defined("RUNTIME_PATH") or define("RUNTIME_PATH", ROOT_PATH . "runtime" . DS);
defined('LOG_PATH') or define('LOG_PATH', RUNTIME_PATH . 'log' . DS);
defined('CACHE_PATH') or define('CACHE_PATH', RUNTIME_PATH . 'cache' . DS);
defined('TEMP_PATH') or define('TEMP_PATH', RUNTIME_PATH . 'temp' . DS);
define('IS_WIN', strpos(PHP_OS, 'WIN') !== false);
__require(LIB_PATH . "Loader.php");

// 注册自动加载
\sweet\Loader::register();

// 注册错误和异常处理机制
\sweet\Error::register();
//加载配置文件
\sweet\Conf::load(SP_PATH . "config.php");







