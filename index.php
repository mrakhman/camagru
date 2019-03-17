<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<?php include_once "2_view/layout/head.php"; ?>
	<body>
		<?php include_once "2_view/layout/header.php"; ?>
		<div class="main" align="center">
			<p align="center"> Home </p>
			<?php include_once "3_controller/register.control.php"; ?><br/>

            <?php echo "Delete posted image out of database";?><br/>
            <?php echo "Make images likable";?><br/>
            <?php echo "How comments will be displayed?";?><br/>
            <?php echo "Send email when post receives a comment";?><br/>
            <?php echo "Let email on comment be turned off";?><br/>
            <?php echo "Don't forget about passwd min complexity";?><br/>
            <?php echo "Create database SQL code";?><br/>

            <?php include_once "3_controller/friends_posts.control.php"; ?>
		</div>
		<?php include_once "2_view/layout/footer.php"; ?>
	</body>
</html>
