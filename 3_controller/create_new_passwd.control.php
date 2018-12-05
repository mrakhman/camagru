<?php

include "2_view/create_new_passwd.view.php";
include "1_models/users.model.php";

$token = $_GET['token'];

if (empty($token))
{
	activation_empty();
	exit();
}

function create_new_passwd($token)
{
	$passwd = $_POST['passwd'];
	$conf_passwd = $_POST['conf_passwd'];

	if (empty($passwd) || empty($conf_passwd))
	{
		empty_passwd();
		return FALSE;
	}

	if ($passwd !== $conf_passwd)
	{
		confirm_password_error();
		return FALSE;
	}

	$reset_array = get_passreset_array($token);

	if (!$reset_array)
	{
		no_matches();
		return FALSE;
	}
	if (!reset_user_passwd($reset_array['user_id'], $passwd))
	{
		return FALSE;
	}
	passwd_reset_success();
	return TRUE;
}

if ($_POST['submit'] === "OK")
{
	//include "config/database.php";
	create_new_passwd($token);
}

reset_success();