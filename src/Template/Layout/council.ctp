<!doctype html>
<html class="fixed">
<head>

	<!-- Basic -->
	<meta charset="UTF-8">

	<title>abbl</title>
	<meta name="keywords" content="abbl" />
	<meta name="description" content="abbl">
	<meta name="author" content="http://abbl.com/">

	<?php echo $this->element('admin_styles') ?>

</head>
<body>
<section class="body">

	<?php echo $this->element('header') ?>

	<div class="inner-wrapper">

		<?php echo $this->element('councilnav') ?>

		<section role="main" class="content-body">

			<?php echo $this->fetch('content'); ?>


			<!-- end: page -->
		</section>
	</div>

</section>

<?php echo $this->element('admin_scripts') ?>

</body>
</html>