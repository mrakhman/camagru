<?php
	session_start();
	if (isset($_SESSION['user']))
	{
		echo '<p class="login_status"> Hello, ' . $_SESSION['user'] . '! </p>';
?>
		<form method="post" action="3_controller/logout.control.php">
			<input type="submit" class="button" name="submit" value="Logout"/>
		</form>

<?php
	}
	else
	{
		echo '<p class="login_status"> You are logged out </p>';
	}
?>
