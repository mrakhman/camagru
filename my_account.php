<?php
session_start();
if (isset($_SESSION['user'])) 
{
?>
		<!DOCTYPE html>
		<html>
			<?php include_once "2_view/layout/head.php"; ?>
			<body>
				<?php include_once "2_view/layout/header.php"; ?>
				<?php	include "2_view/layout/menu.php"; ?>
				<div class="main">
					<?php include "2_view/change_passwd.view.php"; ?>
					<?php include "2_view/change_login.view.php"; ?>
					<?php include "2_view/change_email.view.php"; ?>
					<?php include_once "2_view/layout/footer.php"; ?>
				</div>
			</body>
		</html>
<?php
}
else
{
	header('Location: index.php');
}

?>
