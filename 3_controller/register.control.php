<?php

// It's a good habbit to always check for errors first and then have else condition for valid input
if ($_POST['submit'] === "OK")
{
	include "../config/database.php";
	include "../1_models/users.model.php";

	$login = $_POST['login'];
	$email = $_POST['email'];
	$passwd = $_POST['passwd'];
	$conf_passwd = $_POST['conf_passwd'];

	// Error handlers

	if (empty($login) || empty($email) || empty($passwd) || empty($conf_passwd))
	{
		echo "Empty input field(s)\n";
		header('Location: ooops.php?error=empty_input');
		echo "Empty input field(s)\n";
		exit();
	}

	if (!($passwd === $conf_passwd))
	{
		echo "Confirm password error\n";
		header('Location: ooops.php?error=confirm_password_error');
		exit();
	}

	if (!(create_user($login, $email, $passwd)))
	{
		echo "User already exists\n";
		header('Location: ooops.php?error=user_already_exists');
		exit();
	}

	else
	{
		echo "User created!\n";
		header('Location: success.php');
	}

	// // Check if input characters are valid
	// if (!preg_match("/[a-z]{1-10}/", $login))
	// {
	// 	header('Location: index.php?error=invalid_login_format(strlen < 10 && a-z)');
	// 	exit();
	// }

	// // Check if email is valid
	// if (filter_var($email, FILTER_VALIDATE_EMAIL))
	// {
	// 	header('Location: index.php?error=invalid_email_format(strlen < 10 && a-z)');
	// 	exit();
	// }

}

// Send user back to index.php page in case he wants to get to register.php page from URL

else
{
	header('Location: ../index.php');
}

?>
