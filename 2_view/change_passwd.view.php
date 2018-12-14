<?php

	function passw_empty_input()
	{
		echo '<p class="error"> Empty input field </p>';
	}

	function passw_user_not_found()
	{
		echo '<p class="error"> User does not exist </p>';
	}

	function passw_wrong_passwd()
	{
		echo '<p class="error"> Wrong password </p>';
	}

	function confirm_password_error()
	{
		echo '<p class="error"> Confirm password error </p>';
	}

	function same_passwords()
	{
		echo '<p class="error"> Old and new passwords are the same </p>';
	}

	function passw_sql_error()
	{
		echo '<p class="error"> SQL error occured </p>';
	}

	function change_passwd_ok()
	{
		echo '<p class="success"> Password successfully changed! </p>';
	}

	function show_passwd_form()
	{
?>
		<h3>Change password</h3>
		<form method="post">
			<h>Old password</h><br>
			<input type="password" class="input" placeholder="Enter password" name="old_passwd"/>
			<br><br>
			<h>New password</h><br>
			<input type="password" class="input" placeholder="Enter password" name="new_passwd"/>
			<br>
			<input type="password" class="input" placeholder="Repeat password" name="conf_passwd"/>
			<br>
			<input type="submit" class="button" name="passwd_submit" value="OK"/>
		</form>

<?php
	}
