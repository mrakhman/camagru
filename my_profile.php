<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<?php include_once "2_view/layout/head.php"; ?>
	<body>
		<?php include_once "2_view/layout/header.php"; ?>
		<?php // include_once "2_view/layout/menu.php"; ?>
		<div class="main" align="center">
            <div id="fb-root"></div>
            <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2"></script>
            <script type="text/javascript" src="https://vk.com/js/api/share.js?93" charset="windows-1251"></script>
            <?php include_once "3_controller/register.control.php"; ?>
			<?php include_once "3_controller/my_profile.control.php"; ?>
		</div>
        <script src="js/image.js"></script>
		<?php include_once "2_view/layout/footer.php"; ?>
	</body>
</html>
