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

    public function actionLogin(){
        $this->render('login');
    }

    public function actionIndex(){
        $this->render('index');
    }

}