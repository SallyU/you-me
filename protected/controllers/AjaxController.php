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
            $total_num = count(Albumcate::model()->findAll('cateid != 1')); //总记录数,防止默认id为1的未分类被删除，此处隐藏
            $page_size = 16; //每页数量
            $page_total = ceil($total_num / $page_size); //总页数
            $page_start = $page * $page_size;
            $arr = array(
                "total_num" => $total_num,
                "page_size" => $page_size,
                "page_total_num" => $page_total,
            );
            $criteria = new CDbCriteria();//$criteria->addCondition('status=1');//根据条件查询
            $criteria -> select = "cateid,catename";
            $criteria -> condition = 'cateid != 1';//防止默认id为1的【未分类】被删除，此处隐藏
            $criteria -> order = "cateid DESC";
            $criteria -> limit = $page_size;
            $criteria -> offset = $page_start;//偏移量，和limit组在一起就是limit start到size
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
    /*
     * 更改图片公开状态
     */
    public  function actionChangeStatus(){
        $picid = $_POST['id'];
        if(!isset($picid) || empty($picid)) exit;
        $model = Photo::model()->findByPk($picid);
        if($model -> picopen == 1){
            $model -> picopen = 0;
            if($model -> save())
                echo '<i class="icon-lock text-danger"></i>';
        } else if($model -> picopen == 0){
            $model -> picopen =1;
            if($model -> save())
                echo '<i class="icon-lock-open text-success"></i>';
        }

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

    //下载图片
    public function actionDownloadPic(){
        $id = (int)$_GET['picid'];
        if(!isset($id) || $id==0) die('参数错误!');
        $model = Photo::model() -> findByPk($id);
        $filename = $model->picUrl;
        $myfile = './uploads/photos/' . $filename;

        if(file_exists($myfile)){
            $file = @ fopen($myfile, "r");
            header("Content-type: application/octet-stream");
            header("Content-Disposition: attachment; filename=" .$filename );
            while (!feof($file)) {
                echo fread($file, 50000);
            }
            fclose($file);
            exit;
        }else{
            echo '文件不存在！';
        }
    }

    //love功能
    public function actionLove(){
        $ip = Common::get_client_ip(); //获取用户IP
        $id = $_POST['id'];
        if(!isset($id) || empty($id)) exit;
        $count = count(Likeip::model()->findAll("picid = :picid and ip = :ip",array( ':picid' => $id,':ip' => $ip)));
        if($count==0){ //如果没有记录
            //更新数量
            $model = Photo::model()->findByPk($id);
            $model -> like+=1;
            $model -> save();
            //独立ip只能一次赞，写入数据库
            $newip = new Likeip();
            $newip -> picid = $id;
            $newip -> ip = $ip;
            $newip -> save();

            //重新获取喜欢的数量
            $like = Photo::model()->findByPk($id);
            echo '<a href="#" title="赞" rel="'.$id.'" class="lovePic">
            <span class="badge bg-white">
            <i class="fa fa-heart text-danger"></i>&nbsp;' .$like -> like. '</span></a>';
        } else {
            echo '<a href="#" title="赞" rel="'.$id.'" class="lovePic">
            <span class="badge bg-white">
            <i class="fa fa-heart text-danger"></i>&nbsp;喜欢不可以泛滥哦...</span></a>';
        }
    }

}