<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<?php include_once "2_view/layout/head.php"; ?>
	<body>
		<?php include_once "2_view/layout/header.php"; ?>
		<?php //include_once "2_view/layout/menu.php"; ?>
		<div class="sidenav">
			<a href="change_passwd.php" class="active">Change password</a>
			<a href="change_login.php">Change username</a>
			<a href="change_email.php">Change email</a>
            <a href="change_notification.php">Change notifications</a>
		</div>
		<div class="main" align="center">
			<?php include_once "3_controller/change_passwd.control.php"; ?>
		</div>
		<?php include_once "2_view/layout/footer.php"; ?>
	</body>
</html>
