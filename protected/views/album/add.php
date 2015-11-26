<?php
/**
 * Created by PhpStorm.
 * User: QKY
 * Date: 15-11-25
 * Time: 上午8:49
 */
$this->pageTitle = Yii::app()->name . ' - 添加相册 ' ;
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
                新建相册
            </header>
            <div class="panel-body">
                <?php $form=$this->beginWidget('CActiveForm', array(
                    'enableAjaxValidation'=>false,
                    'htmlOptions'=>array(
                        'enctype'=>'multipart/form-data',
                        'class' =>'form-horizontal',
                        ),
                    )); ?>
                <div class="form-group">
                        <label class="col-sm-2 control-label">相册名称</label>
                        <div class="col-sm-10">
                            <?php echo $form->textField($model,'albumname',array('class' => 'form-control rounded')); ?>
                            <span class="help-block m-b-none"><?php echo $form->error($model,'albumname'); ?></span>
                        </div>
                    </div>
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">相册封面</label>
                        <div class="col-sm-10">
                            <div class="bootstrap-filestyle" style="display: inline;">
                                <?php echo $form->fileField($model,'albumcover',array('id' => 'file0'));?>
                                <img src="" id="img0" width="35%" alt="选择的图片将在这预览">
                                <span class="help-block m-b-none">若不想上传封面，可以在<a href="<?php echo $this->createUrl('album/index');?>" target="_blank">相册管理</a>设置封面</span>
                            </div>
                        </div>
                    </div>
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">相册描述</label>
                        <div class="col-sm-10">
                            <input class="form-control rounded" placeholder="不超过20个字的描述～" type="text">
                        </div>
                    </div>
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">请选择</label>
                        <div class="col-sm-10">
                            <select class="js-example-placeholder-single">
                                <option>公开</option>
                                <option>自己可见</option>
                            </select>
                            <select class="js-example-placeholder-single">
                                <option>公开</option>
                                <option>自己可见</option>
                            </select>
                        </div>
                    </div>
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-2">
                            <button type="submit" class="btn btn-primary rounded">确定添加</button>
                        </div>
                    </div>
                <?php $this->endWidget(); ?>
            </div>
        </section>
    </section>
</section>
<script>
    $(".js-example-placeholder-single").select2({
        minimumResultsForSearch: Infinity
    });
    $("#file0").change(function(){
        var objUrl = getObjectURL(this.files[0]) ;
        console.log("objUrl = "+objUrl) ;
        if (objUrl) {
            $("#img0").attr("src", objUrl) ;
        }
    }) ;
    //建立一個可存取到该file的url
    function getObjectURL(file) {
        var url = null ;
        if (window.createObjectURL!=undefined) { // basic
            url = window.createObjectURL(file) ;
        } else if (window.URL!=undefined) { // mozilla(firefox)
            url = window.URL.createObjectURL(file) ;
        } else if (window.webkitURL!=undefined) { // webkit or chrome
            url = window.webkitURL.createObjectURL(file) ;
        }
        return url ;
    }
</script>