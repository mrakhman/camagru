<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<?php include_once "2_view/layout/head.php"; ?>
	<body>
		<?php include_once "2_view/layout/header.php"; ?>
		<div class="main" align="center">
            <h3>Change all website localhost:8080 to http://camagru.ml:8080. NOT change DB localhost <br><br>Changed all I need in users.model except for https:// (now it's not done) <br><br>Need to check other links even though it will not cause damage except for it will be different sessions </h3>
			<?php include_once "3_controller/register.control.php"; ?><br/>
            <?php include_once "3_controller/friends_posts.control.php"; ?>
		</div>
		<?php include_once "2_view/layout/footer.php"; ?>
        <script src="3_controller/image.js"></script>
	</body>
</html>
