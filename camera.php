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
                    <!-- camera_api.js code works here -->
                </div>
            </div>
            <br>
            <div id="flex_sticker">
                <div class="sticker selected" id="none_sticker">
                    <img src="img/stickers/none.svg" height="90"/>
                </div>
                <?php include_once "3_controller/stickers.control.php"; ?>
                <!-- camera_api.js code works here -->
                <?php //echo <img src="http://localhost:8080/img/stickers/pi.png"></img>?>
            </div>
		</div>
		<?php include_once "2_view/layout/footer.php"; ?>
<!--        <form id="sticker_form" style="visibility: hidden;">-->
        <form id="sticker_form">
            <input type="text" name="sticker_id" id="sticker_id">
            <input type="text" name="coord_x"  id="sticker_coord_x" value="0">
            <input type="text" name="coord_y" id="sticker_coord_y" value="0">
            <input type="text" name="photo" id="selected_photo">
        </form>
        <script src="3_controller/camera_api.js"></script>
	</body>
</html>
