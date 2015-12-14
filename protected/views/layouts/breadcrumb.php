<!--导航面包屑-->
<div class="col-lg-12">
    <ul class="breadcrumb">
        <li><a href="<?php echo Yii::app()->homeUrl; ?>"><i class="fa fa-home"></i> 首页</a></li>
        <?php foreach((array)$breadcrumb as $br):?>
            <?php if($br && is_array($br)):?>
                <li class="active">
                    <a href="<?php echo $br['url'];?>"><?php echo $br['name'];?></a>
                </li>
            <?php endif;?>
        <?php endforeach;?>
    </ul>
</div>