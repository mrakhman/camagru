<div class="main">

<?php
	if (empty($_SESSION['user']) || $_SESSION['user'] == "")
	{
		if ($_GET['error'] == 'empty_input_field')
		{
			echo '<p class="error"> Empty input field </p>';
		}
		else if ($_GET['error'] == 'confirm_password_error')
		{
			echo '<p class="error"> Confirm password error </p>';
		}
		else if ($_GET['error'] == 'user_already_exists')
		{
			echo '<p class="error"> User already exists </p>';
		}
		else if ($_GET['created_user'])
		{
			echo '<p class="success"> User' . $login . ' created! </p>';
		}
?>

<h3>Register</h3>
<form method="post" action="3_controller/register.control.php">
	<h>Email</h><br>
	<input type="email" class="input" placeholder="Enter email" name="email"/>
	<br><br>
	<h>Login</h><br>
	<input type="text" class="input" placeholder="Enter login" name="login"/>
	<br><br>
	<h>Password</h><br>
	<input type="password" class="input" placeholder="Enter password" name="passwd"/>
	<br>
	<input type="password" class="input" placeholder="Repeat password" name="conf_passwd"/>
	<br>
	<input type="submit" class="button" name="submit" value="OK"/>
</form></div>

<?php
	}

?>