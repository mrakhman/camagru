<?php

	function empty_input_login()
	{
		echo '<p class="error"> Empty input field </p>';
	}

	function user_not_found_login()
	{
		echo '<p class="error"> User does not exist </p>';
	}

	function not_confirmed()
	{
		echo '<p class="error"> Click the link in your email before login </p>';
	}

	function auth_fail()
	{
		echo '<p class="error"> Wrong password or email not confirmed </p>';
	}

	function show_form_login()
	{
?>
		<form method="post">
			<input type="text" class="input" placeholder="Enter username" name="username"/>
			<input type="password" class="input" placeholder="Enter password" name="passwd"/>
			<input type="submit" class="button" name="log_in" value="OK"/>
			<br>
			<a href="passreset.php"> Forgot password? </a>
		</form>

<?php
	}
