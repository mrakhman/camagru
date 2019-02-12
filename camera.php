<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<?php include_once "2_view/layout/head.php"; ?>
	<body>
		<?php include_once "2_view/layout/header.php"; ?>
		<?php //include_once "2_view/layout/menu.php"; ?>
		<div class="sidenav">
			<a href="upload.php">Upload image</a>
			<a href="camera.php" class="active">Use camera</a>
		</div>
		<div class="main" align="center">
            <div class="flex_container_preview_row">
                <div class="flex_container_preview_column">
			        <?php include_once "3_controller/camera.control.php"; ?>
                </div>
            <div id="preview">
			    <?php include_once "3_controller/preview_photo.control.php"; ?>
            </div></div>
		</div>
		<?php include_once "2_view/layout/footer.php"; ?>
	</body>
</html>
