<!DOCTYPE html>
<html>
	<?php include_once "2_view/layout/head.php"; ?>
	<body>
		<?php include_once "2_view/layout/header.php"; ?>
		<?php include_once "2_view/layout/menu.php"; ?>
		<div class="sidenav">
			<a href="change_passwd.php">Change password</a>
			<a href="change_login.php">Change username</a>
			<a href="change_email.php" class="active">Change email</a>
		</div>
		<div class="main" align="center">
			<?php include_once "3_controller/change_email.control.php"; ?>
		</div>
		<?php include_once "2_view/layout/footer.php"; ?>
	</body>
</html>
