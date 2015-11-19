<?php
/**
 * Created by PhpStorm.
 * User: Yuan
 * Date: 2015/11/1 0001
 * Time: 15:59
 */
class IndexController extends Controller{
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
        if(isset($_POST['LoginForm'])){
            $model->attributes = $_POST['LoginForm'];
            //校验通过 validate()方法
            if($model->validate() && $model->login())
                $this->redirect(array('index'));
        }
        $this->render('login',array('model'=>$model));
    }
    //退出
    public function actionLogout(){
        Yii::app()->user->logout();
        $this -> redirect($this -> createUrl('login'));
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