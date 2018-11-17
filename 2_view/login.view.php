<?php
	if (empty($_SESSION['user']) || $_SESSION['user'] == "")
	{
		if ($_GET['error'] == 'empty_input')
		{
			echo '<p class="error"> Empty input field </p>';
		}
		else if ($_GET['error'] == 'user_not_found')
		{
			echo '<p class="error"> User does not exist </p>';
		}
		else if ($_GET['error'] == 'wrong_passwd')
		{
			echo '<p class="error"> Wrong password </p>';
		}
?>

<form method="post" action="3_controller/login.control.php">
	<input type="text" class="input" placeholder="Enter login" name="login"/>
	<input type="password" class="input" placeholder="Enter password" name="passwd"/>
	<input type="submit" class="button" name="submit" value="OK"/>
</form>

<?php
	}
