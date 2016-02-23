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
    //强制下载
    public static function forceDownload($filename) {

        if (false == file_exists($filename)) {
            return false;
        }

        // http headers
        header('Content-Type: application-x/force-download');
        header('Content-Disposition: attachment; filename="' . basename($filename) .'"');
        header('Content-length: ' . filesize($filename));

        // for IE6
        if (false === strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 6')) {
            header('Cache-Control: no-cache, must-revalidate');
        }
        header('Pragma: no-cache');

        // read file content and output
        return readfile($filename);;
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

    /**
     * @param $year
     * @return mixed
     * 获取一年中的每星期的开始日期和结束日期,比如2011年第18周的开始日期和结束日期:
     * $weeks = get_week(2011);
     * echo '第18周开始日期：'.$weeks[18][0].'';
     * echo '第18周结束日期：'.$weeks[18][1];
     */
    public static function get_week($year) {
        $year_start = $year . "-01-01";
        $year_end = $year . "-12-31";
        $startday = strtotime($year_start);
        $week_array = array();
        if (intval(date('N', $startday)) != '1') {
            $startday = strtotime("next monday", strtotime($year_start)); //获取年第一周的日期
        }
        $year_mondy = date("Y-m-d", $startday); //获取年第一周的日期

        $endday = strtotime($year_end);
        if (intval(date('W', $endday)) == '7') {
            $endday = strtotime("last sunday", strtotime($year_end));
        }

        $num = intval(date('W', $endday));
        for ($i = 1; $i <= $num; $i++) {
            $j = $i -1;
            $start_date = date("Y-m-d", strtotime("$year_mondy $j week "));

            $end_day = date("Y-m-d", strtotime("$start_date +6 day"));

            $week_array[$i] = array (
                str_replace("-",
                    ".",
                    $start_date
                ), str_replace("-", ".", $end_day));
        }
        return $week_array;
    }

    /**
    +----------------------------------------------------------
     * @use 将一个字符串部分字符用*替代隐藏
    +----------------------------------------------------------
     * @param string    $string   待转换的字符串
     * @param int       $bengin   起始位置，从0开始计数，当$type=4时，表示左侧保留长度
     * @param int       $len      需要转换成*的字符个数，当$type=4时，表示右侧保留长度
     * @param int       $type     转换类型：0，从左向右隐藏；1，从右向左隐藏；2，从指定字符位置分割前由右向左隐藏；3，从指定字符位置分割后由左向右隐藏；4，保留首末指定字符串
     * @param string    $glue     分割符
    +----------------------------------------------------------
     * @return string   处理后的字符串
    +----------------------------------------------------------
     * 静态方法内部调用的时候，需要使用 parent::method()/self::method()
     * $this->staticProperty(父类的静态属性不可以通过$this(子类实例)来访问，
     * 会有这样报错:
     * PHP Strict Standards: Accessing static property 类名::$country as non static in，
    +----------------------------------------------------------
     * @eg.:
    +----------------------------------------------------------
     * 从左边第5个字符向右隐藏4个字符：" . hideStr($str0, 4, 4);
     * 从右边第5个字符向左隐藏4个字符：" . hideStr($str0, 4, 4, 1);
     * 隐藏指定字符@（或其他字符）前面的从右边第1个字符向左隐藏4个字符：" . hideStr($str2, 0, 4, 2);
     * 隐藏指定字符@（或其他字符）后面的从左边第1个字符向右隐藏4个字符：" . hideStr($str3, 0, 4, 3);
     * 隐藏首保留3个字符，右保留2个字符：" . hideStr($str4, 3, 2, 4);
     */
    public static function hideStr($string, $bengin = 0, $len = 4, $type = 0, $glue = "@") {
        if (empty($string))
            return false;
        $array = array();
        if ($type == 0 || $type == 1 || $type == 4) {
            $strlen = $length = mb_strlen($string);
            while ($strlen) {
                $array[] = mb_substr($string, 0, 1, "utf8");
                $string = mb_substr($string, 1, $strlen, "utf8");
                $strlen = mb_strlen($string);
            }
        }
        switch ($type) {
            case 1: {
                $array = array_reverse($array);
                for ($i = $bengin; $i < ($bengin + $len); $i++) {
                    if (isset($array[$i]))
                        $array[$i] = "*";
                }
                $string = implode("", array_reverse($array));
            }
                break;
            case 2: {
                $array = explode($glue, $string);
                $array[0] = self::hideStr($array[0], $bengin, $len, 1);
                $string = implode($glue, $array);
            }
                break;
            case 3: {
                $array = explode($glue, $string);
                $array[1] = self::hideStr($array[1], $bengin, $len, 0);
                $string = implode($glue, $array);
            }
                break;
            case 4: {
                $left = $bengin;
                $right = $len;
                $tem = array();
                for ($i = 0; $i < ($length - $right); $i++) {
                    if (isset($array[$i]))
                        $tem[] = $i >= $left ? "*" : $array[$i];
                }
                $array = array_chunk(array_reverse($array), $right);
                $array = array_reverse($array[0]);
                for ($i = 0; $i < $right; $i++) {
                    $tem[] = $array[$i];
                }
                $string = implode("", $tem);
            }
                break;
            default: {
                for ($i = $bengin; $i < ($bengin + $len); $i++) {
                    if (isset($array[$i]))
                        $array[$i] = "*";
                }
                $string = implode("", $array);
            }
                break;
        }
        return $string;
    }
    /*//if实现的和上面一样的方法
    public static function hideStr2($string, $bengin=0, $len = 4, $type = 0, $glue = "@") {
        if (empty($string))
            return false;
        $array = array();
        if ($type == 0 || $type == 1 || $type == 4) {
            $strlen = $length = mb_strlen($string);
            while ($strlen) {
                $array[] = mb_substr($string, 0, 1, "utf8");
                $string = mb_substr($string, 1, $strlen, "utf8");
                $strlen = mb_strlen($string);
            }
        }
        if ($type == 0) {
            for ($i = $bengin; $i < ($bengin + $len); $i++) {
                if (isset($array[$i]))
                    $array[$i] = "*";
            }
            $string = implode("", $array);
        }else if ($type == 1) {
            $array = array_reverse($array);
            for ($i = $bengin; $i < ($bengin + $len); $i++) {
                if (isset($array[$i]))
                    $array[$i] = "*";
            }
            $string = implode("", array_reverse($array));
        }else if ($type == 2) {
            $array = explode($glue, $string);
            $array[0] = self::hideStr2($array[0], $bengin, $len, 1);
            $string = implode($glue, $array);
        } else if ($type == 3) {
            $array = explode($glue, $string);
            $array[1] = self::hideStr2($array[1], $bengin, $len, 0);
            $string = implode($glue, $array);
        } else if ($type == 4) {
            $left = $bengin;
            $right = $len;
            $tem = array();
            for ($i = 0; $i < ($length - $right); $i++) {
                if (isset($array[$i]))
                    $tem[] = $i >= $left ? "*" : $array[$i];
            }
            $array = array_chunk(array_reverse($array), $right);
            $array = array_reverse($array[0]);
            for ($i = 0; $i < $right; $i++) {
                $tem[] = $array[$i];
            }
            $string = implode("", $tem);
        }
        return $string;
    }*/

    //防抓取邮件mailto;
    public static function safe_mailto($email, $title = '', $attributes = '') {
        $title = (string) $title;

        if ($title == "") {
            $title = $email;
        }

        for ($i = 0; $i < 16; $i++) {
            $x[] = substr('<a href="mailto:', $i, 1);
        }

        for ($i = 0; $i < strlen($email); $i++) {
            $x[] = "|" . ord(substr($email, $i, 1));
        }

        $x[] = '"';

        if ($attributes != '') {
            if (is_array($attributes)) {
                foreach ($attributes as $key => $val) {
                    $x[] = ' ' . $key . '="';
                    for ($i = 0; $i < strlen($val); $i++) {
                        $x[] = "|" . ord(substr($val, $i, 1));
                    }
                    $x[] = '"';
                }
            } else {
                for ($i = 0; $i < strlen($attributes); $i++) {
                    $x[] = substr($attributes, $i, 1);
                }
            }
        }

        $x[] = '>';

        $temp = array();
        for ($i = 0; $i < strlen($title); $i++) {
            $ordinal = ord($title[$i]);

            if ($ordinal < 128) {
                $x[] = "|" . $ordinal;
            } else {
                if (count($temp) == 0) {
                    $count = ($ordinal < 224) ? 2 : 3;
                }

                $temp[] = $ordinal;
                if (count($temp) == $count) {
                    $number = ($count == 3) ? (($temp['0'] % 16) * 4096) + (($temp['1'] % 64) * 64) + ($temp['2'] % 64) : (($temp['0'] % 32) * 64) + ($temp['1'] % 64);
                    $x[] = "|" . $number;
                    $count = 1;
                    $temp = array();
                }
            }
        }

        $x[] = '<';
        $x[] = '/';
        $x[] = 'a';
        $x[] = '>';

        $x = array_reverse($x);
        ob_start();
        ?><script type="text/javascript">
            //<![CDATA[
            var l = new Array();
            <?php
            $i = 0;
            foreach ($x as $val) {
                ?>l[<?php echo $i++; ?>] = '<?php echo $val; ?>';<?php } ?>

            for (var i = l.length - 1; i >= 0; i = i - 1) {
                if (l[i].substring(0, 1) == '|')
                    document.write("&#" + unescape(l[i].substring(1)) + ";");
                else
                    document.write(unescape(l[i]));
            }
            //]]>
        </script><?php
        $buffer = ob_get_contents();
        ob_end_clean();
        return $buffer;
    }

    // 计算中文字符串长度,例如：我爱你，strlen是9个字符，这个函数返回3个字符
    public static function utf8_strlen($string = null) {
        preg_match_all("/./us", $string, $match);
        return count($match[0]);
    }

    //生成随机数
    public static function generate_code($length = 4) {
        return rand(pow(10,($length-1)), pow(10,$length)-1);
    }

    /**
     * @param $url
     * @return bool|string
     * 异步get请求，将授权完成的数据传给主站，并保存信息
     */
    public static function httpRequestGET($url){
        $url2 = parse_url($url);
        $url2["path"] = (empty($url2["path"]) ? "/" : $url2["path"]);
        $url2["port"] = (empty($url2["port"]) ? 80 : $url2["port"]);
        $host_ip = @gethostbyname($url2["host"]);
        $fsock_timeout=20;
        if(($fsock = fsockopen($host_ip, 80, $errno, $errstr, $fsock_timeout)) < 0){
            return false;
        }

        $request = $url2["path"] . (!empty($url2["query"]) ? "?" . $url2["query"] : "");
        $in = "GET " . $request . " HTTP/1.0\r\n";
        $in .= "Accept: */*\r\n";
        $in .= "User-Agent: Mozilla/5.0 Firefox/3.6.12\r\n";
        $in .= "Host: " . $url2["host"] . "\r\n";
        $in .= "Connection: Close\r\n\r\n";
        if(!@fwrite($fsock, $in, strlen($in))){
            fclose($fsock);
            return false;
        }
        unset($in);

        $out = "";
        while($buff = @fgets($fsock, 2048)){
            $out .= $buff;
        }
        fclose($fsock);
        $pos = strpos($out, "\r\n\r\n");
        $head = substr($out, 0, $pos);    //http head
        $status = substr($head, 0, strpos($head, "\r\n"));    //http status line
        $body = substr($out, $pos + 4, strlen($out) - ($pos + 4));//page body
        if(preg_match("/^HTTP\/\d\.\d\s([\d]+)\s.*$/", $status, $matches)){
            if(intval($matches[1]) / 100 == 2){
                return $body;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    /*
     * 功能：php实现下载远程图片保存到本地
     * 参数：文件url,保存文件目录,保存文件名称，使用的下载方式
     * 当保存文件名称为空时则使用远程文件原来的名称
     */
    public static function getImage($url, $save_dir = '', $filename = '', $type = 0) {
        if (trim($url) == '') {
            return array('file_name' => '', 'save_path' => '', 'error' => 1);
        }
        if (trim($save_dir) == '') {
            $save_dir = './';
        }
        if (trim($filename) == '') {//保存文件名
            $ext = strrchr($url, '.');
            if ($ext != '.gif' && $ext != '.jpg') {
                return array('file_name' => '', 'save_path' => '', 'error' => 3);
            }
            $filename = time() . $ext;
        }
        if (0 !== strrpos($save_dir, '/')) {
            $save_dir.='/';
        }
        //创建保存目录
        if (!file_exists($save_dir) && !mkdir($save_dir, 0777, true)) {
            return array('file_name' => '', 'save_path' => '', 'error' => 5);
        }
        //获取远程文件所采用的方法
        if ($type) {
            $ch = curl_init();
            $timeout = 3;//超时时间
            curl_setopt($ch, CURLOPT_URL, $url);
            //curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
            $img = curl_exec($ch);
            curl_close($ch);
        } else {
            ob_start();
            readfile($url);
            $img = ob_get_contents();
            ob_end_clean();
        }
        //文件大小
        $fp2 = @fopen($save_dir . $filename, 'w');
        fwrite($fp2, $img);
        fclose($fp2);
        unset($img, $url);
        return array('file_name' => $filename, 'save_path' => $save_dir . $filename, 'error' => 0);
    }

    /*
     * 错误日志记录
     * PHP_EOL cross platform solution for new line
     */
    public static function log($logInfo, $type='error', $logdir = './log'){
        date_default_timezone_set('PRC');//设置本地日期、时间
        if (!is_dir($logdir) || !is_writeable($logdir))
            mkdir($logdir, 0777, TRUE);
        $logfile = date("Ymd").'.'.$type.'.log';
        if (!file_exists($logfile) || !is_writable($logfile)){
            //Create the file
            touch($logdir.'/'.$logfile);
            //Make it writeable
            chmod($logdir.'/'.$logfile,0777);
        }
        //Add contents is I decide to make them
        file_put_contents($logdir.'/'.$logfile, date("Y-m-d H:i:s"). ": " . $logInfo.PHP_EOL, FILE_APPEND | LOCK_EX);
    }

    /**
     * @param $url请求的URL
     * @param $jsonStr发送的json字符串
     * @return array
     */
    public static function http_post_json($url, $jsonStr)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonStr);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'User-Agent: Mozilla/5.0 Firefox/3.6.12',
                'Content-Type: application/json; charset=utf-8',
                'Content-Length: ' . strlen($jsonStr)
            )
        );
        /* 普通的post请求更换Content-Type接可以了
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/x-www-form-urlencoded; charset=utf-8',
            'Content-Length: ' . strlen($jsonStr))
        );
        */
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return array($httpCode, $response);
    }

    /*
     * 按空格计算单词个数
     */

    public static function WordCount($string) {
        //$count = explode(' ', $string);
        //return count($count);
        return str_word_count($string);
    }

    /*
     * 首字母大写
     * 用于处理关键字
     */

    public static function uc_words($title) {
        $smallwordsarray = array(
            'of', 'a', 'the', 'and', 'an', 'or', 'nor', 'but', 'is', 'if', 'then',
            'else', 'when',
            'at', 'from', 'by', 'on', 'off', 'for', 'in', 'out',
            'over', 'to', 'into', 'with'
        );
        $title = trim($title);
        $words = explode(' ', $title);
        foreach ($words as $key => $word) {
            if ($key == 0 or ! in_array($word, $smallwordsarray))
                $words[$key] = ucwords($word);
        }
        $newtitle = implode(' ', $words);
        return $newtitle;
    }

    /*
     * 文字加链接
     */

    public static function linkUrl($title, $url = '') {
        $url = empty($url) ? $title : $url;
        $url = 'http://' . str_replace('http://', '', $url);
        return "<a target=\"_blank\" href=\"{$url}\">{$title}</a>";
    }

    /**
     * 该函数截取英文字符串,不会把一个单词截取一半
     */
    public static function wordCut($string = '', $chars = 60, $elli = '...') {
        $string = preg_replace("/<(style.*?)>(.*?)<(\/style.*?)>/si", "", $string); //过滤style标签
        $string = preg_replace("#<(.*?)>#is", '', $string); //过滤<>
        $string = trim(strip_tags($string));
        $string = preg_replace("/[\s]{2,}/", " ", $string);
        $string = str_replace('&nbsp;', ' ', $string);
        if (strlen($string) <= $chars) {
            return $string;
        } else {
            list($new_string) = explode("\n", wordwrap($string, $chars, "\n", false));
            list($new_string) = explode(" ", wordwrap($string, $chars, " ", false));
            $new_string = mb_substr($string, 0, $chars, 'utf-8');
            return $new_string . $elli;
        }
    }

    /**
     * 随机生成salt字符串
     * 默认32位
     */
    public static function create_salt($pw_length = 32) {
        $randpwd = '';
        for ($i = 0; $i < $pw_length; $i++) {
            $randpwd .= chr(mt_rand(33, 126));
        }
        return $randpwd;
    }

    /**
     * 编译密码
     * $password:密码
     * salt字符串
     */
    public static function compile_password($password, $salt) {
        $password = md5($password) . $salt;
        for ($i = 0; $i < 100; $i++) {
            $password = sha1($password);
        }
        return $password;
    }

    /*
     * http post 方法
     */
    public static function http_request($ip, $port = 80, $uri = '/', $verb = 'POST', $getdata = array(), $postdata = array(), $cookie = array(), $custom_headers = array(), $timeout = 30, $req_hdr = false, $res_hdr = false) {
        $ret = '';
        $verb = strtoupper($verb);
        $cookie_str = '';
        $getdata_str = count($getdata) ? '?' : '';
        $postdata_str = '';

        foreach ($getdata as $k => $v)
            $getdata_str .= urlencode($k) . '=' . urlencode($v) . '&';

        foreach ($postdata as $k => $v) {
            if (is_array($v) || is_object($v)) {
                foreach ($v as $k2 => $v2) {
                    $postdata_str .= urlencode($k) . "[" . urlencode($k2) . "]=" . urlencode($v2) . "&";
                }
            } else {
                $postdata_str .= urlencode($k) . '=' . urlencode($v) . '&';
            }
        }

        foreach ($cookie as $k => $v)
            $cookie_str .= urlencode($k) . '=' . urlencode($v) . '; ';

        $crlf = "\r\n";
        $req = $verb . ' ' . $uri . $getdata_str . ' HTTP/1.1' . $crlf;
        $req .= 'Host: ' . $ip . $crlf;
        $req .= 'User-Agent: Mozilla/5.0 Firefox/3.6.12' . $crlf;
        $req .= 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8' . $crlf;
        $req .= 'Accept-Language: en-us,en;q=0.5' . $crlf;
        $req .= 'Accept-Encoding: deflate' . $crlf;
        $req .= 'Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7' . $crlf;

        foreach ($custom_headers as $k => $v)
            $req .= $k . ': ' . $v . $crlf;

        if (!empty($cookie_str))
            $req .= 'Cookie: ' . substr($cookie_str, 0, -2) . $crlf;

        if ($verb == 'POST' && !empty($postdata_str)) {
            $postdata_str = substr($postdata_str, 0, -1);
            $req .= 'Content-Type: application/x-www-form-urlencoded' . $crlf;
            $req .= 'Content-Length: ' . strlen($postdata_str) . $crlf . $crlf;
            $req .= $postdata_str;
        } else
            $req .= $crlf;

        if ($req_hdr)
            $ret .= $req;

        if (($fp = @fsockopen($ip, $port, $errno, $errstr)) == false)
            return "Error $errno: $errstr\n";

        stream_set_timeout($fp, 0, $timeout * 1000);

        @fputs($fp, $req);
        while ($line = fgets($fp))
            $ret .= $line;
        fclose($fp);

        if (!$res_hdr)
            $ret = substr($ret, strpos($ret, "\r\n\r\n") + 4);
        return $ret;
    }

    //全角转半角
    public static function makeSemiangle($str) {
        $arr = array('０' => '0', '１' => '1', '２' => '2', '３' => '3', '４' => '4',
            '５' => '5', '６' => '6', '７' => '7', '８' => '8', '９' => '9',
            'Ａ' => 'A', 'Ｂ' => 'B', 'Ｃ' => 'C', 'Ｄ' => 'D', 'Ｅ' => 'E',
            'Ｆ' => 'F', 'Ｇ' => 'G', 'Ｈ' => 'H', 'Ｉ' => 'I', 'Ｊ' => 'J',
            'Ｋ' => 'K', 'Ｌ' => 'L', 'Ｍ' => 'M', 'Ｎ' => 'N', 'Ｏ' => 'O',
            'Ｐ' => 'P', 'Ｑ' => 'Q', 'Ｒ' => 'R', 'Ｓ' => 'S', 'Ｔ' => 'T',
            'Ｕ' => 'U', 'Ｖ' => 'V', 'Ｗ' => 'W', 'Ｘ' => 'X', 'Ｙ' => 'Y',
            'Ｚ' => 'Z', 'ａ' => 'a', 'ｂ' => 'b', 'ｃ' => 'c', 'ｄ' => 'd',
            'ｅ' => 'e', 'ｆ' => 'f', 'ｇ' => 'g', 'ｈ' => 'h', 'ｉ' => 'i',
            'ｊ' => 'j', 'ｋ' => 'k', 'ｌ' => 'l', 'ｍ' => 'm', 'ｎ' => 'n',
            'ｏ' => 'o', 'ｐ' => 'p', 'ｑ' => 'q', 'ｒ' => 'r', 'ｓ' => 's',
            'ｔ' => 't', 'ｕ' => 'u', 'ｖ' => 'v', 'ｗ' => 'w', 'ｘ' => 'x',
            'ｙ' => 'y', 'ｚ' => 'z',
            '（' => '(', '）' => ')', '〔' => '[', '〕' => ']', '【' => '[',
            '】' => ']', '〖' => '[', '〗' => ']', '“' => '[', '”' => ']',
            '‘' => '[', '’' => ']', '｛' => '{', '｝' => '}',
            '％' => '%', '＋' => '+', '—' => '-', '－' => '-', '～' => '~',
            '：' => ':', '。' => '.', '、' => ',', '，' => ',', '、' => '.',
            '；' => ';', '？' => '?', '！' => '!', '…' => '-', '‖' => '|',
            '”' => '"', '’' => '`', '‘' => '`', '｜' => '|', '〃' => '"',
            '　' => ' ', '＄' => '$', '＠' => '@', '＃' => '#', '＾' => '^', '＆' => '&', '＊' => '*',
            '＂' => '"', '／' => '/', '＝' => '=',
            '『' => '{', '』' => '}', '「' => '[', '」' => ']', '｀' => '\'', '&nbsp;' => ' ',
//            '℃'=>'&#8451;','°C'=>'&#8451;','°F'=>'&#8457;','℉'=>'&#8457;',
//            '℃' => '&deg;C', '℉' => '&deg;F',
//            '°' => '&deg;', '√' => '&radic;',
//            '∅' => '&empty;',
//            '‰' => '&permil;',
//            '©' => '&copy;',
//            '¥' => '&yen;', '®' => '&reg;', '÷' => '&divide;', 'Ø' => '&Oslash;', 'ð' => '&eth;',
//            'Α' => '&Alpha;', 'Α' => '&Alpha;', 'Β' => '&Beta;', 'Γ' => '&Gamma;', 'Δ' => '&Delta;', 'Ε' => '&Epsilon;',
//            'Ζ' => '&Zeta;', 'Η' => '&Eta;', 'Θ' => '&Theta;', 'Ι' => '&Iota;', 'Κ' => '&Kappa;', 'Ε' => '&Epsilon;',
//            'Α' => '&Alpha;', 'Β' => '&Beta;', 'Γ' => '&Gamma;', 'Δ' => '&Delta;',
//            'Ε' => '&Epsilon;', 'Ζ' => '&Zeta;', 'Η' => '&Eta;', 'Θ' => '&Theta;', 'Ι' => '&Iota;',
//            'Κ' => '&Kappa;', 'Λ' => '&Lambda;', 'Μ' => '&Mu;', 'Ν' => '&Nu;', 'Ξ' => '&Xi;',
//            'Ο' => '&Omicron;', 'Π' => '&Pi;', 'Ρ' => '&Rho;', 'Σ' => '&Sigma;', 'Τ' => '&Tau;',
//            'Υ' => '&Upsilon;', 'Φ' => '&Phi;', 'Χ' => '&Chi;', 'Ψ' => '&Psi;', 'Ω' => '&Omega;',
//            'α' => '&alpha;', 'β' => '&beta;', 'γ' => '&gamma;', 'δ' => '&delta;', 'ε' => '&epsilon;',
//            'ζ' => '&zeta;', 'η' => '&eta;', 'θ' => '&theta;', 'ι' => '&iota;', 'κ' => '&kappa;',
//            'λ' => '&lambda;', 'μ' => '&mu;', 'ν' => '&nu;', 'ξ' => '&xi;', 'ο' => '&omicron;',
//            'π' => '&pi;', 'ρ' => '&rho;', 'ς' => '&sigmaf;', 'σ' => '&sigma;', 'τ' => '&tau;',
//            'υ' => '&upsilon;', 'φ' => '&phi;', 'χ' => '&chi;', 'ψ' => '&psi;', 'ω' => '&omega;',
//            '′' => '&prime;', '″' => '&Prime;',
//            '™' => '&trade;', '←' => '&larr;',
//            '↑' => '&uarr;', '→' => '&rarr;', '↓' => '&darr;', '↔' => '&harr;',
//            '⇒' => '&rArr;', '⇔' => '&hArr;',
//            '∀' => '&forall;', '∂' => '&part;', '∃' => '&exist;', '∇' => '&nabla;',
//            '∈' => '&isin;', '∋' => '&ni;', '∏' => '&prod;', '∑' => '&sum;',
//            '√' => '&radic;', '∝' => '&prop;', '∞' => '&infin;',
//            '∠' => '&ang;', '∧' => '&and;', '∨' => '&or;', '∩' => '&cap;', '∪' => '&cup;',
//            '∫' => '&int;', '∴' => '&there4;', '∼' => '&sim;', '∝' => '&cong;', '≈' => '&asymp;',
//            '≠' => '&ne;', '≡' => '&equiv;', '≤' => '&le;', '≥' => '&ge;', '⊂' => '&sub;',
//            '⊃' => '&sup;', '⊆' => '&sube;', '⊇' => '&supe;', '⊕' => '&oplus;',
//            '⊥' => '&perp;',
//            '♠' => '&spades;', '♣' => '&clubs;', '♥' => '&hearts;', '♦' => '&diams;',
        );
        return strtr($str, $arr);
    }

    //获得重置（修改）密码的链接；
    public static function getPwdLink($username, $salt) {
        $reset_time = time();
        $token = md5(sha1($username . $salt) . sha1($reset_time . SECRET_KEY));
        $passwordlink = DOMAIN_MEMBER . "setpassword/" . $username . '-' . $reset_time . '-' . $token;
        return $passwordlink;
    }

    /**
     * 获得目录中的文件总大小和总个数
     * @param string $dir_name : 目录的绝对路径
     * @return array;
     */
    public static function getDirInfo($dir_name) {
        $dir_size = $file_num = 0;
        if (is_dir($dir_name)) {
            if ($dh = opendir($dir_name)) {
                while (($file = readdir($dh)) !== false) {
                    if ($file != "." && $file != "..") {
                        if (is_file($dir_name . "/" . $file)) {
                            $dir_size += filesize($dir_name . "/" . $file);
                            $file_num++;
                        }
                        /* check for any new directory inside this directory */
                        if (is_dir($dir_name . "/" . $file)) {
                            list($size, $num) = self::getDirInfo($dir_name . "/" . $file);
                            $dir_size += $size;
                        }
                    }
                }
            }
        }
        closedir($dh);
        return array($dir_size, $file_num);
    }

    /*
     * 汉字转拼音
     */
    public static function pinyin($_String) {
        $_DataKey = "a|ai|an|ang|ao|ba|bai|ban|bang|bao|bei|ben|beng|bi|bian|biao|bie|bin|bing|bo|bu|ca|cai|can|cang|cao|ce|ceng|cha" .
            "|chai|chan|chang|chao|che|chen|cheng|chi|chong|chou|chu|chuai|chuan|chuang|chui|chun|chuo|ci|cong|cou|cu|" .
            "cuan|cui|cun|cuo|da|dai|dan|dang|dao|de|deng|di|dian|diao|die|ding|diu|dong|dou|du|duan|dui|dun|duo|e|en|er" .
            "|fa|fan|fang|fei|fen|feng|fo|fou|fu|ga|gai|gan|gang|gao|ge|gei|gen|geng|gong|gou|gu|gua|guai|guan|guang|gui" .
            "|gun|guo|ha|hai|han|hang|hao|he|hei|hen|heng|hong|hou|hu|hua|huai|huan|huang|hui|hun|huo|ji|jia|jian|jiang" .
            "|jiao|jie|jin|jing|jiong|jiu|ju|juan|jue|jun|ka|kai|kan|kang|kao|ke|ken|keng|kong|kou|ku|kua|kuai|kuan|kuang" .
            "|kui|kun|kuo|la|lai|lan|lang|lao|le|lei|leng|li|lia|lian|liang|liao|lie|lin|ling|liu|long|lou|lu|lv|luan|lue" .
            "|lun|luo|ma|mai|man|mang|mao|me|mei|men|meng|mi|mian|miao|mie|min|ming|miu|mo|mou|mu|na|nai|nan|nang|nao|ne" .
            "|nei|nen|neng|ni|nian|niang|niao|nie|nin|ning|niu|nong|nu|nv|nuan|nue|nuo|o|ou|pa|pai|pan|pang|pao|pei|pen" .
            "|peng|pi|pian|piao|pie|pin|ping|po|pu|qi|qia|qian|qiang|qiao|qie|qin|qing|qiong|qiu|qu|quan|que|qun|ran|rang" .
            "|rao|re|ren|reng|ri|rong|rou|ru|ruan|rui|run|ruo|sa|sai|san|sang|sao|se|sen|seng|sha|shai|shan|shang|shao|" .
            "she|shen|sheng|shi|shou|shu|shua|shuai|shuan|shuang|shui|shun|shuo|si|song|sou|su|suan|sui|sun|suo|ta|tai|" .
            "tan|tang|tao|te|teng|ti|tian|tiao|tie|ting|tong|tou|tu|tuan|tui|tun|tuo|wa|wai|wan|wang|wei|wen|weng|wo|wu" .
            "|xi|xia|xian|xiang|xiao|xie|xin|xing|xiong|xiu|xu|xuan|xue|xun|ya|yan|yang|yao|ye|yi|yin|ying|yo|yong|you" .
            "|yu|yuan|yue|yun|za|zai|zan|zang|zao|ze|zei|zen|zeng|zha|zhai|zhan|zhang|zhao|zhe|zhen|zheng|zhi|zhong|" .
            "zhou|zhu|zhua|zhuai|zhuan|zhuang|zhui|zhun|zhuo|zi|zong|zou|zu|zuan|zui|zun|zuo";
        $_DataValue = "-20319|-20317|-20304|-20295|-20292|-20283|-20265|-20257|-20242|-20230|-20051|-20036|-20032|-20026|-20002|-19990" .
            "|-19986|-19982|-19976|-19805|-19784|-19775|-19774|-19763|-19756|-19751|-19746|-19741|-19739|-19728|-19725" .
            "|-19715|-19540|-19531|-19525|-19515|-19500|-19484|-19479|-19467|-19289|-19288|-19281|-19275|-19270|-19263" .
            "|-19261|-19249|-19243|-19242|-19238|-19235|-19227|-19224|-19218|-19212|-19038|-19023|-19018|-19006|-19003" .
            "|-18996|-18977|-18961|-18952|-18783|-18774|-18773|-18763|-18756|-18741|-18735|-18731|-18722|-18710|-18697" .
            "|-18696|-18526|-18518|-18501|-18490|-18478|-18463|-18448|-18447|-18446|-18239|-18237|-18231|-18220|-18211" .
            "|-18201|-18184|-18183|-18181|-18012|-17997|-17988|-17970|-17964|-17961|-17950|-17947|-17931|-17928|-17922" .
            "|-17759|-17752|-17733|-17730|-17721|-17703|-17701|-17697|-17692|-17683|-17676|-17496|-17487|-17482|-17468" .
            "|-17454|-17433|-17427|-17417|-17202|-17185|-16983|-16970|-16942|-16915|-16733|-16708|-16706|-16689|-16664" .
            "|-16657|-16647|-16474|-16470|-16465|-16459|-16452|-16448|-16433|-16429|-16427|-16423|-16419|-16412|-16407" .
            "|-16403|-16401|-16393|-16220|-16216|-16212|-16205|-16202|-16187|-16180|-16171|-16169|-16158|-16155|-15959" .
            "|-15958|-15944|-15933|-15920|-15915|-15903|-15889|-15878|-15707|-15701|-15681|-15667|-15661|-15659|-15652" .
            "|-15640|-15631|-15625|-15454|-15448|-15436|-15435|-15419|-15416|-15408|-15394|-15385|-15377|-15375|-15369" .
            "|-15363|-15362|-15183|-15180|-15165|-15158|-15153|-15150|-15149|-15144|-15143|-15141|-15140|-15139|-15128" .
            "|-15121|-15119|-15117|-15110|-15109|-14941|-14937|-14933|-14930|-14929|-14928|-14926|-14922|-14921|-14914" .
            "|-14908|-14902|-14894|-14889|-14882|-14873|-14871|-14857|-14678|-14674|-14670|-14668|-14663|-14654|-14645" .
            "|-14630|-14594|-14429|-14407|-14399|-14384|-14379|-14368|-14355|-14353|-14345|-14170|-14159|-14151|-14149" .
            "|-14145|-14140|-14137|-14135|-14125|-14123|-14122|-14112|-14109|-14099|-14097|-14094|-14092|-14090|-14087" .
            "|-14083|-13917|-13914|-13910|-13907|-13906|-13905|-13896|-13894|-13878|-13870|-13859|-13847|-13831|-13658" .
            "|-13611|-13601|-13406|-13404|-13400|-13398|-13395|-13391|-13387|-13383|-13367|-13359|-13356|-13343|-13340" .
            "|-13329|-13326|-13318|-13147|-13138|-13120|-13107|-13096|-13095|-13091|-13076|-13068|-13063|-13060|-12888" .
            "|-12875|-12871|-12860|-12858|-12852|-12849|-12838|-12831|-12829|-12812|-12802|-12607|-12597|-12594|-12585" .
            "|-12556|-12359|-12346|-12320|-12300|-12120|-12099|-12089|-12074|-12067|-12058|-12039|-11867|-11861|-11847" .
            "|-11831|-11798|-11781|-11604|-11589|-11536|-11358|-11340|-11339|-11324|-11303|-11097|-11077|-11067|-11055" .
            "|-11052|-11045|-11041|-11038|-11024|-11020|-11019|-11018|-11014|-10838|-10832|-10815|-10800|-10790|-10780" .
            "|-10764|-10587|-10544|-10533|-10519|-10331|-10329|-10328|-10322|-10315|-10309|-10307|-10296|-10281|-10274" .
            "|-10270|-10262|-10260|-10256|-10254";
        $_TDataKey = explode('|', $_DataKey);
        $_TDataValue = explode('|', $_DataValue);
        $_Data = array_combine($_TDataKey, $_TDataValue);
        arsort($_Data);
        reset($_Data);
        $_Res = '';
        for ($i = 0; $i < strlen($_String); $i++) {
            $_P = ord(substr($_String, $i, 1));
            if ($_P > 160) {
                $_Q = ord(substr($_String, ++$i, 1));
                $_P = $_P * 256 + $_Q - 65536;
            }
            $_Res .= self::_Pinyin($_P, $_Data);
        }
        return preg_replace("/[^a-z0-9]*/", '', $_Res);
    }
    protected function _Pinyin($_Num, $_Data) {
        if ($_Num > 0 && $_Num < 160)
            return chr($_Num);
        elseif ($_Num < -20319 || $_Num > -10247)
            return '';
        else {
            foreach ($_Data as $k => $v) {
                if ($v <= $_Num)
                    break;
            }
            return $k;
        }
    }

    /*
    * 查询国家翻译数据中英互译
    * @param string	$Name		要转换的国家
    * @param bool		$lang		语言 cn en
    * @param isArray	$isArray	是否获取数组 默认0:不获取,1获取
    *
    */

    public static function CountryTranslate($name, $lang = 'en', $isArray = 0) {
        if (!isset($country)) {
            $country = array();
            $country["afghanistan"] = "阿富汗";
            $country["albania"] = "阿尔巴尼亚";
            $country["algeria"] = "阿尔及利亚";
            $country["american samoa"] = "美属萨摩亚";
            $country["andorra"] = "安道尔";
            $country["angola"] = "安哥拉";
            $country["anguilla"] = "安圭拉";
            $country["antarctica"] = "南极洲";
            $country["antigua and barbuda"] = "安提瓜和巴布达";
            $country["argentina"] = "阿根廷";
            $country["armenia"] = "亚美尼亚";
            $country["aruba"] = "阿鲁巴";
            $country["australia"] = "澳大利亚";
            $country["austria"] = "奥地利";
            $country["azerbaijan"] = "阿塞拜疆";
            $country["bahamas"] = "巴哈马";
            $country["bahrain"] = "巴林";
            $country["bangladesh"] = "孟加拉国";
            $country["barbados"] = "巴巴多斯";
            $country["belarus"] = "白俄罗斯";
            $country["belgium"] = "比利时";
            $country["belize"] = "伯利兹";
            $country["benin"] = "贝宁";
            $country["bermuda"] = "百慕大";
            $country["bhutan"] = "不丹";
            $country["bolivia"] = "玻利维亚";
            $country["bosnia and herzegovina"] = "波斯尼亚和黑塞哥维那";
            $country["botswana"] = "博茨瓦纳";
            $country["bouvet island"] = "布维岛";
            $country["brazil"] = "巴西";
            $country["british indian ocean territory"] = "英属印度洋领地";
            $country["brunei darussalam"] = "文莱达鲁萨兰国";
            $country["bulgaria"] = "保加利亚";
            $country["burkina faso"] = "布吉纳法索";
            $country["burundi"] = "布隆迪";
            $country["cambodia"] = "柬埔寨";
            $country["cameroon"] = "喀麦隆";
            $country["canada"] = "加拿大";
            $country["cape verde"] = "佛得角";
            $country["cayman islands"] = "开曼群岛";
            $country["central african republic"] = "中非共和国";
            $country["chad"] = "乍得";
            $country["chile"] = "智利";
            $country["china"] = "中国";
            $country["christmas island"] = "圣诞岛";
            $country["cocos (keeling) islands"] = "科科斯 (基灵) 群岛";
            $country["colombia"] = "哥伦比亚";
            $country["comoros"] = "科摩罗";
            $country["congo"] = "刚果";
            $country["congo, the democratic republic of the"] = "刚果、 民主共和国";
            $country["cook islands"] = "库克群岛";
            $country["costa rica"] = "哥斯达黎加";
            $country["cote d'ivoire"] = "科特迪瓦";
            $country["croatia (local name: hrvatska)"] = "克罗地亚 （本地名称： 赫尔瓦次卡)";
            $country["cuba"] = "古巴";
            $country["cyprus"] = "塞浦路斯";
            $country["czech Republic"] = "捷克共和国";
            $country["denmark"] = "丹麦";
            $country["djibouti"] = "吉布提";
            $country["dominica"] = "多米尼克";
            $country["dominican Republic"] = "多米尼加共和国";
            $country["east Timor"] = "东帝汶";
            $country["ecuador"] = "厄瓜多尔";
            $country["egypt"] = "埃及";
            $country["el Salvador"] = "萨尔瓦多";
            $country["equatorial Guinea"] = "赤道几内亚";
            $country["eritrea"] = "厄立特里亚";
            $country["estonia"] = "爱沙尼亚";
            $country["ethiopia"] = "埃塞俄比亚";
            $country["falkland islands (malvinas)"] = "（马尔维纳斯）群岛";
            $country["faroe Islands"] = "法罗群岛";
            $country["fiji"] = "斐济";
            $country["finland"] = "芬兰";
            $country["france"] = "法国";
            $country["france metropolitan"] = "法国城市";
            $country["french guiana"] = "法属圭亚那";
            $country["french polynesia"] = "法属波利尼西亚";
            $country["french southern territories"] = "法国南部地区";
            $country["gabon"] = "加蓬";
            $country["gambia"] = "冈比亚";
            $country["georgia"] = "格鲁吉亚";
            $country["germany"] = "德国";
            $country["ghana"] = "加纳";
            $country["gibraltar"] = "直布罗陀";
            $country["greece"] = "希腊";
            $country["greenland"] = "格陵兰岛";
            $country["grenada"] = "格林纳达";
            $country["guadeloupe"] = "瓜德罗普岛";
            $country["guam"] = "关岛";
            $country["guatemala"] = "危地马拉";
            $country["guinea"] = "几内亚";
            $country["guinea-bissau"] = "几内亚比绍";
            $country["guyana"] = "圭亚那";
            $country["haiti"] = "海地";
            $country["heard and mc donald islands"] = "听说和麦克唐纳群岛";
            $country["honduras"] = "洪都拉斯";
            $country["hong kong"] = "香港";
            $country["hungary"] = "匈牙利";
            $country["iceland"] = "冰岛";
            $country["india"] = "印度";
            $country["indonesia"] = "印度尼西亚";
            $country["iran (islamic republic of)"] = "伊朗 (伊斯兰共和国)";
            $country["iraq"] = "伊拉克";
            $country["ireland"] = "爱尔兰";
            $country["israel"] = "以色列";
            $country["italy"] = "意大利";
            $country["jamaica"] = "牙买加";
            $country["japan"] = "日本";
            $country["jordan"] = "约旦";
            $country["kazakhstan"] = "哈萨克斯坦";
            $country["kenya"] = "肯尼亚";
            $country["kiribati"] = "基里巴斯";
            $country["kuwait"] = "科威特";
            $country["kyrgyzstan"] = "吉尔吉斯斯坦";
            $country["lao people's democratic republic"] = "老挝人民民主共和国";
            $country["latvia"] = "拉托维亚";
            $country["lebanon"] = "黎巴嫩";
            $country["lesotho"] = "莱索托";
            $country["liberia"] = "利比里亚";
            $country["libyan arab jamahiriya"] = "阿拉伯利比亚民众国";
            $country["liechtenstein"] = "列支敦士登";
            $country["lithuania"] = "立陶宛";
            $country["luxembourg"] = "卢森堡";
            $country["macau"] = "澳门";
            $country["macedonia"] = "马其顿";
            $country["madagascar"] = "马达加斯加";
            $country["malawi"] = "马拉维";
            $country["malaysia"] = "马来西亚";
            $country["maldives"] = "马尔代夫";
            $country["mali"] = "马里";
            $country["malta"] = "马耳他";
            $country["marshall islands"] = "马绍尔群岛";
            $country["martinique"] = "马提尼克岛";
            $country["mauritania"] = "毛里塔尼亚";
            $country["mauritius"] = "毛里求斯";
            $country["mayotte"] = "马约特岛";
            $country["mexico"] = "墨西哥";
            $country["micronesia"] = "密克罗尼西亚联邦";
            $country["moldova"] = "摩尔多瓦";
            $country["monaco"] = "摩纳哥";
            $country["mongolia"] = "蒙古";
            $country["montserrat"] = "蒙特塞拉特";
            $country["montenegro"] = "黑山";
            $country["morocco"] = "摩洛哥";
            $country["mozambique"] = "莫桑比克";
            $country["myanmar"] = "缅甸";
            $country["namibia"] = "纳米比亚";
            $country["nauru"] = "瑙鲁";
            $country["nepal"] = "尼泊尔";
            $country["netherlands"] = "荷兰";
            $country["netherlands antilles"] = "荷属安地列斯群岛";
            $country["new caledonia"] = "新喀里多尼亚";
            $country["new zealand"] = "新西兰";
            $country["nicaragua"] = "尼加拉瓜";
            $country["niger"] = "尼日尔";
            $country["nigeria"] = "尼日利亚";
            $country["niue"] = "纽埃";
            $country["norfolk island"] = "诺福克岛";
            $country["north korea"] = "朝鲜";
            $country["northern mariana islands"] = "北马里亚纳群岛";
            $country["norway"] = "挪威";
            $country["oman"] = "阿曼";
            $country["pakistan"] = "巴基斯坦";
            $country["palau"] = "帕劳";
            $country["palestine"] = "巴勒斯坦";
            $country["panama"] = "巴拿马";
            $country["papua new guinea"] = "巴布亚新几内亚";
            $country["paraguay"] = "巴拉圭";
            $country["peru"] = "秘鲁";
            $country["philippines"] = "菲律宾";
            $country["pitcairn"] = "皮特凯恩";
            $country["poland"] = "波兰";
            $country["portugal"] = "葡萄牙";
            $country["puerto rico"] = "波多黎各";
            $country["qatar"] = "卡塔尔";
            $country["reunion"] = "团聚";
            $country["romania"] = "罗马尼亚";
            $country["russian federation"] = "俄罗斯联邦";
            $country["rwanda"] = "卢旺达";
            $country["saint kitts and nevis"] = "圣基茨和尼维斯";
            $country["saint lucia"] = "圣卢西亚";
            $country["saint vincent and the grenadines"] = "圣文森特和格林纳丁斯";
            $country["samoa"] = "萨摩亚";
            $country["san marino"] = "圣马利诺";
            $country["sao tome and principe"] = "圣多美和普林西比";
            $country["saudi arabia"] = "沙特阿拉伯";
            $country["serbia"] = "塞尔维亚";
            $country["senegal"] = "塞内加尔";
            $country["seychelles"] = "塞舌尔";
            $country["sierra leone"] = "塞拉利昂";
            $country["singapore"] = "新加坡";
            $country["slovakia (slovak republic)"] = "斯洛伐克 (斯洛伐克共和国)";
            $country["slovenia"] = "斯洛文尼亚";
            $country["solomon islands"] = "索罗门群岛";
            $country["somalia"] = "索马里";
            $country["south africa"] = "南非";
            $country["south korea"] = "韩国";
            $country["spain"] = "西班牙";
            $country["sri lanka"] = "斯里兰卡";
            $country["st. helena"] = "圣海伦娜";
            $country["st. pierre and miquelon"] = "圣皮埃尔和密克隆";
            $country["sudan"] = "苏丹";
            $country["suriname"] = "苏里南";
            $country["svalbard and jan mayen islands"] = "斯瓦尔巴特和扬马延岛";
            $country["swaziland"] = "斯威士兰";
            $country["sweden"] = "瑞典";
            $country["switzerland"] = "瑞士";
            $country["syrian arab republic"] = "阿拉伯叙利亚共和国";
            $country["taiwan"] = "台湾";
            $country["tajikistan"] = "塔吉克斯坦";
            $country["tanzania"] = "坦桑尼亚";
            $country["thailand"] = "泰国";
            $country["togo"] = "多哥";
            $country["tokelau"] = "托克劳";
            $country["tonga"] = "汤加";
            $country["trinidad and tobago"] = "特立尼达和多巴哥";
            $country["tunisia"] = "突尼斯";
            $country["turkey"] = "土耳其";
            $country["turkmenistan"] = "土库曼斯坦";
            $country["turks and caicos islands"] = "特克斯和凯科斯群岛";
            $country["tuvalu"] = "图瓦卢";
            $country["uganda"] = "乌干达";
            $country["ukraine"] = "乌克兰";
            $country["united arab emirates"] = "阿拉伯联合酋长国";
            $country["united kingdom"] = "英国";
            $country["united states"] = "美国";
            $country["united states minor outlying islands"] = "美国小离岛";
            $country["uruguay"] = "乌拉圭";
            $country["uzbekistan"] = "乌兹别克斯坦";
            $country["vanuatu"] = "瓦努阿图";
            $country["vatican city state (holy see)"] = "梵蒂冈城国 （教廷）";
            $country["venezuela"] = "委内瑞拉";
            $country["vietnam"] = "越南";
            $country["virgin islands (British)"] = "维尔京群岛 (英属)";
            $country["virgin islands (u.s.)"] = "美属维尔京群岛 （美国）";
            $country["wallis and futuna islands"] = "瓦利斯群岛和富图纳群岛";
            $country["western sahara"] = "西撒哈拉";
            $country["yemen"] = "也门";
            $country["yugoslavia"] = "南斯拉夫";
            $country["zambia"] = "赞比亚";
            $country["zimbabwe"] = "津巴布韦";
            $country["iran"] = "伊朗";
        }

        /* 如果是 cn 则翻转数组,将中文作为 Hash Index */
        if ($lang == 'cn') {
            $country = array_flip($country);
        }

        if ($isArray > 0)
            return $country;

        /* 如果国家不存在 */
        if (!isset($country[$name])) {
            return '*';
        }

        return $country[$name];
    }

    /*
     * 时区转换
     */
    static public function toTimeZone($src, $from_tz = 'UTC', $to_tz = 'Asia/Shanghai', $fm = 'Y-m-d H:i:s') {
        $datetime = new DateTime($src, new DateTimeZone($from_tz));
        $datetime->setTimezone(new DateTimeZone($to_tz));
        return $datetime->format($fm);
    }

    /**
     * 用淘宝的 api 来获取 ip 的来源国家
     * @param type $ip
     * @return type
     */
    public static function remoteGetCountry($ip = '0.0.0.0') {
        $dataUrl = "http://ip.taobao.com/service/getIpInfo.php?ip=" . $ip;
        $countryCode = 'unknown';
        if (function_exists('curl_init')) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $dataUrl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $ua = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : 'curl/7.29.0';
            curl_setopt($ch, CURLOPT_USERAGENT, $ua);
            curl_setopt($ch, CURLOPT_TIMEOUT, 10);
            $rData = curl_exec($ch);
        } else {
            $rData = file_get_contents($dataUrl);
        }
        if (!empty($rData)) {
            $countryData = json_decode($rData);
            if ($countryData->code == 0) {
                $countryCode = strtolower($countryData->data->country_id);
            }
        }
        return $countryCode;
    }

    /**
     * 过滤 xss 脚本
     * @param $val 字符串
     * @return $val 字符串
     */
    static function removeXSS($val) {
        $val = preg_replace('/([\x00-\x08,\x0b-\x0c,\x0e-\x19])/', '', $val);
        $search = 'abcdefghijklmnopqrstuvwxyz';
        $search .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $search .= '1234567890!@#$%^&*()';
        $search .= '~`";:?+/={}[]-_|\'\\';
        for ($i = 0; $i < strlen($search); $i++) {
            $val = preg_replace('/(&#[xX]0{0,8}' . dechex(ord($search[$i])) . ';?)/i', $search[$i], $val);
            $val = preg_replace('/(&#0{0,8}' . ord($search[$i]) . ';?)/', $search[$i], $val);
        }
        $ra1 = Array('javascript', 'vbscript', 'expression', 'applet', 'meta', 'xml', 'blink', 'link', 'script', 'embed', 'object', 'iframe', 'frame', 'frameset', 'ilayer', 'layer', 'bgsound', 'title', 'base');
        $ra2 = Array('onabort', 'onactivate', 'onafterprint', 'onafterupdate', 'onbeforeactivate', 'onbeforecopy', 'onbeforecut', 'onbeforedeactivate', 'onbeforeeditfocus', 'onbeforepaste', 'onbeforeprint', 'onbeforeunload', 'onbeforeupdate', 'onblur', 'onbounce', 'oncellchange', 'onchange', 'onclick', 'oncontextmenu', 'oncontrolselect', 'oncopy', 'oncut', 'ondataavailable', 'ondatasetchanged', 'ondatasetcomplete', 'ondblclick', 'ondeactivate', 'ondrag', 'ondragend', 'ondragenter', 'ondragleave', 'ondragover', 'ondragstart', 'ondrop', 'onerror', 'onerrorupdate', 'onfilterchange', 'onfinish', 'onfocus', 'onfocusin', 'onfocusout', 'onhelp', 'onkeydown', 'onkeypress', 'onkeyup', 'onlayoutcomplete', 'onload', 'onlosecapture', 'onmousedown', 'onmouseenter', 'onmouseleave', 'onmousemove', 'onmouseout', 'onmouseover', 'onmouseup', 'onmousewheel', 'onmove', 'onmoveend', 'onmovestart', 'onpaste', 'onpropertychange', 'onreadystatechange', 'onreset', 'onresize', 'onresizeend', 'onresizestart', 'onrowenter', 'onrowexit', 'onrowsdelete', 'onrowsinserted', 'onscroll', 'onselect', 'onselectionchange', 'onselectstart', 'onstart', 'onstop', 'onsubmit', 'onunload');
        $ra = array_merge($ra1, $ra2);
        $found = true;
        while ($found == true) {
            $val_before = $val;
            for ($i = 0; $i < sizeof($ra); $i++) {
                $pattern = '/';
                for ($j = 0; $j < strlen($ra[$i]); $j++) {
                    if ($j > 0) {
                        $pattern .= '(';
                        $pattern .= '(&#[xX]0{0,8}([9ab]);)';
                        $pattern .= '|';
                        $pattern .= '|(&#0{0,8}([9|10|13]);)';
                        $pattern .= ')*';
                    }
                    $pattern .= $ra[$i][$j];
                }
                $pattern .= '/i';
                //$replacement = substr($ra[$i], 0, 2).'<x>'.substr($ra[$i], 2);
                $replacement = 'XSSremoved';
                $val = preg_replace($pattern, $replacement, $val);
                if ($val_before == $val) {
                    $found = false;
                }
            }
        }
        return $val;
    }

    /**
     * 过滤 <a> 标签
     */
    static function removeTagA($str) {
        $str = str_replace('</a>', '', $str);
        $str = preg_replace('/<a[^>]+>/i', '', $str);
        return $str;
    }

    /**
     * 验证手机号是否正确
     * @author Canyian
     * @param INT $mobile, 支持的号码段:
     * 移动：134、135、136、137、138、139、150、151、152、157、158、159、182、183、184、187、188、178(4G)、147(上网卡)；
     * 联通：130、131、132、155、156、185、186、176(4G)、145(上网卡)；
     * 电信：133、153、180、181、189 、177(4G)；
     * 卫星通信：1349
     * 虚拟运营商：170
     */
    public static function isMobile($mobile) {
        if (!is_numeric($mobile)) {
            return false;
        }
        return preg_match('#^13[\d]{9}$|^14[5,7]{1}\d{8}$|^15[^4]{1}\d{8}$|^17[0,6,7,8]{1}\d{8}$|^18[\d]{9}$#', $mobile) ? true : false;
    }



}