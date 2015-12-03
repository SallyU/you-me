<?php
/**
 * Created by PhpStorm.
 * User: qky
 * Date: 15-11-30
 * Time: 上午11:11
 * 静态常用方法
 */
class Common {
    /**
     *上传文件夹是否存在判断，若不存在则创建
     *
     */
    public static function mkdirs($dir, $mode = 0755)
    {
        if (is_dir($dir) || @mkdir($dir, $mode))
            return TRUE;
        if (!mkdirs(dirname($dir), $mode))
            return FALSE;
        return @mkdir($dir, $mode);
        /*if (!is_dir($uploaddir) || !is_writeable($uploaddir)) {
                mkdir($uploaddir, 0755, TRUE);//不建议使用777
            }*/
    }

    /**
     *
     * 删除指定目录中的所有目录及文件（或者指定文件）
     * 可扩展增加一些选项（如是否删除原目录等）
     * 删除文件敏感操作谨慎使用
     * @param $dir 目录路径
     * @param array $file_type指定文件类型
     */
    public static function delFile($dir,$file_type='') {
        if(is_dir($dir)){
            $files = scandir($dir);
            //打开目录 //列出目录中的所有文件并去掉 . 和 ..
            foreach($files as $filename){
                if($filename!='.' && $filename!='..'){
                    if(!is_dir($dir.'/'.$filename)){
                        if(empty($file_type)){
                            unlink($dir.'/'.$filename);
                        }else{
                            if(is_array($file_type)){
                                //正则匹配指定文件
                                if(preg_match($file_type[0],$filename)){
                                    unlink($dir.'/'.$filename);
                                }
                            }else{
                                //指定包含某些字符串的文件
                                if(false!=stristr($filename,$file_type)){
                                    unlink($dir.'/'.$filename);
                                }
                            }
                        }
                    }else{
                        delFile($dir.'/'.$filename);
                        rmdir($dir.'/'.$filename);
                    }
                }
            }
        }else{
            if(file_exists($dir)) unlink($dir);
        }
    }
    /*
     * 时间轴函数实现原理：当前时间戳与目标时间戳进行比较，根据时间轴差值范围输出不同的结果（如：10分钟前）
     */
    public static function tranTime($time) {
        $rtime = date("Y-m-d H:i",$time);
        $htime = date("H:i",$time);
        $time = time() - $time;
        if ($time < 60) {
            $str = '刚刚';
        }
        elseif ($time < 60 * 60) {
            $min = floor($time/60);
            $str = $min.'分钟前';
        }
        elseif ($time < 60 * 60 * 24) {
            $h = floor($time/(60*60));
            $str = $h.'小时前 '.$htime;
        }
        elseif ($time < 60 * 60 * 24 * 3) {
            $d = floor($time/(60*60*24));
            if($d==1)
                $str = '昨天 '.$rtime;
            else
                $str = '前天 '.$rtime;
        }
        else {
            $str = $rtime;
        }
        return $str;
    }

    /*
     * 截取标题6个字符串，多余字符串以“...”结束
     * $str = "很长的文字标题balabala";
     * 使用：msubstr($str, 0, 6, 'utf-8', true);
     */
    public static function msubstr($str, $start = 0, $length, $charset = "utf-8", $suffix = false) {

        if (function_exists("mb_substr")) {

            if ($suffix)
                return mb_substr($str, $start, $length, $charset) . "...";
            else
                return mb_substr($str, $start, $length, $charset);
        }elseif (function_exists('iconv_substr')) {

            if ($suffix)
                return iconv_substr($str, $start, $length, $charset) . "...";
            else
                return iconv_substr($str, $start, $length, $charset);
        }

        $re['utf-8'] = "/[x01-x7f]|[xc2-xdf][x80-xbf]|[xe0-xef][x80-xbf]{2}|[xf0-xff][x80-xbf]{3}/";

        $re['gb2312'] = "/[x01-x7f]|[xb0-xf7][xa0-xfe]/";

        $re['gbk'] = "/[x01-x7f]|[x81-xfe][x40-xfe]/";

        $re['big5'] = "/[x01-x7f]|[x81-xfe]([x40-x7e]|xa1-xfe])/";

        preg_match_all($re[$charset], $str, $match);

        $slice = join("", array_slice($match[0], $start, $length));

        if ($suffix)
            return $slice . "…";

        return $slice;
    }

}