<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<?php include_once "2_view/layout/head.php"; ?>
	<body>
		<?php include_once "2_view/layout/header.php"; ?>
		<div class="main" align="center">
			<?php include_once "3_controller/register.control.php"; ?><br/>
            <?php include_once "3_controller/friends_posts.control.php"; ?>
		</div>
		<?php include_once "2_view/layout/footer.php"; ?>
        <script src="js/image.js"></script>
	</body>
</html>
