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
				<div class="main">
					<?php include_once "3_controller/change_passwd.control.php"; ?>
					<?php include_once "3_controller/change_login.control.php"; ?>
					<?php include_once "3_controller/change_email.control.php"; ?>
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
