<?php

include_once "2_view/create_new_passwd.view.php";
include_once "1_models/users.model.php";
include_once "1_models/security.model.php";


$token = $_GET['token'];

if (empty($token))
{
	activation_empty();
	exit();
}

$reset_array = get_passreset_array($token);

if (!$reset_array)
{
	no_matches();
	exit();
}

function create_new_passwd($token, $user_id)
{
	$passwd = $_POST['passwd'];
	$conf_passwd = $_POST['conf_passwd'];

	if (empty($passwd) || empty($conf_passwd))
	{
		empty_passwd();
		return FALSE;
	}

    if (!(secure_password($passwd)))
    {
        unsafe_passwd();
        return FALSE;
    }

	if ($passwd !== $conf_passwd)
	{
		confirm_password_error();
		return FALSE;
	}

	if (!reset_user_passwd($user_id, $passwd))
	{
		reset_user_passwd_error();
		return FALSE;
	}
	passreset_success();
	return TRUE;
}

if (array_key_exists('reset', $_POST) && $_POST['reset'] === "OK")
{
	create_new_passwd($token, $reset_array['user_id']);
}

show_form_new_passwd();
