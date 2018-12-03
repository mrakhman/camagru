<?php
	function empty_input()
	{
		if ($_GET['error'] == 'empty_email')
			echo '<p class="error"> Empty input field </p>';
	}

	function wrong_email()
	{
		if ($_GET['error'] == 'wrong_email')
			echo '<p class="error"> This email is not registered </p>';
	}

	function send_email_fail()
	{
		if ($_GET['error'] == 'send_email_fail')
			echo '<p class="error"> Email could not be sent </p>';
	}

	function reset_passwd_success()
	{
		if ($_GET['reset_passwd'] == 'success')
			echo '<p class="success"> Check your email :) </p>';
	}

?>

<h3>Reset password</h3>
<p> Enter your email to receive a password reset link </p>
<?php empty_input() ?>
<?php wrong_email() ?>
<?php send_email_fail() ?>
<?php reset_passwd_success() ?>
<form method="post" action="3_controller/reset_pass_email.control.php">
	<input type="email" class="input" placeholder="Enter email" name="email"/>
	<br>
	<input type="submit" class="button" name="submit" value="OK"/>
</form></div>