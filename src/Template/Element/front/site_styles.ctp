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
echo $this->Html->css('/vendor/rs-plugin/css/settings.css');
echo $this->Html->css('/vendor/rs-plugin/css/layers.css');
echo $this->Html->css('/vendor/rs-plugin/css/navigation.css');
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

<?php
echo $this->Html->css('chat.css');
?>

<!-- Head Libs -->
<?php
echo $this->Html->script([
'/vendor/modernizr/modernizr.min.js'
]);
?>