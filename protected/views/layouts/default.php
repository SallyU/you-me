<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
    <meta charset="utf-8">
    <meta name = "format-detection" content = "telephone=no" />
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

    </script>
    <!--[if lt IE 8]>
    <div style=' clear: both; text-align:center; position: relative;'>
        <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
            <img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
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
                        <a href="index.html">
                            Photo.Folio
                        </a>
                    </h1>
                    <div class="navigation ">
                        <nav>
                            <ul class="sf-menu">
                                <li class="current"><a href="index.html">Home</a></li>
                                <li><a href="about.html">About</a></li>
                                <li><a href="gallery.html">Gallery</a></li>
                                <li><a href="blog.html">Blog</a></li>
                                <li><a href="contacts.html">Contacts</a></li>
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
                <h2>Contacts</h2>
                <div class="footer_phone">+1 800 559 6580</div>
                <a href="#" class="footer_mail">info@demolink.org</a>
            </div>
        </div>

    </div>
</footer>
<a href="#" id="toTop" class="fa fa-chevron-up"></a>
</body>
</html>
