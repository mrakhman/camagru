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

// function secure_passwd($passwd)
// {
		// if (strlen($passwd) < 8)
		// 	return FALSE;
		// if (preg_match(pattern, subject))
// }


function has_space($str)
{
	if (empty($str))
		return FALSE;

	if (preg_match("/( )/", $str))
			return TRUE;
		else
			return FALSE;
}