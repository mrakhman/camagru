<?php

	function activation_empty()
	{
		echo '<p class="error" align="center"> Link is missing or broken </p>';
		echo '<p align="center"> Click <a href="index.php">here</a> to register new account </p>';
	}


	function reset_link_damage()
	{
		echo '<p class="error" align="center"> Password reset link has been damaged </p>';
	}

	function empty_passwd()
	{
		// if ($_GET['error'] == 'empty_passwd')
			echo '<p class="error"> Empty input field </p>';
	}

	function confirm_password_error()
	{
		// if ($_GET['error'] == 'confirm_password_error')
			echo '<p class="error"> Those passwords didn\'t match. Try again </p>';
	}

	function no_matches()
	{
		// if ($_GET['error'] == 'no_matches')
			echo '<p class="error"> Reset link can be used only once, it is valid for 2 hours </p>';
			echo '<p class="error"> Link might be damaged </p>';
			echo '<p> Click <a href="passwd_reset.php"> here </a> to send new link </p>';
	}

	function unsafe_passwd()
	{
		// if ($_GET['error'] == 'unsafe_passwd')
			echo '<p class="error"> Use more safe password </p>';
	}

	function passwd_reset_success()
	{
		// if ($_GET['passwd_reset'])
			echo '<p class="success"> Password has been successfully reset </p>';
	}


	// if (empty($validator) || empty($selector))
	// {
	// 	reset_link_damage();
	// }
	// else
	// {
	function reset_success()
	{
?>
	<h3 align="center"> Enter new password </h3>
	<form method="post" >
		<p> Password <br> [minimum complexity = ?] </p>

		<!-- <input type="hidden" name="selector" value"<?php// echo $selector; ?>">
		<input type="hidden" name="validator" value"<?php// echo $validator; ?>"> -->
		<input type="password" class="input" placeholder="Enter password" name="passwd"/>
		<br>
		<input type="password" class="input" placeholder="Repeat password" name="conf_passwd"/>
		<br>
		<input type="submit" class="button" name="submit" value="OK"/>
	</form>

<?php
	}
