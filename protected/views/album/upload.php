<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . "/src/default/js/fileinput.js");
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . "/src/default/js/fileinput_locale_zh.js");
Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . "/src/default/css/fileinput.css");

?>
<div class="form-group">
                    <span class="file-input file-input-ajax-new"><div class="file-preview">
                            <div class="close fileinput-remove">×</div>
                            <div class="file-drop-zone"><div class="file-drop-zone-title">拖拽文件到这里 …</div>
                                <div class="file-preview-thumbnails"></div>
                                <div class="clearfix"></div>    <div class="file-preview-status text-center text-success"></div>
                                <div style="display: none;" class="kv-fileinput-error file-error-message"></div>
                            </div>
                        </div>
<div class="kv-upload-progress hide"><div class="progress">
        <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%;">
            0%
        </div>
    </div></div>
<div class="input-group ">
    <div tabindex="-1" class="form-control file-caption  kv-fileinput-caption">
        <span title="BingWallpaper-2015-11-11.jpg" class="file-caption-ellipsis">…</span>
        <div title="" class="file-caption-name"></div>
    </div>
    <div class="input-group-btn">
        <button type="button" title="清除选中文件" class="btn btn-default fileinput-remove fileinput-remove-button"><i class="glyphicon glyphicon-trash"></i> 移除</button>
        <button type="button" title="取消进行中的上传" class="hide btn btn-default fileinput-cancel fileinput-cancel-button"><i class="glyphicon glyphicon-ban-circle"></i> 取消</button>
        <a href="#" title="上传选中文件" class="btn btn-default kv-fileinput-upload fileinput-upload-button"><i class="glyphicon glyphicon-upload"></i> 上传</a>
        <div class="btn btn-primary btn-file"> <i class="glyphicon glyphicon-folder-open"></i> &nbsp;选择 … <input id="file-1" multiple="" class="file" data-overwrite-initial="false" data-min-file-count="2" type="file"></div>
    </div>
</div></span>
</div>
<script>
    $("#file-0").fileinput({
        'allowedFileExtensions' : ['jpg', 'png','gif'],
    });
    $("#file-1").fileinput({
        uploadUrl: '#', // you must set a valid URL here else you will get an error
        allowedFileExtensions : ['jpg', 'png','gif'],
        overwriteInitial: false,
        maxFileSize: 1000,
        maxFilesNum: 10,
        //allowedFileTypes: ['image', 'video', 'flash'],
        slugCallback: function(filename) {
            return filename.replace('(', '_').replace(']', '_');
        }
    });
    /*
     $(".file").on('fileselect', function(event, n, l) {
     alert('File Selected. Name: ' + l + ', Num: ' + n);
     });
     */
    $("#file-3").fileinput({
        showUpload: false,
        showCaption: false,
        browseClass: "btn btn-primary btn-lg",
        fileType: "any",
        previewFileIcon: "<i class='glyphicon glyphicon-king'></i>"
    });
    $("#file-4").fileinput({
        uploadExtraData: {kvId: '10'}
    });
    $(".btn-warning").on('click', function() {
        if ($('#file-4').attr('disabled')) {
            $('#file-4').fileinput('enable');
        } else {
            $('#file-4').fileinput('disable');
        }
    });
    $(".btn-info").on('click', function() {
        $('#file-4').fileinput('refresh', {previewClass:'bg-info'});
    });
    /*
     $('#file-4').on('fileselectnone', function() {
     alert('Huh! You selected no files.');
     });
     $('#file-4').on('filebrowse', function() {
     alert('File browse clicked for #file-4');
     });
     */
    $(document).ready(function() {
        $("#test-upload").fileinput({
            'showPreview' : false,
            'allowedFileExtensions' : ['jpg', 'png','gif'],
            'elErrorContainer': '#errorBlock'
        });
        /*
         $("#test-upload").on('fileloaded', function(event, file, previewId, index) {
         alert('i = ' + index + ', id = ' + previewId + ', file = ' + file.name);
         });
         */
    });
</script>