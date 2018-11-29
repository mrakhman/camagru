<?php
	if (empty($_SESSION['user']) || $_SESSION['user'] == "")
	{
		if (array_key_exists('error', $_GET))
		{
			if ($_GET['error'] == 'empty_input')
			{
				echo '<p class="error"> Empty input field </p>';
			}
			else if ($_GET['error'] == 'user_not_found')
			{
				echo '<p class="error"> User does not exist </p>';
			}
			else if ($_GET['error'] == 'auth_fail')
			{
				echo '<p class="error"> Wrong password or email not confirmed </p>';
			}
		}
		
?>

<form method="post" action="3_controller/login.control.php">
	<input type="text" class="input" placeholder="Enter login" name="login"/>
	<input type="password" class="input" placeholder="Enter password" name="passwd"/>
	<input type="submit" class="button" name="submit" value="OK"/>
	<br>
	<a href="passwd_reset.php"> Forgot password? </a>
</form>

<?php
	}
