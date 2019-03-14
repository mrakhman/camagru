<?php

	function empty_input_login()
	{
		print '<p class="error"> Empty input field </p>';
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
		<form class="" method="post">
			<div class="flex_container_column">
				<input type="text" class="input" placeholder="Enter username" name="username"/>
				<input type="password" class="input" placeholder="Enter password" name="passwd"/>
				<input align="right" type="submit" class="button" name="log_in" value="OK"/>
			</div>
			<li class="dropdown">
				<a class="dropbtn" href="passreset.php"><font size="-1"> Forgot password? </font></a>
			</li>
		</form>

<?php
	}
