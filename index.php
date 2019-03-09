<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<?php include_once "2_view/layout/head.php"; ?>
	<body>
		<?php include_once "2_view/layout/header.php"; ?>
		<?php // include_once "2_view/layout/menu.php"; ?>
		<div class="main" align="center">
			<p align="center"> Home </p>
			<?php include_once "3_controller/register.control.php"; ?><br/>
			<?php echo "Selected image on separate page"?><br/>
            <?php echo "List of superposable images on a sidebar"?><br/>
            <?php echo "Image overlap"?><br/>
            <?php echo "Render image"?><br/>
			 <?php echo "Save new image as post"?><br/>
            <?php echo "Delete posted image";//include_once "3_controller/gallery.control.php"; ?>
            <?php include_once "3_controller/all_posts.control.php"; ?>
		</div>
		<?php include_once "2_view/layout/footer.php"; ?>
	</body>
</html>
