<!DOCTYPE html>
<html>
	<?php include_once "2_view/layout/head.php"; ?>
	<body>
		<?php include_once "2_view/layout/header.php"; ?>
		<?php include_once "2_view/layout/menu.php"; ?>
		<div class="main" align="center">
			<p align="center"> Home </p>
			<?php include_once "3_controller/register.control.php"; ?>
			<?php echo "Next step - sidebar with previews and image select + delete images";//include_once "3_controller/gallery.control.php"; ?>
		</div>
		<?php include_once "2_view/layout/footer.php"; ?>
	</body>
</html>
