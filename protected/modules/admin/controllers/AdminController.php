<?php
/**
 * Created by PhpStorm.
 * User: Yuan
 * Date: 15-11-2
 * Time: 下午12:51
 */
class AdminController extends Controller{
    //自定义布局模板
    public $layout='/layouts/adminLayout';

    //后台管理员登录
    public function actionLogin(){
        $model = new LoginForm();
        if(isset($_POST['LoginForm'])){
            $model->attributes = $_POST['LoginForm'];
            //持久化用户信息 session,login()方法
            //校验通过 validate()方法
            if($model->validate() && $model->login())
                //$this->redirect(Yii::app()->user->returnUrl);//session 储存，开始
                //$this->redirect("./index.php?r=user/home&id=$id");
                //$this->redirect(Yii::app()->request->urlReferrer);
                $this->redirect(array('default/index'));
        }



        $this->render('login',array('model'=>$model));
    }

    //后台管理员注册
    public function actionRegister(){
        $model = new User();
        if(isset($_POST['User'])){
            $model->attributes = $_POST['User'];
            if($model->save()){
                $this -> redirect($this -> createUrl('login'));
            }

        }

        $this->render('register',array('model'=>$model));
    }
    //在controller里声明$this->widget('CCaptcha')验证码,调用CCaptchaAction，只能在控制器里面使用
    public function actions()
    {
        return array(
            'captcha'=>array(
                'class'=>'application.components.DCCaptchaAction',
                'backColor'=>0xCCCCCC,
                'testLimit'=>999,//form 开启了ajax验证 防止重复提交出错
                'width'=>75,    //默认120
                'height'=>30,    //默认50
                // 'padding'=>2,    //文字周边填充大小
                // 'backColor'=>0xFFFFFF,      //背景颜色
                // 'foreColor'=>0x2040A0,     //字体颜色
                // 'minLength'=>6,      //设置最短为6位
                // 'maxLength'=>7,       //设置最长为7位,生成的code在6-7直接rand了
                // 'transparent'=>false,      //显示为透明,默认中可以看到为false
                // 'offset'=>-2,        //设置字符偏移量
                // 'controller'=>'admin',        //拥有这个动作的controller
                'fixedVerifyCode' => substr(md5(time()),11,4), //每次都刷新验证码,可以在CCaptchaAction中设置
            ),
        );
    }



}