<?php
	function empty_input_passreset()
	{
		echo '<p class="error"> Empty input field </p>';
	}

	function wrong_email()
	{
		echo '<p class="error"> This email is not registered </p>';
	}

	function send_email_fail()
	{
		echo '<p class="error"> Email could not be sent </p>';
	}

	function reset_passwd_success()
	{
		echo '<p class="success"> Check your email :) </p>';
		echo '<p class="success"> The link is valid for 2 hours </p>';
	}
	function show_form_reset_email()
	{
?>

		<h3>Reset password</h3>
		<p> Enter your email to receive a password reset link </p>
		<form method="post">
			<input type="email" class="input" placeholder="Enter email" name="email"/>
			<br>
			<input type="submit" class="button" name="reset" value="OK"/>
		</form>

<?php }
