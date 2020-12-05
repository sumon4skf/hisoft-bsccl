<!DOCTYPE html>
<html>
<head>

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>HiSoft Ltd.</title>

    <meta name="keywords" content="hisoft" />
    <meta name="description" content="HiSoft Site">
    <meta name="author" content="hisoftcloud.com">

    <!-- Favicon -->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="img/apple-touch-icon.png">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- Web Fonts  -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700%7CSintony:400,700" rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <?php
    echo $this->Html->css('/vendor/bootstrap/css/bootstrap.min.css');
    echo $this->Html->css('/vendor/font-awesome/css/font-awesome.min.css');
    echo $this->Html->css('/vendor/animate/animate.min.css');
    echo $this->Html->css('/vendor/simple-line-icons/css/simple-line-icons.min.css');
    echo $this->Html->css('/vendor/owl.carousel/assets/owl.carousel.min.css');
    echo $this->Html->css('/vendor/owl.carousel/assets/owl.theme.default.min.css');
    echo $this->Html->css('/vendor/magnific-popup/magnific-popup.min.css');
    ?>


    <!-- Theme CSS -->
    <?php
    echo $this->Html->css('theme.css');
    echo $this->Html->css('theme-elements.css');
    echo $this->Html->css('theme-blog.css');
    echo $this->Html->css('theme-shop.css');
    ?>

    <!-- Current Page CSS -->
    <?php
    //    echo $this->Html->css('/vendor/rs-plugin/css/settings.css');
    //    echo $this->Html->css('/vendor/rs-plugin/css/layers.css');
    //    echo $this->Html->css('/vendor/rs-plugin/css/navigation.css');
    ?>

    <!-- Skin CSS -->
    <?php
    echo $this->Html->css('skins/skin-church.css');
    ?>


    <!-- Demo CSS -->
    <?php
    echo $this->Html->css('demos/demo-church.css');
    ?>

    <!-- Theme Custom CSS -->
    <?php
    echo $this->Html->css('custom.css');
    ?>

    <!-- Head Libs -->
    <?php
    echo $this->Html->script([
        '/vendor/modernizr/modernizr.min.js'
    ]);
    ?>

</head>
<body>

<div class="body">
    <?php echo $this->element('front/site_header');?>
    <div role="main" class="main">

        <?php echo $this->fetch('content') ?>

        <?php echo $this->element('front/site_footer');?>
    </div>

    <!-- Vendor -->
    <?php
    echo $this->Html->script([
        '/vendor/jquery/jquery.min.js',
        '/vendor/jquery.appear/jquery.appear.min.js',
        '/vendor/jquery.easing/jquery.easing.min.js',
        '/vendor/jquery-cookie/jquery-cookie.min.js',
        '/vendor/bootstrap/js/bootstrap.min.js',
        '/vendor/common/common.min.js',
        '/vendor/jquery.validation/jquery.validation.min.js',
        '/vendor/jquery.easy-pie-chart/jquery.easy-pie-chart.min.js',
        '/vendor/jquery.gmap/jquery.gmap.min.js',
        '/vendor/jquery.lazyload/jquery.lazyload.min.js',
        '/vendor/isotope/jquery.isotope.min.js',
        '/vendor/owl.carousel/owl.carousel.min.js',
        '/vendor/magnific-popup/jquery.magnific-popup.min.js',
        '/vendor/vide/vide.min.js',
        '/vendor/jquery.countdown/jquery.countdown.min.js',
    ]);
    ?>

    <!-- Theme Base, Components and Settings -->
<!--    <script src="js/theme.js"></script>-->
<!---->
<!---->
<!--    <!-- Demo -->-->
<!--    <script src="js/demos/demo-church.js"></script>-->
<!---->
<!--    <script src="js/demos/demo-photography.js"></script>-->
<!---->
<!--    <!-- Theme Custom -->-->
<!--    <script src="js/custom.js"></script>-->
<!---->
<!--    <!-- Theme Initialization Files -->-->
<!--    <script src="js/theme.init.js"></script>-->

</body>
</html>