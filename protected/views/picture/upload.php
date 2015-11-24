<?php
$this->pageTitle=Yii::app()->name . ' - 上传照片 ';
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . "/src/default/js/jquery.js");
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . "/src/default/js/webuploader.js");
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . "/src/default/js/upload.js");
Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . "/src/default/css/style.css");
Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . "/src/default/css/webuploader.css");
?>
<section class="panel panel-default">
    <header class="panel-heading font-bold">
       上传照片
    </header>
    <div class="panel-body">
        <form class="form-horizontal" method="get">
            <div class="form-group">
                <label class="col-sm-2 control-label">上传到相册：</label>
                <div class="col-sm-10">
                    <select name="account" class="form-control m-b">
                        <option>option 1</option>
                        <option>option 2</option>
                        <option>option 3</option>
                        <option>option 4</option>
                    </select>
                </div>
            </div>
        </form>
        <div id="wrapper">
            <div id="container">
                <div id="uploader">
                    <div class="queueList">
                        <div id="dndArea" class="placeholder">
                            <div id="filePicker"></div>
                            <p>或将照片拖到这里，单次最多可选300张</p>
                        </div>
                    </div>
                    <div class="statusBar" style="display:none;">
                        <div class="progress">
                            <span class="text">0%</span>
                            <span class="percentage"></span>
                        </div><div class="info"></div>
                    </div>
                    <div class="statusBar" style="display:none;">
                        <div class="btns">
                            <div id="filePicker2"></div><div class="uploadBtn">开始上传</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>