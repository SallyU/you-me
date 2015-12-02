<?php
/**
 * Created by PhpStorm.
 * User: qky
 * Date: 15-12-2
 * Time: 上午9:35
 */
$this->pageTitle=Yii::app()->name . ' - 照片廊 ';?>
<section id="content">
    <section class="vbox" id="bjax-el">
        <section class="scrollable padder-lg">
            <?php if(!Yii::app()->user->isGuest){?>
                <a href="<?php echo $this->createUrl('photo/upload'); ?>" class="pull-right text-muted m-t-lg">
                    <i class="fa fa-plus"></i>&nbsp;
                    上传照片
                </a>
            <?php } ?>
            <h2 class="font-thin m-b">照片廊</h2>
            <div class="row row-sm">
                <div class="col-xs-12 col-sm-4">
                    <div class="item">
                        <div class="pos-rlt">
                            <div class="item-overlay opacity r r-2x bg-black">
                                <div class="center text-center m-t-n">
                                    <a href=""></a>
                                </div>
                            </div>
                            <!--<div class="top">
                                <span class="badge bg-dark m-l-sm m-t-sm">2015-12-01</span>
                            </div>-->
                            <a href=""><img src="<?php echo Yii::app()->request->baseUrl; ?>/src/default/testImg/m42.jpg" alt="" class="r r-2x img-full"></a>
                        </div>
                        <div class="padder-v">
                            <a href="" class="text-ellipsis"></a>
                                                       <a href="" class="text-ellipsis text-xs text-muted">《相册名》</a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <div class="item">
                        <div class="pos-rlt">
                            <div class="item-overlay opacity r r-2x bg-black">
                                <div class="center text-center m-t-n">
                                    <a href=""></a>
                                </div>
                            </div>
                            <!--<div class="top">
                                <span class="badge bg-dark m-l-sm m-t-sm">2015-12-01</span>
                            </div>-->
                            <a href=""><img src="<?php echo Yii::app()->request->baseUrl; ?>/src/default/testImg/m42.jpg" alt="" class="r r-2x img-full"></a>
                        </div>
                        <div class="padder-v">
                            <a href="" class="text-ellipsis"></a>
                                                       <a href="" class="text-ellipsis text-xs text-muted">《相册名》</a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <div class="item">
                        <div class="pos-rlt">
                            <div class="item-overlay opacity r r-2x bg-black">
                                <div class="center text-center m-t-n">
                                    <a href=""></a>
                                </div>
                            </div>
                            <!--<div class="top">
                                <span class="badge bg-dark m-l-sm m-t-sm">2015-12-01</span>
                            </div>-->
                            <a href=""><img src="<?php echo Yii::app()->request->baseUrl; ?>/src/default/testImg/m42.jpg" alt="" class="r r-2x img-full"></a>
                        </div>
                        <div class="padder-v">
                            <a href="" class="text-ellipsis"></a>
                                                       <a href="" class="text-ellipsis text-xs text-muted">《相册名》</a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <div class="item">
                        <div class="pos-rlt">
                            <div class="item-overlay opacity r r-2x bg-black">
                                <div class="center text-center m-t-n">
                                    <a href=""></a>
                                </div>
                            </div>
                            <!--<div class="top">
                                <span class="badge bg-dark m-l-sm m-t-sm">2015-12-01</span>
                            </div>-->
                            <a href=""><img src="<?php echo Yii::app()->request->baseUrl; ?>/src/default/testImg/m42.jpg" alt="" class="r r-2x img-full"></a>
                        </div>
                        <div class="padder-v">
                            <a href="" class="text-ellipsis"></a>
                                                       <a href="" class="text-ellipsis text-xs text-muted">《相册名》</a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <div class="item">
                        <div class="pos-rlt">
                            <div class="item-overlay opacity r r-2x bg-black">
                                <div class="center text-center m-t-n">
                                    <a href=""></a>
                                </div>
                            </div>
                            <!--<div class="top">
                                <span class="badge bg-dark m-l-sm m-t-sm">2015-12-01</span>
                            </div>-->
                            <a href=""><img src="<?php echo Yii::app()->request->baseUrl; ?>/src/default/testImg/m42.jpg" alt="" class="r r-2x img-full"></a>
                        </div>
                        <div class="padder-v">
                            <a href="" class="text-ellipsis"></a>
                                                       <a href="" class="text-ellipsis text-xs text-muted">《相册名》</a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <div class="item">
                        <div class="pos-rlt">
                            <div class="item-overlay opacity r r-2x bg-black">
                                <div class="center text-center m-t-n">
                                    <a href=""></a>
                                </div>
                            </div>
                            <!--<div class="top">
                                <span class="badge bg-dark m-l-sm m-t-sm">2015-12-01</span>
                            </div>-->
                            <a href=""><img src="<?php echo Yii::app()->request->baseUrl; ?>/src/default/testImg/m42.jpg" alt="" class="r r-2x img-full"></a>
                        </div>
                        <div class="padder-v">
                            <a href="" class="text-ellipsis"></a>
                                                       <a href="" class="text-ellipsis text-xs text-muted">《相册名》</a>
                        </div>
                    </div>
                </div>
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
    <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen,open" data-target="#nav,html"></a>
</section>