<section id="content" class="m-t-lg wrapper-md animated fadeInUp">
    <div class="container aside-xl">
        <a class="navbar-brand block" href="<?php echo Yii::app()->homeUrl;?>"><span class="h1 font-bold">丶以晴</span></a>
        <section class="m-b-lg">
            <?php $form = $this->beginWidget('CActiveForm'); ?>
            <header class="wrapper text-center">
                <strong>
                </strong>
            </header>
                <div class="form-group">
                    <?php echo $form->textField($model,'name',array('class'=>'form-control rounded input-lg text-center no-border','placeholder'=>'张花花')); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->passwordField($model,'password',array('class'=>'form-control rounded input-lg text-center no-border','placeholder'=>'密码')); ?>
                </div>
                <div class="checkbox i-checks m-b">
                    <label class="m-l">
                        <?php echo $form->checkBox($model,'rememberMe',array('checked'=>'checked')); ?><i></i> 记住我十天, 公共场所请勿勾选</a>
                     </label>
                </div>
            <p class="text-muted text-center errorMsg">
                <?php echo $form->errorSummary($model); ?>
            </p>
                <button type="submit" class="btn btn-lg btn-warning lt b-white b-2x btn-block btn-rounded"><i class="icon-arrow-right pull-right"></i><span class="m-r-n-lg">登 录</span></button>
            <!--<div class="text-center m-t m-b"><a href="#"><small>Forgot password?</small></a></div>-->
<!--                <div class="line line-dashed"></div>-->
                <!--<p class="text-muted text-center"><small>Do not have an account?</small></p>
                <a href="signup.html" class="btn btn-lg btn-info btn-block rounded">Create an account</a>-->
            <?php $this->endWidget(); ?>
        </section>
    </div>
</section>