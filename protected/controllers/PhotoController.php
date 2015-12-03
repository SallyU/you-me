<?php
/**
 * Created by PhpStorm.
 * User: Yuan
 * Date: 2015/11/24 0024
 * Time: 21:45
 */
class PhotoController extends Controller{

    public function actionIndex(){
        $criteria = new CDbCriteria();
        $criteria->order = "createtime DESC";
        if(Yii::app()->user->isGuest)
            $criteria->addCondition('picopen = 1');//游客，查看公开的
        $count = Photo::model()->count($criteria);
        $pager = new CPagination($count);
        $pager->pageSize=19;//每页显示的数量
        $pager->applyLimit($criteria);
        $model = Photo::model()->findAll($criteria);
        $data = array(
            'model' => $model,
            'pages' => $pager,
            'count' => $count,
        );
        $this->render('index',$data);
    }




    public function actionUpload(){
        if(Yii::app()->user->isGuest){
            $this->redirect(Yii::app()->homeUrl);
        }
        $this->render('upload');
    }
}