<?php

include_once "1_models/users.model.php";
include_once "2_view/change_login.view.php";

function login($old_login, $new_login, $passwd)
{

	if (empty($new_login) || empty($passwd))
	{
		login_input();
		return FALSE;
	}

	$user = get_user_by_login($old_login);
	if (!($user))
	{
		login_user_not_found();
		return FALSE;
	}

	if (get_user_by_login($new_login))
	{
		login_already_exists();
		return FALSE;
	}

	if (!(auth_user($user, $passwd)))
	{
		login_wrong_passwd();
		return FALSE;
	}

	if ($new_login == $old_login)
	{
		same_login();
		return FALSE;
	}

	if (!(change_login($old_login, $new_login)))
	{
		login_sql_error();
		return FALSE;
	}

	change_login_ok();
	$_SESSION['user'] = $new_login;
	return TRUE;
}

if ($_POST['login_submit'] === "OK")
{
	$old_login = $_SESSION['user'];
	$new_login = $_POST['new_login'];
	$passwd = $_POST['passwd'];
	
	login($old_login, $new_login, $passwd);
}

if (isset($_SESSION['user']))
{
	show_login_form();
}

else if (empty($_SESSION['user']))
{
	header('Location: index.php');
}

?>
