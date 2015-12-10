<!DOCTYPE html>
<html lang="en" class="app">


<head>
    <meta charset="utf-8" />
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/src/default/css/jplayer.flat.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/src/default/css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/src/default/css/animate.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/src/default/css/font-awesome.min.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/src/default/css/simple-line-icons.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/src/default/css/font.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/src/default/css/app.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/src/default/css/select2.min.css" type="text/css" />
    <style>.errorMessage, .errorSummary{ color: #ff0000;}</style>

    <script src="<?php echo Yii::app()->request->baseUrl; ?>/src/default/js/jquery.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/src/default/js/bootstrap.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/src/default/js/app.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/src/default/js/jquery.slimscroll.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/src/default/js/tiles.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/src/default/js/index.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/src/default/js/app.plugin.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/src/default/js/select2.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/src/default/js/masonry.pkgd.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/src/default/js/imagesloaded.pkgd.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/src/default/js/jquery.jeditable.min.js"></script>

</head>
<body class="">
<!--删除提示框-->
<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                请确认
            </div>
            <div class="modal-body">
                确认不要它了么o(╯□╰)o？
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">还没想好</button>
                <a class="btn btn-danger btn-ok">嗯，再贱</a>
            </div>
        </div>
    </div>
</div>
<script>
    //全局删除JS
    $('#confirm-delete').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    });
</script>
<!--删除提示框结束-->
<section class="vbox">
    <header class="bg-white-only header header-md navbar navbar-fixed-top-xs">
        <div class="navbar-header aside bg-success nav-xs">
            <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen,open" data-target="#nav,html">
                <i class="icon-list"></i>
            </a>
            <a href="<?php echo Yii::app()->homeUrl; ?>" class="navbar-brand text-lt">
                <i class="icon-camera"></i>
                <span class="hidden-nav-xs m-l-sm">丶以晴</span>
            </a>
            <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".user">
                <i class="icon-settings"></i>
            </a>
        </div>      <ul class="nav navbar-nav hidden-xs">
            <li>
                <a href="#nav,.navbar-header" data-toggle="class:nav-xs,nav-xs" class="text-muted">
                    <i class="fa fa-indent text"></i>
                    <i class="fa fa-dedent text-active"></i>
                </a>
            </li>
        </ul>
        <form class="navbar-form navbar-left input-s-lg m-t m-l-n-xs hidden-xs" role="search">
            <div class="form-group">
                <div class="input-group">
            <span class="input-group-btn">
              <button type="submit" class="btn btn-sm bg-white btn-icon rounded"><i class="fa fa-search"></i></button>
            </span>
                    <input type="text" class="form-control input-sm no-border rounded" placeholder="找不到？以晴一下吧...">
                </div>
            </div>
        </form>
        <?php if(!Yii::app()->user->getIsguest()){?>
        <div class="navbar-right ">
            <ul class="nav navbar-nav m-n hidden-xs nav-user user">
                <li class="hidden-xs">
                    <a href="#" class="dropdown-toggle lt" data-toggle="dropdown">
                        <i class="icon-bell"></i>
                        <span class="badge badge-sm up bg-danger count">2</span>
                    </a>
                    <section class="dropdown-menu aside-xl animated fadeInUp">
                        <section class="panel bg-white">
                            <div class="panel-heading b-light bg-light">
                                <strong>你有 <span class="count">2</span> 条消息</strong>
                            </div>
                            <div class="list-group list-group-alt">
                                <a href="#" class="media list-group-item">
                    <span class="pull-left thumb-sm">
                      <img src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/avatars/noAvatar.png" alt="..." class="img-circle">
                    </span>
                    <span class="media-body block m-b-none">
                      Use awesome animate.css<br>
                      <small class="text-muted">10 minutes ago</small>
                    </span>
                                </a>
                                <a href="#" class="media list-group-item">
                    <span class="media-body block m-b-none">
                      1.0 initial released<br>
                      <small class="text-muted">1 hour ago</small>
                    </span>
                                </a>
                            </div>
                            <div class="panel-footer text-sm">
                                <a href="#" class="pull-right"><i class="fa fa-cog"></i></a>
                                <a href="#notes" data-toggle="class:show animated fadeInRight">See all the notifications</a>
                            </div>
                        </section>
                    </section>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle bg clear" data-toggle="dropdown">
                        <span class="thumb-sm avatar pull-right m-t-n-sm m-b-n-sm m-l-sm">
                <img src="<?php echo Yii::app()->baseUrl.'/uploads/avatars/' ?>noAvatar.png" alt="">
              </span><?php echo Yii::app()->user->name; ?> <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight">
                        <li>
                            <span class="arrow top"></span>
                            <a href="<?php echo $this->createUrl('setting/index'); ?>">修改密码</a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="badge bg-danger pull-right">3</span>
                                通知
                            </a>
                        </li>
                        <li>
                            <a href="">其他</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo Yii::app()->createUrl('index/logout'); ?>">退出&nbsp;<i class="icon-logout"></i></a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <?php } else{ ?>
        <div class="navbar-right ">
            <ul class="nav navbar-nav m-n hidden-xs nav-user user">
                <li class="dropdown">
                    <a href="<?php echo Yii::app()->createUrl('index/login'); ?>" class="dropdown-toggle bg clear" title="网站主人登录">
                        登 录&nbsp;<i class="icon-login"></i>
                    </a>
                </li>
            </ul>
        </div>
        <?php } ?>
    </header>
    <section>
        <section class="hbox stretch">
            <aside class="bg-black dk nav-xs aside hidden-print" id="nav">
                <section class="vbox">
                    <section class="w-f-md scrollable">
                        <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="10px" data-railOpacity="0.2">
                            <nav class="nav-primary hidden-xs">
                                <ul class="nav clearfix">
                                    <li>
                                        <a href="<?php echo Yii::app()->homeUrl; ?>">
                                            <i class="icon-home icon text-success"></i>
                                            <span>首 页</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo $this->createUrl('photo/index'); ?>">
                                            <i class="fa fa-picture-o icon text-warning-dker"></i>
                                            <b class="badge bg-primary pull-right" style="background-color: #F4CA06;color: slategrey">
                                                <?php if(Yii::app()->user->isGuest){
                                                    echo count(Photo::model()->findAll("picopen = :picopen",array(':picopen'=>1)));
                                                }else{
                                                    echo count(Photo::model()->findAll());
                                                } ?>
                                            </b>
                                            <span>照 片</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo $this->createUrl('album/index'); ?>">
                                            <i class="icon-folder-alt  text-primary-lter"></i>
                                            <b class="badge bg-primary pull-right">
                                                <?php if(Yii::app()->user->isGuest){
                                                    echo count(Album::model()->findAll("albumopen = :albumopen",array(':albumopen'=>1)));
                                                }else{
                                                    echo count(Album::model()->findAll());
                                                } ?>
                                            </b>
                                            <span>相 册</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo $this->createUrl('blog/index'); ?>">
                                            <i class="icon-notebook icon  text-info-dker"></i>
                                            <b class="badge bg-info pull-right">3</b>
                                            <span>日 志</span>
                                        </a>
                                    </li>
                                    <!--<li>
                                        <a href="">
                                            <i class="icon-heart icon  text-danger-dk"></i>
                                            <span>心 情</span>
                                        </a>
                                    </li>-->
                                    <li>
                                        <a href="<?php echo $this->createUrl('timeline/index'); ?>">
                                            <i class="icon-clock icon  text-info-lt"></i>
                                            <span>时光轴</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="icon-music-tone icon text-success-lter"></i>
                                            <b class="badge bg-success dker pull-right">9</b>
                                            <span>找自己</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <i class="icon-note icon text-danger-lter"></i>
                                            <span >留 言</span>
                                        </a>
                                    </li>
                                    <li class="m-b hidden-nav-xs"></li>
                                </ul>
                                <?php if(!(Yii::app()->user->getIsGuest())){ ?>
                                <ul class="nav" data-ride="collapse">
                                    <li class="hidden-nav-xs padder m-t m-b-sm text-xs text-muted">
                                        <span class="pull-right"><i class="icon-settings i-lg"></i></span>
                                        后台功能
                                    </li>
                                    <li >
                                        <a href="#" class="auto">
                                            <span class="pull-right text-muted">
                                                <i class="fa fa-angle-left text"></i>
                                                <i class="fa fa-angle-down text-active"></i>
                                            </span>
                                            <i class="icon-grid icon"></i>
                                            <span>管 理</span>
                                        </a>
                                        <ul class="nav dk text-sm">
                                            <li >
                                                <a href="<?php echo $this->createUrl('albumcate/add'); ?>">
                                                    <i class="fa fa-angle-right text-xs"></i>

                                                    <span>相册类别</span>
                                                </a>
                                            </li>
                                            <li >
                                                <a href="<?php echo $this->createUrl('album/index'); ?>">
                                                    <i class="fa fa-angle-right text-xs"></i>

                                                    <span>相册</span>
                                                </a>
                                            </li>
                                            <li >
                                                <a href="<?php echo $this->createUrl('photo/manage'); ?>">
                                                    <i class="fa fa-angle-right text-xs"></i>

                                                    <span>照片</span>
                                                </a>
                                            </li>
                                            <li >
                                                <a href="" class="auto">
                                                    <i class="fa fa-angle-right text-xs"></i>

                                                    <span>心情</span>
                                                </a>
                                            </li>
                                            <li >
                                                <a href="" class="auto">
                                                    <i class="fa fa-angle-right text-xs"></i>

                                                    <span>日志</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li >
                                        <a href="#" class="auto">
                        <span class="pull-right text-muted">
                          <i class="fa fa-angle-left text"></i>
                          <i class="fa fa-angle-down text-active"></i>
                        </span>
                                            <i class="icon-cloud-upload icon"></i>
                                            <span>发 布</span>
                                        </a>
                                        <ul class="nav dk text-sm">
                                            <li >
                                                <a href="<?php echo $this->createUrl('photo/upload'); ?>" class="auto">
                                                    <i class="fa fa-angle-right text-xs"></i>

                                                    <span>照 片</span>
                                                </a>
                                            </li>
                                            <li >
                                                <a href="" class="auto">
                                                    <i class="fa fa-angle-right text-xs"></i>

                                                    <span>2</span>
                                                </a>
                                            </li>
                                            <li >
                                                <a href="" class="auto">
                                                    <i class="fa fa-angle-right text-xs"></i>

                                                    <span>3</span>
                                                </a>
                                            </li>
                                            <li >
                                                <a href="" class="auto">
                                                    <i class="fa fa-angle-right text-xs"></i>

                                                    <span>4</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <?php } ?>
                            </nav>

                        </div>
                    </section>
                    <footer class="footer hidden-xs no-padder text-center-nav-xs">
                        <div class="bg hidden-xs ">
                            <div class="dropdown dropup wrapper-sm clearfix">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <span class="thumb-sm avatar pull-left m-l-xs">
                        <img src="<?php echo Yii::app()->baseUrl.'/uploads/avatars/' ?>noAvatar.png" class="dker" alt="">
                      </span>
                      <span class="hidden-nav-xs clear">
                        <span class="block m-l">
                          <strong class="font-bold text-lt">John.Smith</strong>
                          <b class="caret"></b>
                        </span>
                        <span class="text-muted text-xs block m-l">Art Director</span>
                      </span>
                                </a>
                                <ul class="dropdown-menu animated fadeInRight aside text-left">
                                    <li>
                                        <span class="arrow bottom hidden-nav-xs"></span>
                                        <a href="#">Settings</a>
                                    </li>
                                    <li>
                                        <a href="profile.html">Profile</a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="badge bg-danger pull-right">3</span>
                                            Notifications
                                        </a>
                                    </li>
                                    <li>
                                        <a href="docs.html">Help</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="modal.lockme.html" data-toggle="ajaxModal">Logout</a>
                                    </li>
                                </ul>
                            </div>
                        </div>            </footer>

                </section>
            </aside>

            <?php echo $content; ?>

        </section>
    </section>
</section>
</body>


</html>