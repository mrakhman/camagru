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

	function space()
	{
		echo '<p class="error"> Don\'t use spaces </p>';
	}

	 function login_email_format()
	 {
	 	echo '<p class="error"> Username and email must only include [a-z + A-Z] [0-9] and @ </p>';
	 }

    function unsafe_passwd()
    {
        echo '<p class="error"> Unsafe password </p>';
    }

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
        <a href="config/setup.php">Click here</a><?php echo " to setup MySQL database";?><br/>
        <br><br>
		<h3>Register</h3>
<!--		<p class="success"> Don't use spaces </p>-->
		<form method="post">
			<h> Email </h><br>
			<input type="email" class="input" placeholder="Enter email" name="email"/>
			<br><br>
			<h> Username </h><br>
			<input type="text" class="input" placeholder="Enter username" name="username"/>
			<br>
			<p><font size="-1"> Password must have at least 8 symbols and contain: <br> uppercase and lowercase [A-Z + a-z] + number [0-9] + special character [@#\-_$%^&+=§!\?]</font></p>
			<p><font size="-1"> Example: HelloWorld!1</font></p>
			<h> Password</h><br>
			<input type="password" class="input" placeholder="Enter password" name="passwd"/>
			<br>
			<input type="password" class="input" placeholder="Repeat password" name="conf_passwd"/>
			<br>
			<input type="submit" class="button" name="register" value="OK"/>
		</form>

<?php
	}
?>