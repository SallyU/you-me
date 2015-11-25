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
                <form class="form-horizontal">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">相册名称</label>
                        <div class="col-sm-10">
                            <input class="form-control rounded" type="text">
                        </div>
                    </div>
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">相册封面</label>
                        <div class="col-sm-10">
                            <input style="position: fixed; left: -500px;" id="filestyle-0" class="filestyle" data-icon="false" data-classbutton="btn btn-default" data-classinput="form-control inline v-middle input-s" type="file">
                            <div class="bootstrap-filestyle" style="display: inline;">
                                <input class="form-control inline v-middle input-s rounded" disabled="" type="text">
                                <label for="filestyle-0" class="btn btn-default rounded">
                                    <span>选择文件</span>
                                </label>
                                <span class="help-block m-b-none">若不想上传封面，可以在<a href="<?php echo $this->createUrl('album/index');?>" target="_blank">相册管理</a>设置封面。(注：图片会被切割成300&times;450)</span>
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
                            <div class="btn-group m-r">
                                <button data-toggle="dropdown" class="btn btn-sm btn-default dropdown-toggle">
                                    <input type="hidden"><span class="dropdown-label" id="chuanzhi1">公开</span>
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-select">
                                    <li class="active"><input name="d-s-r" checked="" type="radio"><a href="#">公开</a></li>
                                    <li><input name="d-s-r" type="radio"><a href="#">自己可见</a></li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-2">
                            <button type="submit" class="btn btn-primary rounded">确定添加</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </section>
</section>