<?php

	function activation_empty()
	{
		echo '<p class="error" align="center"> Link is missing or damaged </p>';
		echo '<p align="center"> Click <a href="index.php">here</a> to register new account </p>';
	}

	function empty_passwd()
	{
		echo '<p class="error"> Empty input field </p>';
	}

    function unsafe_passwd()
    {
        echo '<p class="error"> Unsafe password </p>';
    }

	function confirm_password_error()
	{
		echo '<p class="error"> Those passwords didn\'t match. Try again </p>';
	}

	function no_matches()
	{
		echo '<p class="error"> Reset link can be used only once, it is valid for 2 hours </p>';
		echo '<p class="error"> Don\'t change the link </p>';
		echo '<p> Click <a href="passreset.php">here</a> to send new link </p>';
	}

	function reset_user_passwd_error()
	{
		echo '<p class="error"> Password can\'t be reset </p>';
	}

	function passreset_success()
	{
		echo '<p class="success"> Password has been successfully reset </p>';
	}

	function show_form_new_passwd()
	{
?>
	<h3 align="center"> Enter new password </h3>
	<form method="post" >
        <p><font size="-1"> Password must have at least 8 symbols and contain: <br> uppercase and lowercase [A-Z + a-z] + number [0-9] + special character [@#\-_$%^&+=§!\?]</font></p>
        <p><font size="-1"> Example: HelloWorld!1</font></p>
		<input type="password" class="input" placeholder="Enter password" name="passwd"/>
		<br>
		<input type="password" class="input" placeholder="Repeat password" name="conf_passwd"/>
		<br>
		<input type="submit" class="button" name="reset" value="OK"/>
	</form>

<?php
	}
