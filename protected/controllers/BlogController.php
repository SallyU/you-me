<?php
/**
 * Created by PhpStorm.
 * User: Yuan
 * Date: 15-11-2
 * Time: 上午10:58
 */
class BlogController extends Controller{
    public function actionIndex(){

        $actionName = '日志列表';//$this->getAction()->getId()获取控制器名称
        //breadcrumb
        $breadcrumb = array();
        $breadcrumb[] = array('url'=>$this->createUrl('blog/index'),'name'=> $actionName);

        $data = array(
            'actionName' => $actionName,
            'breadcrumb' => $breadcrumb,
        );
        $this->render('index',$data);
    }

    public function actionCreate(){

        $actionName = '发布日志';//$this->getAction()->getId()获取控制器名称
        //breadcrumb
        $breadcrumb = array();
        $breadcrumb[] = array('url'=>$this->createUrl('blog/create'),'name'=> $actionName);

        $data = array(
            'actionName' => $actionName,
            'breadcrumb' => $breadcrumb,
        );
        $this->render('create',$data);
    }
}