<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<?php include_once "2_view/layout/head.php"; ?>
	<body>
		<?php include_once "2_view/layout/header.php"; ?>
		<?php include_once "2_view/layout/menu.php"; ?>
		<div class="sidenav">
			<a href="upload.php" class="active">Upload image</a>
			<a href="camera.php">Use camera</a>
		</div>
		<div class="main" align="center">
			<?php include_once "3_controller/upload.control.php"; ?>
		</div>
		<?php include_once "2_view/layout/footer.php"; ?>
	</body>
</html>
