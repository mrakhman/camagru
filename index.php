<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<?php include_once "2_view/layout/head.php"; ?>
	<body>
		<?php include_once "2_view/layout/header.php"; ?>
		<div class="main" align="center">
			<p align="center"> Home </p>
			<?php include_once "3_controller/register.control.php"; ?><br/>

            <?php echo "Don't forget about passwd min complexity";?><br/>
            <?php echo "Create database SQL code";?><br/>
            <?php echo "Pagination by pages";?><br/>
            <?php echo "Check responsive on different screens";?><br/>
            <?php echo "Check Firefox";?><br/>
            <?php include_once "3_controller/friends_posts.control.php"; ?>
<!--            <script src="3_controller/image.js"></script>-->
		</div>
		<?php include_once "2_view/layout/footer.php"; ?>
        <script src="3_controller/image.js"></script>
	</body>
</html>
