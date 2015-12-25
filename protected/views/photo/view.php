<?php
/**
 * Created by PhpStorm.
 * User: qky
 * Date: 15-12-25
 * Time: 上午9:49
 */
$this->pageTitle = Yii::app() -> name . ' - 查看照片';
Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/src/default/css/lightbox.css');
?>
<section id="content">
    <section class="vbox">
        <section class="scrollable wrapper-lg">
            <div class="row">
                <div class="col-sm-8">
                    <div class="blog-post">
                        <div class="post-item">
                            <div class="post-media">
                                <img src="<?php echo 'uploads/photos/'.$model->picUrl; ?>" class="img-full">
                                <div style="display: block;height: 10%;" class="lb-nav">
                                    <a style="display: <?php echo !empty($prev) ? 'block' : 'none'; ?>;" class="lb-prev" href="<?php echo !empty($prev) ? $this->createUrl('photo/view', array('id' => $prev -> picid)):'javascript:void(0)'; ?>" title="点击查看上一张" target="_self"></a>
                                    <a style="display: <?php echo !empty($next) ? 'block' : 'none'; ?>;" class="lb-next" href="<?php echo !empty($next) ? $this->createUrl('photo/view', array('id' => $next -> picid)):'javascript:void(0)'; ?>" title="点击查看下一张" target="_self"></a>
                                </div>
                            </div>
                            <div class="comment-action" style="padding: 6px;">
                                <a href="#" title="喜欢" class="btn btn-default btn-xs lovePic" rel="<?php echo $model->picid; ?>">
                                    <i class="fa fa-heart text-danger"></i>
                                    <?php echo $model->love; ?>
                                </a>
                                <a href="" class="btn btn-default btn-xs"><i class="fa fa-comment text-muted"></i> 评论</a>
                                <a title="下载原图" class="btn btn-default btn-xs" href="<?php echo $this->createUrl('ajax/downloadPic',array('picid' => $model -> picid));?>">
                                    <i class="fa fa-cloud-download text-success"></i>
                                </a>
                                <small class="block text-muted pull-right"><i class="fa fa-clock-o"></i>&nbsp;<?php echo Common::tranTime($model->createtime); ?></small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="m-b-sm">
                        <div class="btn-group btn-group-justified">
                            <a href="<?php echo !empty($prev) ? $this->createUrl('photo/view', array('id' => $prev -> picid)):'javascript:void(0)'; ?>" class="btn btn-primary"><?php echo !empty($prev) ? '上一张' : '没有了'; ?></a>
                            <a href="<?php echo !empty($next) ? $this->createUrl('photo/view', array('id' => $next -> picid)):'javascript:void(0)'; ?>" class="btn btn-success"><?php echo !empty($next) ? '下一张' : '没有了'; ?></a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a href="#">
                                <span class="badge pull-right">
                                    <?php echo Yii::app()->user->isGuest ? count(Photo::model()->findAll("albumid= :albumid and picopen = :picopen",array(":albumid"=>$model->albumid,':picopen' => 1))) : count(Photo::model()->findAll("albumid=:albumid",array(":albumid"=>$model->albumid))); ?>
                                </span>
                                <?php echo $model->album->albumname; ?>
                            </a>
                        </li>
                    </ul>
                    <h5 class="font-bold">最受欢迎的照片</h5>
                    <div>
                        <article class="media">
                            <?php foreach($sideImg as $s => $img){?>
                            <a class="pull-left m-t-xs" style="width: 45%" href="<?php echo $this->createUrl('photo/view',array('id' => $img->picid)); ?>" target="_self">
                                <img src="<?php echo Yii::app()->createUrl('ajax/getThumb', array('path' => ROOT_PATH.'uploads/photos/'.$img->picUrl, 'w' => '160', 'h' => '160')) ?>">
                            </a>
                            <?php } ?>
                        </article>
                    </div>
                </div>
                <div class="col-sm-8">
                    <h4 class="m-t-lg m-b">1 条评论</h4>
                    <section class="comment-list block">
                        <article id="comment-id-2" class="comment-item">
                            <section class="comment-body m-b">
                                <header>
                                    <a href="#"><strong>John smith</strong></a>
                                    <label class="label bg-dark m-l-xs">Admin</label>
                          <span class="text-muted text-xs block m-t-xs">
                            26 minutes ago
                          </span>
                                </header>
                                <div class="m-t-sm">Lorem ipsum dolor sit amet, consecteter adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet.</div>
                            </section>
                        </article>
                    </section>
                    <?php $this->renderPartial('/comment/_form'); ?>
                </div>
            </div>
        </section>
    </section>
</section>
<script>
    $(function(){
        $(".lovePic").click(function(){
            var love = $(this);
            var id = love.attr("rel"); //对应id
            love.fadeOut(300); //渐隐效果
            $.ajax({
                type:"POST",
                url:"<?php echo $this->createUrl('ajax/love'); ?>",
                data:"id="+id,
                cache:false, //不缓存此页面
                success:function(data){
                    love.html(data);
                    love.fadeIn(300); //渐显效果
                }
            });
            return false;
        });
    });
</script>