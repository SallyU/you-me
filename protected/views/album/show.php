<?php
/**
 * Created by PhpStorm.
 * User: QKY
 * Date: 15-12-29
 * Time: 下午2:17
 */
?>
<?php
$this->pageTitle = Yii::app()->name .' - '.$album -> albumname;
Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/src/default/css/lightbox.css');
?>
<script src="<?php echo Yii::app()->baseUrl . '/src/default/js/lightbox-plus-jquery.min.js';?>"></script>
<style>
    .pos-rlt a:hover, a:focus {
        text-decoration: none;
        color: transparent;
    }
    .lovePic{filter:alpha(opacity=60); opacity: 0.60;}
    .lovePic:hover{filter:alpha(opacity=95); opacity: 0.95;}
</style>
<section id="content">
    <section class="hbox stretch">
        <section>
            <section class="vbox">
                <section class="scrollable padder-lg" id="bjax-target">
                    <?php if(!Yii::app()->user->isGuest){?>
                        <a href="<?php echo $this->createUrl('photo/upload'); ?>" class="pull-right text-muted m-t-lg">
                            <i class="fa fa-plus"></i>&nbsp;
                            上传照片
                        </a>
                    <?php } ?>
                    <h2 class="font-thin m-b">
                        <?php echo $album -> albumname; ?>
                    </h2>
                    <?php $this->renderPartial('/photo/_list',array(
                        'model' => $model,
                        'pages' => $pages,
                    )) ?>
                </section>
            </section>
        </section>
    </section>
</section>