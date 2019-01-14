<?php

include_once "1_models/users.model.php";
include_once "2_view/change_passwd.view.php";

function passwd($login, $old_passwd, $new_passwd, $conf_passwd)
{
	if (empty($old_passwd) || empty($new_passwd) || empty($conf_passwd))
	{
		passw_empty_input();
		return FALSE;
	}

	$session_user = get_user_by_login($login);

	if (!($session_user))
	{
		passw_user_not_found();
		return FALSE;
	}

	if (!(auth_user($session_user, $old_passwd)))
	{
		passw_wrong_passwd();
		return FALSE;
	}

	if (!($new_passwd === $conf_passwd))
	{
		confirm_password_error();
		return FALSE;
	}

	if ($new_passwd == $old_passwd)
	{
		same_passwords();
		return FALSE;
	}

	if (!(change_passwd($login, $new_passwd)))
	{
		passw_sql_error();
		return FALSE;
	}

	change_passwd_ok();
	return TRUE;
}

if (array_key_exists('passwd_submit', $_POST) && $_POST['passwd_submit'] === "OK")
{
	$login = $_SESSION['user'];
	$old_passwd = $_POST['old_passwd'];
	$new_passwd = $_POST['new_passwd'];
	$conf_passwd = $_POST['conf_passwd'];

	passwd($login, $old_passwd, $new_passwd, $conf_passwd);
}

if (isset($_SESSION['user']))
{
	show_passwd_form();
}

else if (empty($_SESSION['user']))
{
	header('Location: index.php');
}

?>
