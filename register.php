<?php

// It's a good habbit to always check for errors first and then have else condition for valid input

if (isset($_POST['submit']) && $_POST['submit'] === "OK")
	{
		include_once 'config/database.php';
		include '1_models/users.php';

		$login = mysql_real_escape_string($pdo, $_POST['login']);
		$email = mysql_real_escape_string($pdo, $_POST['email']);
		$passwd = mysql_real_escape_string($pdo, $_POST['passwd']);
		$conf_passwd = mysql_real_escape_string($pdo, $_POST['conf_passwd']);

		// Error handlers
		// Check empty fields
		if (empty($login) || empty($email) || empty($passwd) || empty($conf_passwd))
		{
			echo "Empty input field(s)\n";
			header('Location: ooops.php?error=empty_input');
			exit();
		}

		if (!($passwd === $conf_passwd))
		{
			echo "Confirm password error\n";
			header('Location: ooops.php?error=confirm_password_error');
			exit();
		}

		if (create_user($login, $email, $passwd))
		{
			echo "User created!\n";
			header('Location: success.php');
		}

		else
		{
			echo "User already exists\n";
			header('Location: ooops.php?error=user_already_exists');
			exit();
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

