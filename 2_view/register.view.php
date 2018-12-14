<?php

	function empty_input_field()
	{
		echo '<p class="error"> Empty input field </p>';
	}

	function confirm_password_error()
	{
		echo '<p class="error"> 2 passwords didn\'t match </p>';
	}

	function script()
	{
		echo '<p class="error"> Scripts are forbidden </p>';
	}

	// function login_format() // remove it
	// {
	// 	echo '<p class="error"> Username must only include a-z and 0-9 </p>';
	// }

	function user_already_exists()
	{
		echo '<p class="error"> User already exists </p>';
	}

	function user_create()
	{
		echo '<p class="success"> User created! Check your email to activate account </p>';
	}
	
	function show_form_register()
	{
?>

		<h3>Register</h3>
		<form method="post">
			<h> Email </h><br>
			<input type="email" class="input" placeholder="Enter email" name="email"/>
			<br><br>
			<h> Username </h><br>
			<input type="text" class="input" placeholder="Enter username" name="username"/>
			<br><br>
			<h> Password <br> [minimum complexity = ?] </h><br>
			<input type="password" class="input" placeholder="Enter password" name="passwd"/>
			<br>
			<input type="password" class="input" placeholder="Repeat password" name="conf_passwd"/>
			<br>
			<input type="submit" class="button" name="register" value="OK"/>
		</form>

<?php
	}
?>