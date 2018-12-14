<?php

include_once "1_models/users.model.php";
include_once "2_view/register.view.php";

function register($login, $email, $passwd, $conf_passwd)
{
	if (empty($login) || empty($email) || empty($passwd) || empty($conf_passwd))
	{
		empty_input_field();
		return FALSE;
	}

	if (!($passwd === $conf_passwd))
	{
		confirm_password_error();
		return FALSE;
	}

	if ((is_script_input($login)) || is_script_input($email))
	{
		script();
		return FALSE;
	}

	/*
	// Check if input characters are valid
	if (preg_match("/[^a-z0-9]/", $login))
	{
		login_format();
		return FALSE;
	}*/

	/*
	//Check for password min complexity
	if (!(secure_passwd($passwd)))
	{
		header('Location: ../index.php?error=unsafe_passwd');
		exit();
	}*/

	if (!(create_user($login, $email, $passwd)))
	{
		user_already_exists();
		return FALSE;
	}

	user_create();
	return TRUE;
}

if ($_POST['register'] === "OK")
{
	$login = $_POST['username'];
	$email = $_POST['email'];
	$passwd = $_POST['passwd'];
	$conf_passwd = $_POST['conf_passwd'];

	register($login, $email, $passwd, $conf_passwd);
}


if (empty($_SESSION['user']) || $_SESSION['user'] == "")
{
	show_form_register();
}

?>
