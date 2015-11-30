<?php
/**
 * Created by PhpStorm.
 * User: qky
 * Date: 15-11-30
 * Time: 上午11:11
 * 常用方法
 */
class Common {
    //上传文件夹是否存在判断，若不存在则创建
    public static function mkdirs($dir, $mode = 0777)
    {
        if (is_dir($dir) || @mkdir($dir, $mode))
            return TRUE;
        if (!mkdirs(dirname($dir), $mode))
            return FALSE;
        return @mkdir($dir, $mode);
    }
}