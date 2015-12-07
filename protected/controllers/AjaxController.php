<?php
/**
 * Created by PhpStorm.
 * User: QKY
 * Date: 15-12-1
 * Time: 上午11:07
 */
class AjaxController extends Controller
{
    //相册分类增加页面Ajax分页
    public function actionPage()
    {
        if (Yii::app()->request->isAjaxRequest) {
            $page = (int)Yii::app()->request->getParam('page');//当前页
            $total_num = count(Albumcate::model()->findAll()); //总记录数
            $page_size = 16; //每页数量
            $page_total = ceil($total_num / $page_size); //总页数
            $page_start = $page * $page_size;
            $arr = array(
                "total_num" => $total_num,
                "page_size" => $page_size,
                "page_total_num" => $page_total,
            );
            $criteria = new CDbCriteria();//$criteria->addCondition('status=1');//根据条件查询
            $criteria->select = "cateid,catename";
            $criteria->order = "cateid DESC";
            $criteria->limit = $page_size;
            $criteria->offset = $page_start;//偏移量，和limit组在一起就是limit start到size
            $query = Albumcate::model()->findAll($criteria);

            foreach ($query as $row) {
                $arr['list'][] = array(
                    'id' => $row['cateid'],
                    'title' => $row['catename'],
                );
            }
            echo json_encode($arr);
        }
    }

    /**
     * 缩略图片生成
     * @ path 图片路径
     * @ width 图片宽度
     * @ height 图片高度
     */
    public function actionGetThumb($path, $w, $h) {
        $file_name = md5($path . $w . $h);
        $thumb_dir = Common::mkdirs('./showpictemp/');//和下面方法一样
        /*if (!is_dir($thumb_dir) || !is_writeable($thumb_dir)) {
            mkdir($thumb_dir, 0755, TRUE);//不建议使用777
        }*/
        if (file_exists('./showpictemp/' . $file_name . '.jpg')) {
            header('location:./showpictemp/' . $file_name . '.jpg');//存在结果的时候重定向输出
            Yii::app()->end();
        }
        Yii::import("ext.EPhpThumb.EPhpThumb");
        $thumb = new EPhpThumb();
        $thumb->init();
        $thumb->create($path)
            ->adaptiveResize($w, $h)
            ->save('./showpictemp/' . $file_name . '.jpg')
            ->show();
    }
    //ajax单独设置公开
    public function actionOpen($picid){
        /*if(Yii::app()->request->isAjaxRequest){//如果是ajax请求

        }*/
        $model = Photo::model()->findByPk($picid);
        $model->picopen = 1;
        $model->save();
        $this->redirect($this->createUrl('photo/manage'));
    }

    //图片管理页面点击保存
    public function actionPhotoTitle(){
        $field=$_POST['id'];
        $val=trim($_POST['value']);
        if(strlen($val)>20){
            echo "您输入的字符大于20字了";
            exit;
        }
        if(empty($val)){
            echo "不能为空";
        }else{
            $model = Photo::model()->findByPk($field);
            $model->pictitle = trim($val);
            if($model->save()){
                echo $val;
            } else {
                echo "数据出错";
            }
        }
    }
    public function actionPhotoDesc(){
        $field=$_POST['id'];
        $val=trim($_POST['value']);
        if(strlen($val)>140){
            echo "您输入的字符大于140字了";
            exit;
        }
        if(empty($val)){
            echo "不能为空";
        }else{
            $model = Photo::model()->findByPk($field);
            $model->picdesc = trim($val);
            if($model->save()){
                echo $val;
            } else {
                echo "数据出错";
            }
        }
    }

    //相册列表json编码
    public function actionAlbumList(){
        $model = Album::model()->findAll(array('order' => 'createtime DESC'));
        $arr=array();
        foreach($model as $row){
            $arr[$row['albumid']] = $row['albumname'];
        }
        print json_encode($arr);
    }

    //照片管理页面照片添加到相册
    public function actionToAlbum(){
        $field=$_POST['id'];
        $val=trim($_POST['value']);

        if(!empty($val)){
            $model = Photo::model()->findByPk($field);
            $model->albumid = trim($val);
            if($model->save()){
                $data = Album::model()->findByPk($val);
                echo $data->albumname;
            } else {
                echo "数据出错";
            }
        }
    }

}