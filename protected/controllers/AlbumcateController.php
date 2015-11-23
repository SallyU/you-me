<?php
/**
 * Created by PhpStorm.
 * User: QKY
 * Date: 15-11-20
 * Time: 下午2:06
 */
class AlbumcateController extends Controller{
    //添加相册类别
    public function actionAdd(){
        if(Yii::app()->user->isGuest){
            $this->redirect(Yii::app()->homeUrl);
        }

        $words = '';
        $cate = new Albumcate();
        if(isset($_POST['Albumcate']) && !empty($_POST['Albumcate']['catename'])){
            $cate->attributes = $_POST['Albumcate'];
            $words = explode(" ",$_POST['Albumcate']['catename']);
            foreach($words as $_w => $w){
                $cate = new Albumcate();//此处需要重新定义
                $cate->createtime = time();
                $cate->catename = $w;
                $cate->save();
            }
        }
        //显示类别并且分页
        $criteria = new CDbCriteria();//$criteria->addCondition('status=1');//根据条件查询
        $criteria->order = "cateid DESC";//
        $count = Albumcate::model()->count($criteria);
        $pager = new CPagination($count);
        $pager->pageSize=16;//每页显示的数量
        $pager->applyLimit($criteria);

        $albumcate = Albumcate::model()->findAll($criteria); //根据条件查询

        $data = array(
            'model' => $cate,
            'pages' => $pager,
            'albumcate' => $albumcate,
            'count' => $count,
            );

        $this->render('add',$data);
    }

    //删除相册类别
    public function actionDelAlbumcate($cateid){
        $delcate = Albumcate::model()->findByPk($cateid);
        if($delcate ->delete())
            $this->redirect(array('albumcate/add'));
    }















}