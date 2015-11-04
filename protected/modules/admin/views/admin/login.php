<div class="dialog">
    <div class="panel panel-default">
        <div class="panel-body">
            <?php $form = $this->beginWidget('CActiveForm'); ?>
                <div class="form-group">
                    <label><?php echo $form->label($model,'name'); ?></label>
                    <?php echo $form->textField($model,'name',array('class'=>'form-control span12')); ?>
                </div>
                <div class="form-group">
                    <label><?php echo $form->label($model,'password'); ?></label>
                    <?php echo $form->passwordField($model,'password',array('class'=>'form-control span12')); ?>
                </div> <span style="color: #ff0000"><?php echo $form->errorSummary($model); ?></span>
<!--                <a href="" class="btn btn-primary pull-right">登录</a>-->
                <button type="submit" class="btn btn-primary pull-right">登 录</button>
                <label class="remember-me">
                    <?php echo $form->checkBox($model,'rememberMe'); ?>
                    <?php echo $form->label($model,'rememberMe'); ?>
                </label>
                <div class="clearfix"></div>
            <?php $this->endWidget(); ?>
        </div>
    </div>
    <p><a href="<?php echo Yii::app()->createUrl('admin/admin/register'); ?>">添加用户？</a></p>
</div>