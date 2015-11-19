<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle=Yii::app()->name . ' - 错误';
$this->breadcrumbs=array(
	'Error',
);
?>

<div class="row m-n">
	<div class="col-sm-4 col-sm-offset-4">
		<div class="text-center m-b-lg">
			<h2>Error <?php echo $code; ?></h2>
			<h2><?php echo CHtml::encode($message); ?></h2>
		</div>
		<div class="list-group auto m-b-sm m-b-lg">
			<a href="<?php echo Yii::app()->homeUrl;  ?>" class="list-group-item">
				<i class="fa fa-chevron-right icon-muted"></i>
				<i class="fa fa-fw fa-home icon-muted"></i>&nbsp;返回首页
			</a>
			<!--<a href="#" class="list-group-item">
				<i class="fa fa-chevron-right icon-muted"></i>
				<i class="fa fa-fw fa-question icon-muted"></i> Send us a tip
			</a>
			<a href="#" class="list-group-item">
				<i class="fa fa-chevron-right icon-muted"></i>
				<span class="badge bg-info lt">021-215-584</span>
				<i class="fa fa-fw fa-phone icon-muted"></i> Call us
			</a>-->
		</div>
	</div>
</div>