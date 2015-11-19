<section id="content" class="m-t-lg wrapper-md animated fadeInDown">
    <div class="container aside-xl">
        <a class="navbar-brand block" href="<?php echo Yii::app()->homeUrl;?>"><span class="h1 font-bold">丶以晴</span></a>
        <section class="m-b-lg">
            <?php $form = $this->beginWidget('CActiveForm'); ?>
            <header class="wrapper text-center">
<!--                <strong>Sign up to find interesting thing</strong>-->
            </header>
                <div class="form-group">
                    <?php echo $form->textField($model,'name',array('class'=>'form-control rounded input-lg text-center no-border','placeholder'=>'用户名')); ?>
                    <p class="text-muted text-center">
                        <?php echo $form->error($model,'name'); ?>
                    </p>
                </div>
                <div class="form-group">
                    <?php echo $form->passwordField($model,'password',array('class'=>'form-control rounded input-lg text-center no-border','placeholder'=>'密码')); ?>
                    <p class="text-muted text-center">
                        <?php echo $form->error($model,'password'); ?>
                    </p>
                </div>
                <div class="form-group">
                    <?php echo $form->passwordField($model,'passwordConfirm',array('class'=>'form-control rounded input-lg text-center no-border','placeholder'=>'请再输入一遍密码')); ?>
                    <p class="text-muted text-center errorMsg">
                        <?php echo $form->error($model,'passwordConfirm'); ?>
                    </p>
                </div>
                <button type="submit" class="btn btn-lg btn-warning lt b-white b-2x btn-block btn-rounded"><i class="icon-arrow-right pull-right"></i><span class="m-r-n-lg">生一个大胖小子</span></button>
                <div class="line line-dashed"></div>
                <p class="text-muted text-center"><small>用旧账号登录?</small></p>
                <a href="<?php echo $this->createUrl('login'); ?>" class="btn btn-lg btn-info btn-block btn-rounded">去登录</a>
            <?php $this->endWidget(); ?>
        </section>
    </div>
</section>