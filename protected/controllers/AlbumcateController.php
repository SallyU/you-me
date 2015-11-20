<?php
/**
 * Created by PhpStorm.
 * User: QKY
 * Date: 15-11-20
 * Time: 下午2:06
 */
class AlbumcateController extends Controller{
    //添加相册
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
        $this->render('add',array('model' => $cate));
    }















}