<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <meta charset="utf-8">
    <meta name = "format-detection" content = "telephone=no" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo IMG_URL;?>favicon.ico">
    <link rel="shortcut icon" href="<?php echo IMG_URL;?>favicon.ico" />
    <link rel="stylesheet" href="<?php echo CSS_URL;?>style.css">
    <script src="<?php echo JS_URL;?>jquery.js"></script>
    <script src="<?php echo JS_URL;?>jquery-migrate-1.1.1.js"></script>
    <script src="<?php echo JS_URL;?>jquery.easing.1.3.js"></script>
    <script src="<?php echo JS_URL;?>script.js"></script>
    <script src="<?php echo JS_URL;?>superfish.js"></script>
    <script src="<?php echo JS_URL;?>jquery.equalheights.js"></script>
    <script src="<?php echo JS_URL;?>jquery.mobilemenu.js"></script>
    <script src="<?php echo JS_URL;?>tmStickUp.js"></script>
    <script src="<?php echo JS_URL;?>jquery.ui.totop.js"></script>
    <script src="<?php echo JS_URL;?>jquery.shuffle-images.js"></script>
    <link rel="stylesheet" href="<?php echo CSS_URL;?>touchTouch.css">
    <script src="<?php echo JS_URL;?>touchTouch.jquery.js"></script>
    <script>
        $(window).load(function(){
            $().UItoTop({ easingType: 'easeOutQuart' });
            $('#stuck_container').tmStickUp({});
        });

        $(document).ready(function(){
            $(".shuffle-me").shuffleImages({
                target: ".images > img"
            });
        });

        $(function(){
            $('.sf-menu li').click(function(){
                $(this).addClass('current').siblings().removeClass('current');
            })
        })
    </script>
    <script>
        $(window).load(function(){
            $().UItoTop({ easingType: 'easeOutQuart' });
            $('#stuck_container').tmStickUp({});
            $('.gallery .gall_item').touchTouch();
        });

    </script>
    <!--[if lt IE 8]>
    <div style=' clear: both; text-align:center; position: relative;'>
        <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
            <img src="<?php echo IMG_URL;?>ie6.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
        </a>
    </div>
    <![endif]-->
    <!--[if lt IE 9]>
    <script src="<?php echo JS_URL;?>html5shiv.js"></script>
    <link rel="stylesheet" media="screen" href="<?php echo CSS_URL;?>ie.css">
    <![endif]-->
</head>

<body class="page1" id="top">
<!--==============================
              header
=================================-->
<header>

    <section id="stuck_container">
        <!--==============================
                    Stuck menu
        =================================-->
        <div class="container">
            <div class="row">
                <div class="grid_12 ">
                    <h1 class="logo">
                        <a href="<?php echo $this->createUrl('index'); ?>">
                            <?php echo CHtml::encode(Yii::app()->name); ?>
                        </a>
                    </h1>
                    <div class="navigation ">
                        <nav>
                            <ul class="sf-menu">
<!--                                <li class="current"><a href="--><?php //echo $this->createUrl('index/index'); ?><!--">首页</a></li>-->
                                <li><a href="<?php echo $this->createUrl('index/index'); ?>">首页</a></li>
<!--                                <li><a href="">关于我</a></li>-->
                                <li><a href="<?php echo $this->createUrl('album/index'); ?>">画廊</a></li>
                                <li><a href="<?php echo $this->createUrl('blog/index'); ?>">心语</a></li>
<!--                                <li><a href="">联系我</a></li>-->
                            </ul>
                        </nav>
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
    </section>
</header>


<?php echo $content; ?>


<!--==============================
              footer
=================================-->
<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="grid_12">
                <h2>联系方式</h2>
                <div class="footer_phone">+86 1875832****</div>
                <a href="mailto:demo@demo.com" class="footer_mail">demo@demo.com</a>
            </div>
        </div>

    </div>
</footer>
<a href="#" id="toTop" class="fa fa-chevron-up"></a>
</body>
</html>
