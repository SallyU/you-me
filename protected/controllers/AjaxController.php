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

}