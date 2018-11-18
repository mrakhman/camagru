<?php
	if (isset($_SESSION['user']))
	{
		if ($_GET['error'] == 'passw_empty_input')
		{
			echo '<p class="error"> Empty input field </p>';
		}
		else if ($_GET['error'] == 'passw_user_not_found')
		{
			echo '<p class="error"> User does not exist </p>';
		}
		else if ($_GET['error'] == 'passw_wrong_passwd')
		{
			echo '<p class="error"> Wrong password </p>';
		}
		else if ($_GET['error'] == 'confirm_password_error')
		{
			echo '<p class="error"> Confirm password error </p>';
		}
		else if ($_GET['error'] == 'same_passwords')
		{
			echo '<p class="error"> Old and new passwords can not be the same </p>';
		}
		else if ($_GET['error'] == 'passw_sql_error')
		{
			echo '<p class="error"> SQL error occured </p>';
		}


		else if ($_GET['change_pass'] == 'ok')
		{
			echo '<p class="success"> Password successfully changed! </p>';
		}
?>

	<h3>Change password</h3>
	<form method="post" action="3_controller/change_passwd.control.php">
		<h>Old password</h><br>
		<input type="password" class="input" placeholder="Enter password" name="old_passwd"/>
		<br><br>
		<h>New password</h><br>
		<input type="password" class="input" placeholder="Enter password" name="new_passwd"/>
		<br>
		<input type="password" class="input" placeholder="Repeat password" name="conf_passwd"/>
		<br>
		<input type="submit" class="button" name="submit" value="OK"/>
	</form>

<?php
	}
	else
	{
		header('Location: ../index.php');
	}
?>
