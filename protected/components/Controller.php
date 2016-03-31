<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layouts for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layouts. See 'protected/views/layouts/column1.php'.
	 */
//	public $layouts='//layouts/column1';
	public $layout='//layouts/default';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();

    /**
     * 重定向信息提示
     */
    public function redirectMsg($message='成功', $status='success',$time=3, $url=false )
    {

        //设置head头某些时候可能会乱码
        header('Content-Type:text/html;charset=utf-8');
        if(is_array($message)){
            $mess = '';
            foreach($message as $value){

                if(is_array($value)){

                    foreach($value as $v){
                        $mess.=$v.'<Br/>';
                    }
                }else{
                    $mess.=$value.'<Br/>';
                }
            }
        }else{
            $mess = $message;
        }


        $back_color ='#ff0000';

        if($status =='success')
        {
            $back_color= 'blue';
        }

        if(is_array($url))
        {
            $route=isset($url[0]) ? $url[0] : '';
            $url=$this->createUrl($route,array_splice($url,1));
        }
        if ($url)
        {
            $url = "window.location.href='{$url}'";
        }
        else
        {
            $url = "history.back();";
        }
        echo <<<HTML
        <div>
			<div style="background:#C9F1FF; margin:0 auto; height:100px; width:600px; text-align:center;">
			<div style="margin-top:50px;">
			<h5 style="color:{$back_color};font-size:14px; padding-top:20px;" >{$mess}</h5>
			页面正在跳转请等待<span id="sec" style="color:blue;">{$time}</span>秒
			</div>
			</div>
			</div>
			<script type="text/javascript">
			function run(){
			var s = document.getElementById("sec");
				if(s.innerHTML == 0){
				{$url}
				return false;
	}
				s.innerHTML = s.innerHTML * 1 - 1;
	}
				window.setInterval("run();", 1000);
				</script>
HTML;
        exit;
    }

    public function isMobile() {
        //判断浏览方式是手机还是电脑
        $user_agent = strtolower($_SERVER['HTTP_USER_AGENT']);
        $mobile_agents = Array("ipad", "wap", "android", "iphone", "sec", "sam", "ericsson", "240x320", "acer", "acoon", "acs-", "abacho", "ahong", "airness", "alcatel", "amoi", "anywhereyougo.com", "applewebkit/525", "applewebkit/532", "asus", "audio", "au-mic", "avantogo", "becker", "benq", "bilbo", "bird", "blackberry", "blazer", "bleu", "cdm-", "compal", "coolpad", "danger", "dbtel", "dopod", "elaine", "eric", "etouch", "fly ", "fly_", "fly-", "go.web", "goodaccess", "gradiente", "grundig", "haier", "hedy", "hitachi", "htc", "huawei", "hutchison", "inno", "ipaq", "ipod", "jbrowser", "kddi", "kgt", "kwc", "lenovo", "lg", "lg2", "lg3", "lg4", "lg5", "lg7", "lg8", "lg9", "lg-", "lge-", "lge9", "longcos", "maemo", "mercator", "meridian", "micromax", "midp", "mini", "mitsu", "mmm", "mmp", "mobi", "mot-", "moto", "nec-", "netfront", "newgen", "nexian", "nf-browser", "nintendo", "nitro", "nokia", "nook", "novarra", "obigo", "palm", "panasonic", "pantech", "philips", "phone", "pg-", "playstation", "pocket", "pt-", "qc-", "qtek", "rover", "sagem", "sama", "samu", "sanyo", "samsung", "sch-", "scooter", "sec-", "sendo", "sgh-", "sharp", "siemens", "sie-", "softbank", "sony", "spice", "sprint", "spv", "symbian", "tcl-", "teleca", "telit", "tianyu", "tim-", "toshiba", "tsm", "up.browser", "utec", "utstar", "verykool", "virgin", "vk-", "voda", "voxtel", "vx", "wellco", "wig browser", "wii", "windows ce", "wireless", "xda", "xde", "zte", "ben", "hai", "phili");
        $is_mobile = false;
        foreach ($mobile_agents as $device) {
            if (stristr($user_agent, $device)) {
                if ('ipad' == $device) {
                    $is_mobile = false;
                } else {
                    $is_mobile = true;
                }
                break;
            }
        }
        return $is_mobile;
    }
}