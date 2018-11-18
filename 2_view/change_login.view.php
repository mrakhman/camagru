<?php
	if (isset($_SESSION['user']))
	{
		if ($_GET['error'] == 'login_empty_input')
		{
			echo '<p class="error"> Empty input field </p>';
		}
		else if ($_GET['error'] == 'login_user_not_found')
		{
			echo '<p class="error"> User does not exist </p>';
		}
		else if ($_GET['error'] == 'login_wrong_passwd')
		{
			echo '<p class="error"> Wrong password </p>';
		}
		else if ($_GET['error'] == 'same_login')
		{
			echo '<p class="error"> Old and new login can not be the same </p>';
		}
		else if ($_GET['error'] == 'login_sql_error')
		{
			echo '<p class="error"> SQL error occured </p>';
		}


		else if ($_GET['change_login'] == 'ok')
		{
			echo '<p class="success"> Login successfully changed! </p>';
		}
?>

	<h3>Change login</h3>
	<form method="post" action="3_controller/change_login.control.php">
		<h>New login</h><br>
		<input type="text" class="input" placeholder="Enter new login" name="new_login"/>
		<br><br>
		<h>Enter password</h><br>
		<input type="password" class="input" placeholder="Enter password" name="passwd"/>
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
