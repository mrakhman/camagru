<?php

	function login_input()
	{
		echo '<p class="error"> Empty input field </p>';
	}

	function login_user_not_found()
	{
		echo '<p class="error"> User does not exist </p>';
	}

	function login_already_exists()
	{
		echo '<p class="error"> Another user has this username </p>';
	}

	function login_wrong_passwd()
	{
		echo '<p class="error"> Wrong password </p>';
	}

	function same_login()
	{
		echo '<p class="error"> Old and new login are the same </p>';
	}

	function login_sql_error()
	{
		echo '<p class="error"> SQL error occured </p>';
	}

	function change_login_ok()
	{
		echo '<p class="success"> Login successfully changed! </p>';
	}

	function show_login_form()
	{
?>
		<h3>Change username</h3>
		<form method="post">
			<h>New username</h><br>
			<input type="text" class="input" placeholder="Enter new username" name="new_login"/>
			<br><br>
			<h>Enter password</h><br>
			<input type="password" class="input" placeholder="Enter password" name="passwd"/>
			<br>
			<input type="submit" class="button" name="login_submit" value="OK"/>
		</form>

<?php
	}
