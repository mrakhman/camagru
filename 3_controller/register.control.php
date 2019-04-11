<?php

include_once "1_models/users.model.php";
include_once "1_models/security.model.php";
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

	if (has_extra_characters($login) || has_extra_characters($email))
	{
		login_email_format();
		return FALSE;
	}

	if (!(secure_password($passwd)))
	{
		unsafe_passwd();
		return FALSE;
	}

	if ((has_space($login)) || has_space($email) || has_space($passwd))
	{
		space();
		return FALSE;
	}

	if (!(create_user($login, $email, $passwd)))
	{
		user_already_exists();
		return FALSE;
	}

	user_create();
	return TRUE;
}

if (array_key_exists('register', $_POST) && $_POST['register'] === "OK")
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
