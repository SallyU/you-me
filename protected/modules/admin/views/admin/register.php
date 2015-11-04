<div class="dialog">
    <div class="panel panel-default">
<!--        <p class="panel-heading no-collapse">Sign Up</p>-->
        <div class="panel-body">
            <?php $form = $this->beginWidget('CActiveForm',array(
                'enableAjaxValidation'=>true,
            )); ?>
            <form>
                <!--<div class="form-group">
                    <label>First Name</label>
                    <input type="text" class="form-control span12">
                </div>
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" class="form-control span12">
                </div>
                <div class="form-group">
                    <label>Email Address</label>
                    <input type="text" class="form-control span12">
                </div>-->
                <div class="form-group">
                    <label><?php echo $form->labelEx($model,'name'); ?></label>
                    <?php echo $form->textField($model,'name',array('class'=>'form-control span12')); ?>
                    <span style="color: #ff0000"><?php echo $form->error($model,'name'); ?></span>
                </div>
                <div class="form-group">
                    <label><?php echo $form->labelEx($model,'password'); ?></label>
                    <?php echo $form->passwordField($model,'password',array('class'=>'form-control span12')); ?>
                    <span style="color: #ff0000"><?php echo $form->error($model,'password'); ?></span>
                </div>
                <div class="form-group">
                    <label><?php echo $form->labelEx($model,'passwordConfirm'); ?></label>
                    <?php echo $form->passwordField($model,'passwordConfirm',array('class'=>'form-control span12')); ?>
                    <span style="color: #ff0000"><?php echo $form->error($model,'passwordConfirm'); ?></span>
                </div>
<!--                <div class="form-group">-->
<!--                    <label>验证码</label>-->
<!--                    <input type="text" class="form-control span12" placeholder="请正确的输入下图上的字符">-->
<!--                </div>-->
                <div class="form-group">
<!--                    <a href="" class="btn btn-primary pull-right" onclick="submit()">添加用户</a>-->
<!--                    <label class="remember-me">验证码位置</label>-->
                    <button type="submit" class="btn btn-primary pull-right">添加用户</button>
                </div>
                <div class="clearfix"></div>
            </form>
            <?php $this->endWidget(); ?>
        </div>
    </div>
    <p><a href="<?php echo Yii::app()->createUrl('admin/admin/login') ?>" style="font-size: .75em; margin-top: .25em;">返回登录？</a></p>
</div>