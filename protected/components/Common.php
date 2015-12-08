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

    //加密解密
    public static function encryptDecrypt($key, $string, $decrypt){
        if($decrypt){
            $decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($string), MCRYPT_MODE_CBC, md5(md5($key))), "12");
            return $decrypted;
        }else{
            $encrypted = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $string, MCRYPT_MODE_CBC, md5(md5($key))));
            return $encrypted;
        }
    }

    //生成随机字符串
    public static function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }
    //获取文件扩展名
    public static function getExtension($filename){
        $myext = substr($filename, strrpos($filename, '.'));
        return str_replace('.','',$myext);
    }

    //获取文件大小并格式化
    public static function formatSize($size) {
        $sizes = array(" Bytes", " KB", " MB", " GB", " TB", " PB", " EB", " ZB", " YB");
        if ($size == 0) {
            return('n/a');
        } else {
            return (round($size/pow(1024, ($i = floor(log($size, 1024)))), 2) . $sizes[$i]);
        }
    }

    //PHP替换标签字符
    public static function stringParser($string,$replacer){
        $result = str_replace(array_keys($replacer), array_values($replacer),$string);
        return $result;
    }

    //列出目录下的文件
    public static function listDirFiles($DirPath){
        if($dir = opendir($DirPath)){
            while(($file = readdir($dir))!== false){
                if(!is_dir($DirPath.$file))
                {
                    echo "filename: $file<br />";
                }
            }
        }
    }

    //获取当前页面的url
    public static function curPageURL() {
        $pageURL = 'http';
        if (!empty($_SERVER['HTTPS'])) {$pageURL .= "s";}
        $pageURL .= "://";
        if ($_SERVER["SERVER_PORT"] != "80") {
            $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
        } else {
            $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
        }
        return $pageURL;
    }

    //强制下载
    public static function download($filename){
        if ((isset($filename))&&(file_exists($filename))){
            header("Content-length: ".filesize($filename));
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . $filename . '"');
            readfile("$filename");
        } else {
            echo "Looks like file does not exist!";
        }
    }
    //防止注入
    public static function injCheck($sql_str) {
        $check = preg_match('/select|insert|update|delete|\'|\/\*|\*|\.\.\/|\.\/|union|into|load_file|outfile/', $sql_str);
        if ($check) {
            echo '非法字符！！'.$sql_str;
            exit;
        } else {
            return $sql_str;
        }
    }

    //页面提示跳转
    public static function message($msgTitle,$message,$jumpUrl){
        $str = '<!DOCTYPE HTML>';
        $str .= '<html>';
        $str .= '<head>';
        $str .= '<meta charset="utf-8">';
        $str .= '<title>页面提示</title>';
        $str .= '<style type="text/css">';
        $str .= '*{margin:0; padding:0}a{color:#369; text-decoration:none;}a:hover{text-decoration:underline}body{height:100%; font:12px/18px Tahoma, Arial,  sans-serif; color:#424242; background:#fff}.message{width:450px; height:120px; margin:16% auto; border:1px solid #99b1c4; background:#ecf7fb}.message h3{height:28px; line-height:28px; background:#2c91c6; text-align:center; color:#fff; font-size:14px}.msg_txt{padding:10px; margin-top:8px}.msg_txt h4{line-height:26px; font-size:14px}.msg_txt h4.red{color:#f30}.msg_txt p{line-height:22px}';
        $str .= '</style>';
        $str .= '</head>';
        $str .= '<body>';
        $str .= '<div class="message">';
        $str .= '<h3>'.$msgTitle.'</h3>';
        $str .= '<div class="msg_txt">';
        $str .= '<h4 class="red">'.$message.'</h4>';
        $str .= '<p>系统将在 <span style="color:blue;font-weight:bold">3</span> 秒后自动跳转,如果不想等待,直接点击 <a href="{$jumpUrl}">这里</a> 跳转</p>';
        $str .= "<script>setTimeout('location.replace(\'".$jumpUrl."\')',2000)</script>";
        $str .= '</div>';
        $str .= '</div>';
        $str .= '</body>';
        $str .= '</html>';
        echo $str;
    }


    //时间长度转换
    public static function changeTimeType($seconds) {
        if ($seconds > 3600) {
            $hours = intval($seconds / 3600);
            $minutes = $seconds % 3600;
            $time = $hours . ":" . gmstrftime('%M:%S', $minutes);
        } else {
            $time = gmstrftime('%H:%M:%S', $seconds);
        }
        return $time;
    }

    //获取用户真实IP
    public static function get_client_ip() {
        if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown"))
            $ip = getenv("HTTP_CLIENT_IP");
        else
            if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown"))
                $ip = getenv("HTTP_X_FORWARDED_FOR");
            else
                if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown"))
                    $ip = getenv("REMOTE_ADDR");
                else
                    if (isset ($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown"))
                        $ip = $_SERVER['REMOTE_ADDR'];
                    else
                        $ip = "unknown";
        return ($ip);
    }

}