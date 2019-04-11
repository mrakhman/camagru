<?php
include_once "config/database.php";

function is_script_input($str)
{
	if (empty($str))
		return FALSE;

	if (preg_match("/(<script>)/", $str))
		return TRUE;
	else
		return FALSE;
}

function has_space($str)
{
	if (empty($str))
		return FALSE;

	if (preg_match("/( )/", $str))
        return TRUE;
    return FALSE;
}

function has_extra_characters($str)
{
    if (empty($str))
        return FALSE;

    $pattern = "/(?=.*[#$%^&+=§!\*\?\>\<\(\)\{\[\]\}\'\";:~])/";

    if (preg_match($pattern, $str))
        return TRUE;

    return FALSE;
}

function secure_password($passwd)
{
    if (empty($passwd))
        return FALSE;

    $pattern = "/^(?=.*[0-9])(?=.*[@#\-_$%^&+=§!\?])(?=.*[A-Z])(?=.*[a-z]).{8,}$/";

    if (preg_match($pattern, $passwd))
        return TRUE;

    return FALSE;
}
