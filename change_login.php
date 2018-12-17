<?php
session_start();
if (isset($_SESSION['user']) && isset($_SESSION['id'])) 
{
?>
		<!DOCTYPE html>
		<html>
			<?php include_once "2_view/layout/head.php"; ?>
			<body>
				<?php include_once "2_view/layout/header.php"; ?>
				<?php include_once "2_view/layout/menu.php"; ?>
				<div class="sidenav">
					<a href="change_passwd.php">Change password</a>
					<a href="change_login.php" class="active">Change username</a>
					<a href="change_email.php">Change email</a>
				</div>
				<div class="main" align="center">
					<?php include_once "3_controller/change_login.control.php"; ?>
				</div>
				<?php include_once "2_view/layout/footer.php"; ?>
			</body>
		</html>
<?php
}
else
{
	header('Location: index.php');
}

?>
