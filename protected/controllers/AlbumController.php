<?php
/**
 * Created by PhpStorm.
 * User: Yuan
 * Date: 15-11-2
 * Time: 上午10:46
 */
class AlbumController extends Controller{
    public function actionIndex(){

        $criteria = new CDbCriteria();
        $criteria->order = "albumid ASC";
        if(Yii::app()->user->isGuest)
            $criteria->addCondition('albumopen = 1');//根据条件查询
        $count = Album::model()->count($criteria);
        $pager = new CPagination($count);
        $pager->pageSize=12;//每页显示的数量
        $pager->applyLimit($criteria);

        $model = Album::model()->findAll($criteria);

        $actionName = '相册';//$this->getAction()->getId()获取控制器名称

        $data = array(
            'model' => $model,
            'pages' => $pager,
            'count' => $count,
            'actionName' => $actionName,
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
            Common::mkdirs('./uploads/albumcovers/');//利用封装的方面，和下面方法一样
            /*if (!is_dir($uploaddir) || !is_writeable($uploaddir)) {
                mkdir($uploaddir, 0755, TRUE);//不建议使用777
            }*/
            if(is_object($upcover) && get_class($upcover) === 'CUploadedFile')// 判断实例化是否成功
            {
                $model->albumcover = time().'_'.rand(0,9999).'.'.$upcover->extensionName;//定义文件保存的名称
            }else{
                $model->albumcover = 'nophoto.jpg';// 若果失败则应该是什么图片
            }
            $model->createtime = time();
            if($model->save())
            {
                if(is_object($upcover) && get_class($upcover) === 'CUploadedFile'){
                    $upcover->saveAs(Yii::app()->basePath.'/../uploads/albumcovers/'.$model->albumcover);// 上传图片
                }
                $this -> redirect(array('album/index'));
            }

        }
        $actionName = '添加相册';//$this->getAction()->getId()获取控制器名称
        $data = array(
            'model' => $model,
            'open' => $open,
            'albumcate' => $albumcate,
            'actionName' => $actionName,
            );
        $this->render('add',$data);
    }

    //显示相册内的照片
    public function actionShow(){
        $albumid = $_GET['albumid'];
        $album = Album::model()->findByPk($albumid);
        if(!isset($album) || empty($album))
            throw new CHttpException(404,'非法操作！');
        if(Yii::app()->user->isGuest && $album -> albumopen == 2)
            throw new CHttpException(404,'非法操作！');
        $criteria = new CDbCriteria();
        $criteria->order = "createtime DESC";
        $criteria->addCondition('albumid = '.$albumid.' ');
        if(Yii::app()->user->isGuest)
            $criteria->addCondition('picopen = 1');//游客，查看公开的
        $count = Photo::model()->count($criteria);
        $pager = new CPagination($count);
        $pager->pageSize=12;//每页显示的数量
        $pager->applyLimit($criteria);
        $model = Photo::model()->findAll($criteria);

        $data = array(
            'album' => $album,
            'model' => $model,
            'pages' => $pager,
            'count' => $count,
        );
        $this->render('show',$data);
    }

}