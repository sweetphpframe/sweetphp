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
/**
 *  创建文件夹
 ** @param string $dir
 * @param int $mode
 * @return bool
 */
function sp_mk_dir($dir='',$mode=0777)
{
    if (empty($dir)) {
        return false;
    }
    if (is_dir($dir)) {
        return true;
    }
    $dir_name = dirname($dir);
    $cur_path = "";
    $each_path = explode(DS, $dir_name);
    foreach ($each_path as $path) {
        if ($path) {
            if (IS_WIN) {
                $cur_path .=  $path.DS ;
            }else{
                $cur_path .=  DS.$path ;
            }
            if (!is_dir($cur_path)) {
                @mkdir($cur_path, $mode);
            }
        }
    }
    return true;
}