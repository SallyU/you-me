<?php
/**
 * Created by PhpStorm.
 * User: Yuan
 * Date: 2015/11/1 0001
 * Time: 15:59
 */
class IndexController extends Controller{
    public function actions()
    {
        return array(
        // captcha action renders the CAPTCHA image displayed on the contact page
        'captcha'=>array(
            'class'=>'Captcha',
            'backColor'=>0xFFFFFF,  //背景颜色
            'minLength'=>4,  //最短为4位
            'maxLength'=>4,   //是长为4位
            'transparent'=>true,  //显示为透明，当关闭该选项，才显示背景颜色
            ),);
    }
    //首页
    public  function actionIndex(){
        $this->render('index');
    }

    //登录
    public function actionLogin(){
        if(!Yii::app()->user->isGuest){
            $this -> redirect($this -> createUrl('index'));
        }
        $model = new LoginForm();
        $model->setScenario('login');
        if(isset($_POST['LoginForm'])){
            $model->attributes = $_POST['LoginForm'];
            //校验通过 validate()方法
            if($model->validate() && $model->login()){
                Yii::app()->session['login_error_times'] = 0;
                $this->redirect(array('index'));
            }
        }
        $this->render('login',array('model'=>$model));
    }
    //退出
    public function actionLogout(){
        Yii::app()->user->logout();
        //$this->redirect(Yii::app()->request->urlReferrer);
        $this -> redirect(array('index'));
    }
    //注册、添加用户
    public function actionCtrlAddUser(){
        if(!Yii::app()->user->isGuest){
            $this->redirect($this -> createUrl('index'));
        }
        $model = new User();
        if(isset($_POST['User'])){
            $model->attributes = $_POST['User'];
            if($model->save()){
                $this -> redirect($this -> createUrl('login'));
            }

        }
        $this->render('ctrlAddUser',array('model'=>$model));
    }
}