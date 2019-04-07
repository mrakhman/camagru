<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<?php include_once "2_view/layout/head.php"; ?>
	<body>
		<?php include_once "2_view/layout/header.php"; ?>

		<div class="main" align="center">
            <div class="flex_container_preview_row">
                <div class="flex_container_preview_column">
			        <?php include_once "3_controller/camera.control.php"; ?>
                </div>
                <div class="flex_container_preview_column" id="preview">
                    <!-- camera_api.js code works here -->
                </div>
            </div>
            <br>

            <div class="choose_file_div">
                 Upload photo
                <br>
                <img id="attach_photo" src="img/icons/attach.png" width="30">
                <input type="file" id="choose_file" accept="image/*"/>

            </div>

            <br>
            <div id="flex_sticker">
                <div class="sticker selected" id="none_sticker">
                    <img src="img/stickers/none.svg" height="90"/>
                </div>
                <?php include_once "3_controller/stickers.control.php"; ?>
                <!-- camera_api.js code works here -->
            </div>

<!-- Hidden input form -->
            <form id="sticker_form">
                <input type="text" name="sticker_id" id="sticker_id">
                <input type="text" name="coord_x"  id="sticker_coord_x" value="0">
                <input type="text" name="coord_y" id="sticker_coord_y" value="0">
                <input type="text" name="photo" id="selected_photo">
            </form>
<!-- Description -->
            <div>
                <textarea id="description" placeholder="Add comment to your post" rows="5" cols="40" maxlength="200"></textarea>
                <div id="textarea_count"></div>
            </div>
<!-- Continue button -->
            <a href="#" id="continue" class="button"> Continue </a>
		</div>



        <?php include_once "2_view/layout/footer.php"; ?>
        <script src="3_controller/camera_api.js"></script>
	</body>
</html>
