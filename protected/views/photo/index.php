<?php
$this->pageTitle = Yii::app()->name . ' - 照片廊';
Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/src/default/css/lightbox.css');
?>
<script src="<?php echo Yii::app()->baseUrl . '/src/default/js/lightbox-plus-jquery.min.js';?>"></script>
<style>
    .pos-rlt a:hover, a:focus {
        text-decoration: none;
        color: transparent;
    }
</style>
<section id="content">
    <section class="hbox stretch">
        <section>
            <section class="vbox">
                <section class="scrollable padder-lg" id="bjax-target">
                    <?php if(!Yii::app()->user->isGuest){?>
                        <a href="<?php echo $this->createUrl('photo/upload'); ?>" class="pull-right text-muted m-t-lg">
                            <i class="fa fa-plus"></i>&nbsp;
                            上传照片
                        </a>
                    <?php } ?>
                    <h2 class="font-thin m-b">
                        照片廊
                    </h2>
                    <div class="row row-sm">
                        <?php if(isset($model) && !empty($model)){
                        $i = 0;
                        foreach($model as $v => $_v){?>
                            <div class="col-sm-6 col-lg-3">
                                <div class="item">
                                    <div class="pos-rlt">
                                        <!--<div class="item-overlay opacity r r-2x">
                                            <div class="text-info padder m-t-sm text-sm">
                                                <i class="fa fa-heart text-danger"></i>
                                            </div>
                                            <div class="bottom padder m-b-sm">
                                                <a href="#" class="pull-right" title="编辑">
                                                    <i class="fa fa-pencil-square-o text-success-lter"></i>
                                                </a>
                                                <a href="#" title="删除">
                                                    <i class="fa fa-trash-o text-danger"></i>
                                                </a>
                                            </div>
                                        </div>-->
                                        <a href="<?php echo 'uploads/photos/'.$_v->picUrl;?>" data-lightbox="roadtrip">
                                            <img src="<?php echo Yii::app()->createUrl('ajax/getThumb', array('path' => ROOT_PATH.'uploads/photos/'.$_v->picUrl, 'w' => '450', 'h' => '300')) ?>" alt="" class="r r-2x img-full">
                                        </a>
                                    </div>
                                    <div class="padder-v">
                                        <a href="#" class="text-ellipsis"></a>
                                        <a href="#" class="text-ellipsis text-xs text-muted"></a>
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
                </section>
            </section>
        </section>
    </section>
</section>