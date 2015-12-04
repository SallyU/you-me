<?php $this->pageTitle = Yii::app()->name . ' - 照片管理'; ?>
<section id="content">
    <section class="vbox">
        <section class="scrollable padder">
            <div class="m-b-md">
                <h3 class="m-b-none"><a href="<?php echo $this -> createUrl('photo/manage'); ?>">照片管理</a>
                    <a href="<?php echo $this->createUrl('photo/upload'); ?>" class="pull-right text-muted" style="font-size: 14px;">
                        <i class="fa fa-plus"></i>&nbsp;
                        上传照片
                    </a>
                </h3>
            </div>
            <section class="panel panel-default">
                <div class="row wrapper">
                    <div class="col-sm-4 m-b-xs">
                        <select class="input-sm form-control input-s-sm inline v-middle multi-select-2">
                            <option value="0">添加标题</option>
                            <option value="1">添加描述</option>
                            <option value="2">公开照片</option>
                            <option value="3">保密照片</option>
                            <option value="4">删除选中</option>
                        </select>
                        <button class="btn btn-sm btn-default">执行</button>
                    </div>
                    <div class="col-sm-5 m-b-xs">
                        <div class="btn-group">
                            <label class="btn btn-sm btn-default">
                                <a href="<?php echo $this->createUrl('photo/open'); ?>">公开所有照片</a>
                            </label>
                            <label class="btn btn-sm btn-default">
                                <a href="<?php echo $this->createUrl('photo/lock'); ?>">保密所有照片</a>
                            </label>
                        </div>
                        <?php if(Yii::app()->user->hasFlash('open'))
                            echo Yii::app()->user->getFlash('open'); ?>
                        <?php if(Yii::app()->user->hasFlash('lock'))
                            echo Yii::app()->user->getFlash('lock'); ?>
                    </div>
                    <!--<div class="pull-right col-sm-3">
                        <div class="input-group">
                            <input class="input-sm form-control" placeholder="search" type="text">
                      <span class="input-group-btn">
                        <button class="btn btn-sm btn-default" type="button">go!</button>
                      </span>
                        </div>
                    </div>-->
                </div>
                <div class="table-responsive">
                    <table class="table table-striped b-t b-light">
                        <thead>
                        <tr>
                            <th style="width:20px;text-align:center;vertical-align: inherit;"><label class="checkbox m-n i-checks">
                                    <input type="checkbox"><i></i></label>
                            </th>
                            <th style="width:70px;text-align:center;vertical-align: inherit;">设置</th>
                            <th style="width:52px;text-align:center;vertical-align: inherit;">缩略图</th>
                            <th style=" text-align:center;vertical-align: inherit;">照片标题</th>
                            <th class="th-sortable" style=" text-align:center;vertical-align: inherit;">
                                照片描述
                            </th>
                            <th style=" text-align:center;vertical-align: inherit;">上传时间</th>
                            <th style=" text-align:center;vertical-align: inherit;">操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(isset($model) && !empty($model)){
                        foreach($model as $v => $_v){?>
                        <tr>
                            <td>
                                <label class="checkbox m-n i-checks">
                                    <input name="post[]" type="checkbox"><i></i>
                                </label>
                            </td>
                            <td style=" text-align:center;vertical-align: inherit;">
                                <?php if($_v->picopen ==1){ ?>
                                <a title="改为保密" href="#"><i class="icon-lock-open text-success"></i></a>
                                <?php } else if($_v->picopen ==0){?>
                                <a title="改为公开" href="<?php echo $this->createUrl('ajax/open',array('picid' => $_v->picid)); ?>"><i class="icon-lock text-danger"></i></a>
                                <?php } else{
                                    echo '你大爷的';
                                } ?>
                            </td>
                            <td style="width:52px;text-align:center;vertical-align: inherit;">
                                <a class="pull-left thumb thumb-wrapper m-t-xs">
                                    <img src="<?php echo Yii::app()->createUrl('ajax/getThumb', array('path' => ROOT_PATH.'uploads/photos/'.$_v->picUrl, 'w' => '100', 'h' => '100')) ?>"">
                                </a>
                            </td>
                            <td style=" text-align:center;vertical-align: inherit;">
                                <?php echo (!empty($_v->pictitle) ? $_v->pictitle : ('暂无标题')) ;?>
                            </td>
                            <td style=" text-align:center;vertical-align: inherit;">
                                <?php echo (!empty($_v->picdesc) ? $_v->picdesc : ('暂无描述')) ;?>
                            </td>
                            <td style=" text-align:center;vertical-align: inherit;">
                                <?php echo Common::tranTime($_v->createtime); ?>
                            </td>
                            <td style=" text-align:center;vertical-align: inherit;">
                                <a href="#" title="修改">
                                    <i class="icon-pencil text-success"></i>
                                </a>&nbsp;&nbsp;
                                <a href="#" title="删除">
                                    <i class="fa fa-times text-danger"></i>
                                </a>
                            </td>
                        </tr>
                        <?php }} else{?>
                        <tr>
                            暂无数据！
                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
                <footer class="panel-footer">
                    <div class="row">
                        <div class="col-sm-4 hidden-xs">
                            <select class="input-sm form-control input-s-sm inline v-middle multi-select-2">
                                <option value="0">添加标题</option>
                                <option value="1">添加描述</option>
                                <option value="2">公开照片</option>
                                <option value="3">保密照片</option>
                                <option value="4">删除选中</option>
                            </select>
                            <button class="btn btn-sm btn-default">执行</button>
                        </div>
                        <div class="text-right text-center-xs">
                            <?php echo $pageList; ?>
                        </div>
                    </div>
                </footer>
            </section>
        </section>
    </section>
    <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen,open" data-target="#nav,html"></a>
</section>
<script>
    $(".multi-select-2").select2({
        minimumResultsForSearch: Infinity
    });
</script>