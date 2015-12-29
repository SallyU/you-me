<?php
/**
 * Created by PhpStorm.
 * User: QKY
 * Date: 15-12-29
 * Time: 下午2:09
 */
?>
<div class="row row-sm">
    <?php if(isset($model) && !empty($model)){
        $i = 0;
        foreach($model as $v => $_v){?>
            <div class="col-sm-6 col-lg-3">
                <div class="item">
                    <div class="pos-rlt">
                        <div class="bottom padder m-b-sm">
                            <?php if(!Yii::app()->user->isGuest){?>
                                <a href="#" class="pull-right" title="删除" data-href="####1212" data-toggle="modal" data-target="#confirm-delete">
                                    <i class="fa fa-trash-o text-danger"></i>
                                </a>
                            <?php } ?>
                            <a href="<?php echo $this->createUrl('photo/view',array('id' => $_v -> picid)); ?>" class="pull-right" title="详细信息">
                                <i class="icon-info text-success-lter"></i>
                            </a>
                            <a href="#" title="喜欢" rel="<?php echo $_v->picid; ?>" class="lovePic"><span class="badge bg-white"><i class="fa fa-heart text-danger"></i>&nbsp;<?php echo $_v->love; ?></span></a>
                        </div>
                        <a href="<?php echo 'uploads/photos/'.$_v->picUrl;?>" data-lightbox="roadtrip">
                            <img src="<?php echo Yii::app()->createUrl('ajax/getThumb', array('path' => ROOT_PATH.'uploads/photos/'.$_v->picUrl, 'w' => '450', 'h' => '300')) ?>" alt="" class="r r-2x img-full">
                        </a>
                    </div>
                    <div style="padding-top: 4px;padding-bottom: 4px;">
                        <a class="btn btn-default" href="<?php echo $this->createUrl('ajax/downloadPic',array('picid' => $_v -> picid));?>" style="padding: 2px;font-size: 12px">
                            <i class="fa fa-cloud-download text-success"></i>
                            <span class="text">下载原图</span>
                        </a>
                    </div>
                </div>
            </div>
            <?php $i++;?>
            <?php if($i % 2 ==0){
                echo ' <div class="clearfix visible-xs"></div>';} ?>
        <?php }} else{?>
        <span>暂时没有照片，<a href="#">留言</a>以晴让她上传吧！</span>
    <?php } ?>
</div>
<ul class="pagination pagination">
    <?php
    if($pages->pageCount >= 2){
        $this->widget('CLinkPager',array(
            'header' => '',
            'firstPageLabel' => '首页',
            'lastPageLabel' => '最后一页',
            'prevPageLabel' => '上一页',
            'nextPageLabel' => '下一页',
            'pages' => $pages,
            'maxButtonCount'=>7,
        ));
    }?>
</ul>
<script>
    $(function(){
        $(".lovePic").click(function(){
            var love = $(this);
            var id = love.attr("rel"); //对应id
            love.fadeOut(300); //渐隐效果
            $.ajax({
                type:"POST",
                url:"<?php echo $this->createUrl('ajax/love'); ?>",
                data:"id="+id,
                cache:false, //不缓存此页面
                success:function(data){
                    love.html(data);
                    love.fadeIn(300); //渐显效果
                }
            });
            return false;
        });
    });
</script>