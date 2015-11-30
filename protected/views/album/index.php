<?php $this->pageTitle = Yii::app()->name . ' - 相册列表'; ?>
<section id="content">
    <section class="hbox stretch">
        <section>
            <section class="vbox">
                <section class="scrollable padder-lg w-f-md" id="bjax-target">
                    <?php if(!Yii::app()->user->isGuest){?>
                    <a href="<?php echo $this->createUrl('album/add'); ?>" class="pull-right text-muted m-t-lg">
                        <i class="fa fa-plus"></i>&nbsp;
                        添加相册
                    </a>
                    <?php } ?>
                    <h2 class="font-thin m-b">
                        相册列表
                    </h2>
                    <div class="row row-sm">
                        <?php
                        $i = 0;
                        foreach($model as $v => $_v){?>
                        <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                            <div class="item">
                                <div class="pos-rlt">
                                    <div class="item-overlay opacity r r-2x bg-black">
                                        <div class="bottom padder m-b-sm">
                                            <a href="#" class="pull-right" title="编辑">
                                                <i class="fa fa-pencil-square-o text-success-lter"></i>
                                            </a>
                                            <a href="#" title="删除">
                                                <i class="fa fa-trash-o text-danger"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="top">
                                        <span class="pull-right m-t-sm m-r-sm badge bg-white">
                                            <?php echo count(Photo::model()->findAll("albumid=:albumid",array(":albumid"=>$_v->albumid))); ?>
                                        </span>
                                    </div>
                                    <a href="#">

                                        <img src="<?php echo $_v->albumcover;?>" alt="" class="r r-2x img-full"></a>
                                </div>
                                <div class="padder-v">
                                    <a href="#" class="text-ellipsis"><?php echo $_v->albumname; ?></a>
                                    <a href="#" class="text-ellipsis text-xs text-muted"><?php echo $_v->albumdesc; ?></a>
                                </div>
                            </div>
                        </div>
                        <?php $i++;?>
                            <?php if($i % 2 ==0){
                                echo ' <div class="clearfix visible-xs"></div>';} ?>
                        <?php } ?>
                    </div>
                    <ul class="pagination pagination">
                        <li><a href="#"><i class="fa fa-chevron-left"></i></a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#"><i class="fa fa-chevron-right"></i></a></li>
                    </ul>
                </section>
            </section>
        </section>
    </section>
</section>