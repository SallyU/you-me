<?php
$this->pageTitle=Yii::app()->name . ' - 添加相册类别 ';
?>
<section class="vbox">
    <section class="scrollable padder">
        <div class="m-b-md">
            <h3 class="m-b-none"></h3>
        </div>
        <section class="panel panel-default">
            <header class="panel-heading font-bold">
                <ul class="nav nav-pills pull-right">
                    <li>
                        <a href="#" class="panel-toggle text-muted"><i class="fa fa-caret-down text-active"></i><i class="fa fa-caret-up text"></i></a>
                    </li>
                </ul>
               新建相册类别
            </header>
            <div class="panel-body">
                <?php $form = $this->beginWidget('CActiveForm',array(
                    'htmlOptions'=>array(
                        'class'=>'form-horizontal',
                        ))); ?>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">相册类别名称</label>
                        <div class="col-sm-10">
                            <?php echo $form->textField($model,'catename',array('class' => 'form-control')); ?>
                            <span class="help-block m-b-none">可以一次添加多个类别，以空格隔开<?php echo $form->error($model,'catename'); ?></span>
                        </div>
                    </div>
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-2">
                            <button type="submit" class="btn btn-primary">确定添加</button>
                        </div>
                    </div>
                <?php $this->endWidget(); ?>
            </div>
        </section>
        <div class="row">
            <div class="col-sm-6">
                <section class="panel panel-default pos-rlt clearfix">
                    <header class="panel-heading">
                        <ul class="nav nav-pills pull-right">
                            <li>
                                <a href="#" class="panel-toggle text-muted"><i class="fa fa-caret-down text-active"></i><i class="fa fa-caret-up text"></i></a>
                            </li>
                        </ul>
                        已有相册类别
                    </header>
                    <div class="panel-body clearfix">
                        <?php if(isset($albumcate) && !empty($albumcate) && $count >0 ){?>
                            <div class="doc-buttons">
                            <?php foreach($albumcate as $_a => $a){?>
                                    <a href="#" class="btn btn-s-md btn-default btn-rounded">
                                        <?php echo $a->catename;    ?>
                                        <button title="删除该类别" type="button" class="close" data-href="<?php echo $this->createUrl('albumcate/delalbumcate',array('cateid'=>$a->cateid));?>" data-toggle="modal" data-target="#confirm-delete" style="float: none;font-size: 16px;">&times;</button>
                                    </a>
                            <?php }} else{
                                echo "咦，一个相册类别都没有，赶紧添加一个吧！";
                            } ?>
                            </div>
                            <?php
                            if($pages->pageCount >= 2){
                                echo '<div class="text-center">';
                                $this->widget('CLinkPager',array(
                                    'header' => '',
                                    'firstPageLabel' => '首页',
                                    'lastPageLabel' => '最后一页',
                                    'prevPageLabel' => '上一页',
                                    'nextPageLabel' => '下一页',
                                    'pages' => $pages,
                                    'maxButtonCount'=>7,
                                ));
                                echo ' </div>';
                            }?>
                    </div>
                </section>
            </div>
        </div>
    </section>
</section>
