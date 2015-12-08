<?php
$this->pageTitle=Yii::app()->name . ' - 设置 ';
?>
<section id="content">
    <section class="vbox">
        <section class="scrollable padder">
            <div class="m-b-md">
                <h3 class="m-b-none">设置选项</h3>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <?php $form = $this->beginWidget('CActiveForm'); ?>
                        <div class="panel panel-default">
                            <header class="panel-heading">
                                <span class="font-bold">修改密码</span>
                            </header>
                            <div class="panel-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="step1">
                                        <p>旧密码:</p>
                                        <?php echo $form->passwordField($model,'oldpass',array('class'=>'form-control')); ?>
                                        <p><?php echo $form->error($model,'oldpass'); ?></p>
                                        <p class="m-t">新密码:</p>
                                        <?php echo $form->passwordField($model,'newpass',array('class'=>'form-control')); ?>
                                        <p class="m-t">新密码确认:</p>
                                        <?php echo $form->passwordField($model,'newpass2',array('class'=>'form-control')); ?>
                                        <p><?php echo $form->error($model,'newpass2'); ?></p>
                                    </div>
                                    <ul class="pager wizard m-b-sm">
                                        <li class="next">
                                            <button type="submit" class="btn btn-s-md btn-rounded" style="color: #FFF !important;background-color: #1AB667;border-color: #1AB667;float: right">
                                                <i class="icon-arrow-right pull-right"></i>
                                                确定修改
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php $this->endWidget(); ?>
                </div>
            </div>
        </section>
    </section>
    <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen,open" data-target="#nav,html"></a>
</section>