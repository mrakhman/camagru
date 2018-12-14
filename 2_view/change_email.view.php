<?php

	function email_empty_input()
	{
		echo '<p class="error"> Empty input field </p>';
	}

	function email_user_not_found()
	{
		echo '<p class="error"> User does not exist </p>';
	}

	function email_already_exists()
	{
		echo '<p class="error"> Another user has this email </p>';
	}

	function email_wrong_passwd()
	{
		echo '<p class="error"> Wrong password </p>';
	}

	function same_email()
	{
		echo '<p class="error"> Old and new email are the same </p>';
	}

	function email_sql_error()
	{
		echo '<p class="error"> SQL error occured </p>';
	}

	function change_email_ok()
	{
		echo '<p class="success"> Email successfully changed! </p>';
	}

	function show_email_form()
	{
?>
		<h3>Change email</h3>
		<form method="post">
			<h>New email</h><br>
			<input type="email" class="input" placeholder="Enter new email" name="new_email"/>
			<br><br>
			<h>Enter password</h><br>
			<input type="password" class="input" placeholder="Enter password" name="passwd"/>
			<br>
			<input type="submit" class="button" name="email_submit" value="OK"/>
		</form>

<?php
	}
