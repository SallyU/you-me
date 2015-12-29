<?php $this->pageTitle = Yii::app()->name . ' - '.$actionName; ?>
<section id="content">
    <section class="vbox">
        <section>
            <section class="hbox stretch">
                <section>
                    <section class="vbox">
                        <section class="scrollable padder-lg">
                            <?php if(!Yii::app()->user->isGuest){?>
                                <a href="<?php echo $this->createUrl('album/add'); ?>" class="pull-right text-muted m-t-lg">
                                    <i class="fa fa-plus"></i>&nbsp;
                                    添加相册
                                </a>
                            <?php } ?>
                            <h2 class="font-thin m-b">相册列表</h2>
                            <div class="row row-sm">
                                <?php
                                foreach($model as $v => $_v){?>
                                <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                                    <div class="item">
                                        <div class="pos-rlt">
                                            <?php if(!Yii::app()->user->isGuest){?>
                                            <div class="item-overlay opacity r r-2x bg-black">
                                                <div class="bottom padder m-b-sm">
                                                    <a href="#" class="pull-right" title="编辑">
                                                        <i class="fa fa-pencil-square-o text-success-lter"></i>
                                                    </a>
                                                    <?php if($_v->albumid !=1){//禁止删除默认相册 ?>
                                                    <a href="#" title="删除">
                                                        <i class="fa fa-trash-o text-danger"></i>
                                                    </a>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <?php } ?>
                                            <div class="top">
                                                <span class="pull-right m-t-sm m-r-sm badge bg-white">
                                                    <?php if(!Yii::app()->user->isGuest){
                                                        echo count(Photo::model()->findAll("albumid=:albumid",array(":albumid"=>$_v->albumid)));
                                                    } else {
                                                        echo count(Photo::model()->findAll("albumid= :albumid and picopen = :picopen",array(":albumid"=>$_v->albumid,':picopen' => 1)));
                                                    } ?>
                                                </span>
                                            </div>
                                            <a href="<?php echo $this->createUrl('album/show',array('albumid' => $_v -> albumid)); ?>">
                                                <img src="<?php echo Yii::app()->createUrl('ajax/getThumb', array('path' => ROOT_PATH.'uploads/albumcovers/'.$_v->albumcover, 'w' => '256', 'h' => '256')) ?>" alt="" class="r r-2x img-full">
                                            </a>
                                        </div>
                                        <div class="padder-v">
                                            <a href="<?php echo $this->createUrl('album/show',array('albumid' => $_v -> albumid)); ?>" class="text-ellipsis"><?php echo '《'.$_v->albumname.'》'; ?></a>
                                            <a href="" class="text-ellipsis text-xs text-muted"><?php echo $_v->albumcate->catename; ?></a>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
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
                        </section>
                    </section>
                </section>
            </section>
        </section>
    </section>
</section>