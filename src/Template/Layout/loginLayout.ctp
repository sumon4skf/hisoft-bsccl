<?php
use Cake\Core\Configure;
?>
<!doctype html>
<html class="fixed">
<head>

    <!-- Basic -->
    <meta charset="UTF-8">

    <meta name="keywords" content="<?php echo Configure::read('companyName'); ?>" />
    <meta name="description" content="<?php echo Configure::read('companyName'); ?>">
    <meta name="author" content="Omar Faruk">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <!-- Web Fonts  -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <!-- Vendor CSS -->
    <?php
        echo $this->Html->css('/assets/vendor/bootstrap/css/bootstrap.css');
        echo $this->Html->css('/assets/vendor/font-awesome/css/font-awesome.css');
        echo $this->Html->css('/assets/vendor/magnific-popup/magnific-popup.css');
        echo $this->Html->css('/assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css');
        echo $this->Html->css('/assets/stylesheets/theme.css');
        echo $this->Html->css('/assets/stylesheets/skins/default.css');
        echo $this->Html->css('/assets/stylesheets/theme-custom.css');
    ?>

    <?php
        echo $this->Html->script([
            '/assets/vendor/modernizr/modernizr.js'
        ]);
    ?>

</head>
<body>

<?php
       echo $this->fetch('content');
?>

<!-- Vendor -->
<script src="assets/vendor/jquery/jquery.js"></script>
<script src="assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.js"></script>
<script src="assets/vendor/nanoscroller/nanoscroller.js"></script>
<script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="assets/vendor/magnific-popup/jquery.magnific-popup.js"></script>
<script src="assets/vendor/jquery-placeholder/jquery-placeholder.js"></script>

<!-- Theme Base, Components and Settings -->
<script src="assets/javascripts/theme.js"></script>

<!-- Theme Custom -->
<script src="assets/javascripts/theme.custom.js"></script>

<!-- Theme Initialization Files -->
<script src="assets/javascripts/theme.init.js"></script>

</body>
</html>