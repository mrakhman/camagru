<?php

	$selector = $_GET['selector'];
	$validator = $_GET['validator'];

	function reset_link_damage()
	{
		echo '<p class="error" align="center"> Password reset link has been damaged </p>';
	}

	function reset_success()
	{
		echo '<p class="success" align="center"> Enter new password </p>';
	}

	function empty_passwd()
	{
		if ($_GET['error'] == 'empty_passwd')
			echo '<p class="error"> Empty input field </p>';
	}

	function confirm_password_error()
	{
		if ($_GET['error'] == 'confirm_password_error')
			echo '<p class="error"> Confirm password error </p>';
	}

	function no_matches()
	{
		if ($_GET['error'] == 'no_matches')
			echo '<p class="error"> Reset link expired or was damaged </p>';
	}

	function invalid_link()
	{
		if ($_GET['error'] == 'invalid_link')
			echo '<p class="error"> Reset link was damaged </p>';
	}

	function unsafe_passwd()
	{
		if ($_GET['error'] == 'unsafe_passwd')
			echo '<p class="error"> Use more safe password </p>';
	}

	function passwd_reset_success()
	{
		if ($_GET['passwd_reset'] == 'success')
			echo '<p class="success"> Password has been successfully reset </p>';
	}


	// if (empty($validator) || empty($selector))
	// {
	// 	reset_link_damage();
	// }
	// else
	// {
	// 	reset_success();
?>

	<form method="post" action="3_controller/create_new_passwd.control.php">
		<p> Password <br> [minimum complexity = ?] </p>
		<?php empty_passwd(); ?>
		<?php confirm_password_error(); ?>
		<?php unsafe_passwd(); ?>
		<?php passwd_reset_success(); ?>
		<input type="hidden" name="selector" value"<?php echo $selector; ?>">
		<input type="hidden" name="validator" value"<?php echo $validator; ?>">
		<input type="password" class="input" placeholder="Enter password" name="passwd"/>
		<br>
		<input type="password" class="input" placeholder="Repeat password" name="conf_passwd"/>
		<br>
		<input type="submit" class="button" name="submit" value="OK"/>
	</form>

<?php
//	}
