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
}