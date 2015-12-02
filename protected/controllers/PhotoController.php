<?php
/**
 * Created by PhpStorm.
 * User: Yuan
 * Date: 2015/11/24 0024
 * Time: 21:45
 */
class PhotoController extends Controller{

    public function actionIndex(){
        $this->render('index');
    }


    public function actionUpload(){
        if(Yii::app()->user->isGuest){
            $this->redirect(Yii::app()->homeUrl);
        }

        $this->render('upload');

    }
}