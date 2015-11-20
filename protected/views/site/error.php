<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle=Yii::app()->name . ' - 错误';
$this->breadcrumbs=array(
	'Error',
);
?>


<section class="scrollable wrapper">
    <div class="row">
        <div class="col-lg-6">

            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <i class="fa fa-ban-circle"></i><strong>ERROR: <?php echo $code; ?></strong>
                <?php echo CHtml::encode($message); ?>
            </div>
        </div>
    </div>
</section>

