<?php
/**
 * Created by PhpStorm.
 * User: Yuan
 * Date: 15-11-2
 * Time: 上午10:58
 */
class BlogController extends Controller{
    public function actionIndex(){
        $this->render('index');
    }
}