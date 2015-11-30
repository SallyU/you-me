<?php
/**
 * Created by PhpStorm.
 * User: Yuan
 * Date: 15-11-2
 * Time: 上午10:46
 */
class AlbumController extends Controller{
    public function actionIndex(){
        //如果未登录则查询公开的，如果登录，则全部查询
        if(Yii::app()->user->isGuest){
            $criteria = new CDbCriteria();
            $criteria->order = "createtime DESC";
            $criteria->addCondition('albumopen = 1');//根据条件查询
            $count = Album::model()->count($criteria);
            $pager = new CPagination($count);
            $pager->pageSize=12;//每页显示的数量
            $pager->applyLimit($criteria);

            $model = Album::model()->findAll($criteria);
        } else {
            $criteria = new CDbCriteria();
            $criteria->order = "createtime DESC";
            $count = Album::model()->count($criteria);
            $pager = new CPagination($count);
            $pager->pageSize=12;//每页显示的数量
            $pager->applyLimit($criteria);

            $model = Album::model()->findAll($criteria);
        }

        $data = array(
            'model' => $model,
            'pages' => $pager,
            'count' => $count,
        );

        $this->render('index',$data);
    }
    //新建相册
    public function actionAdd(){
        if(Yii::app()->user->isGuest){
            $this->redirect($this->createUrl('index/index'));
        }
        $open = array(
            '0'=>'-是否公开-',
            '1'=>'公开',
            '2'=>'自己可见',
        );
        $data = array();
        $model = new Album();
        $albumcate = Albumcate::model()->findAll(array('order'=>'createtime DESC'));
        if(isset($_POST['Album'])){
            $model -> attributes = $_POST['Album'];
            $upcover = CUploadedFile::getInstance($model,'albumcover');//获得一个CUploadedFile的实例
            $uploaddir = './uploads/albumcovers/';
            if(is_object($upcover) && get_class($upcover) === 'CUploadedFile')// 判断实例化是否成功
            {
                $model->albumcover = $uploaddir.time().'_'.rand(0,9999).'.'.$upcover->extensionName;//定义文件保存的名称
            }else{
                $model->albumcover = $uploaddir.'nophoto.jpg';// 若果失败则应该是什么图片
            }
            $model->createtime = time();
            if($model->save())
            {
                if(is_object($upcover) && get_class($upcover) === 'CUploadedFile'){
                    $upcover->saveAs($model->albumcover);// 上传图片  
                }
                $this -> redirect(array('album/index'));
            }

        }
        $data = array(
            'model' => $model,
            'open' => $open,
            'albumcate' => $albumcate,
            );
        $this->render('add',$data);
    }

}