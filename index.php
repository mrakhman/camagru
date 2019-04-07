<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<?php include_once "2_view/layout/head.php"; ?>
	<body>
		<?php include_once "2_view/layout/header.php"; ?>
		<div class="main" align="center">
            <h3>I need to confirm new CHANGED email address via email !!!</h3>
            <h4>Do not change email in DB untill new email is confirmed</h4>
			<?php include_once "3_controller/register.control.php"; ?><br/>
            <?php include_once "3_controller/friends_posts.control.php"; ?>
		</div>
		<?php include_once "2_view/layout/footer.php"; ?>
        <script src="3_controller/image.js"></script>
	</body>
</html>
