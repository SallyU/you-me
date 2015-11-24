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
    //上传图片  回头修改到pic 控制器
    public function actionUpload(){
        $this->render('upload');
    }

    //新增相册
    public function actionNewAlbum(){
        $this->render('newAlbum');
    }
}