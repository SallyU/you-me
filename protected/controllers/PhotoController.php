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

    //照片管理
    public function actionManage(){
        $count = count(Photo::model()->findAll());//统计数量
        $pageSize = 8;//每页显示条数
        $pager = new Pagination($count, $pageSize);//分页
        $sql = "select * from {{photo}} order by createtime desc $pager->limit";
        $model = Photo::model()->findAllBySql($sql);
        $pageList = $pager->fpage(array(1,2,3,4,6,7,8));
        $data =array(
            'model' => $model,
            'pageList' => $pageList,
        );

        $this->render('manage',$data);
    }

    //一键公开所有照片
    public function actionOpen(){
        $criteria = new CDbCriteria();
        $criteria->addCondition('picopen = 0');
        $model = Photo::model()->findAll($criteria);
        if(isset($model) && !empty($model)){
            foreach($model as $m => $_m){
                $newModel = Photo::model()->findByPk($_m->picid);
                $newModel->picopen = 1;
                $newModel->save();
            }
            Yii::app()->user->setFlash('open','<span style="color:limegreen">成功公开所有照片</span>');
            $this->redirect($this->createUrl('manage'));
        } else {
            Yii::app()->user->setFlash('open','<span style="color:limegreen">没有找到未公开的照片！</span>');
            $this->redirect($this->createUrl('manage'));
        }
    }
    //一键私有所有照片
    public function actionLock(){
        $criteria = new CDbCriteria();
        $criteria->addCondition('picopen = 1');
        $model = Photo::model()->findAll($criteria);
        if(isset($model) && !empty($model)){
            foreach($model as $m => $_m){
                $newModel = Photo::model()->findByPk($_m->picid);
                $newModel->picopen = 0;
                $newModel->save();
            }
            Yii::app()->user->setFlash('lock','<span style="color: #ff0000">成功保密所有照片</span>');
            $this->redirect($this->createUrl('manage'));
        } else {
            Yii::app()->user->setFlash('lock','<span style="color: limegreen">所有照片均保密，不需要操作！</span>');
            $this->redirect($this->createUrl('manage'));
        }
    }

    //查看照片
    public function actionView(){
        $id = $_GET['id'];
        //判断是否存在id,是否是数字
        if(isset($id) && !empty($id) && intval($id) && is_numeric($id)){
            $model = Photo::model()->findByPk($id);
            if(!isset($model) || empty($model))
                throw new CHttpException(404,'非法操作！');
            echo "test";
        } else {
            throw new CHttpException(404,'非法操作！');
        }

    }

}