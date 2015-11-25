<?php
/**
 * Created by PhpStorm.
 * User: Yuan
 * Date: 15-11-2
 * Time: 上午10:46
 */
class AlbumController extends Controller{
    public function actionIndex(){
        $this->render('index');
    }
    //添加
    public function actionAdd(){
        if(Yii::app()->user->isGuest){
            $this->redirect($this->createUrl('index/index'));
        }
        $data = array();
        $model = new Album();




        $data = array(
            'model' => $model,
            );
        $this->render('add',$data);
    }

}