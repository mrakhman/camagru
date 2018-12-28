<?php

include_once "1_models/users.model.php";
include_once "2_view/change_email.view.php";

function email($login, $new_email, $passwd)
{
	if (empty($new_email) || empty($passwd))
	{
		email_empty_input();
		return FALSE;
	}

	$user = get_user_by_login($login);
	$old_email = $user['email'];

	if (!($user))
	{
		email_user_not_found();
		return FALSE;
	}

	if (get_user_by_email($new_email))
	{
		email_already_exists();
		return FALSE;
	}

	if (!(auth_user($user, $passwd)))
	{
		email_wrong_passwd();
		return FALSE;
	}

	if ($new_email == $old_email)
	{
		same_email();
		return FALSE;
	}

	if (!(change_email($old_email, $new_email)))
	{
		email_sql_error();
		return FALSE;
	}

	change_email_ok();
	return TRUE;
}

// session_start();

if ($_POST['email_submit'] === "OK")
{
	$login = $_SESSION['user'];
	$new_email = $_POST['new_email'];
	$passwd = $_POST['passwd'];
	
	email($login, $new_email, $passwd);
}

if (isset($_SESSION['user']))
{
	show_email_form();
}

else if (empty($_SESSION['user']))
{
	header('Location: index.php');
}

?>
