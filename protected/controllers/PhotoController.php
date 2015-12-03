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
        $pager->pageSize=12;//每页显示的数量
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

    public function actionManage(){
        $this->render('manage');
    }

    //一键公开所有照片
    public function actionOpen(){
        $criteria = new CDbCriteria();
        $criteria->order = "createtime DESC";
        $criteria->addCondition('picopen = 0');
        $model = Photo::model()->findAll($criteria);
        if(isset($model) && !empty($model)){

        }

    }
}