<?php
	if (isset($_SESSION['user']))
	{
		if ($_GET['error'] == 'email_empty_input')
		{
			echo '<p class="error"> Empty input field </p>';
		}
		else if ($_GET['error'] == 'email_user_not_found')
		{
			echo '<p class="error"> User does not exist </p>';
		}
		else if ($_GET['error'] == 'email_wrong_passwd')
		{
			echo '<p class="error"> Wrong password </p>';
		}
		else if ($_GET['error'] == 'same_email')
		{
			echo '<p class="error"> Old and new email can not be the same </p>';
		}
		else if ($_GET['error'] == 'email_sql_error')
		{
			echo '<p class="error"> SQL error occured </p>';
		}


		else if ($_GET['change_email'] == 'ok')
		{
			echo '<p class="success"> Email successfully changed! </p>';
		}
?>

	<h3>Change email</h3>
	<form method="post" action="3_controller/change_email.control.php">
		<h>New email</h><br>
		<input type="email" class="input" placeholder="Enter new email" name="new_email"/>
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
