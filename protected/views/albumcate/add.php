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
                <section class="panel panel-default">
                    <header class="panel-heading font-bold">Basic form</header>
                    <div class="panel-body">
                        <form role="form">
                            <div class="form-group">
                                <label>Email address</label>
                                <input class="form-control" placeholder="Enter email" type="email">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input class="form-control" placeholder="Password" type="password">
                            </div>
                            <div class="checkbox i-checks">
                                <label>
                                    <input checked="" disabled="" type="checkbox"><i></i> Check me out
                                </label>
                            </div>
                            <button type="submit" class="btn btn-sm btn-default">Submit</button>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </section>
</section>