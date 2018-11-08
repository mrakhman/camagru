<?php
	include_once '1_models/config/database.php';
	include '1_models/users.php';

if (isset($_POST['login'])	&& isset($_POST['email']) && isset($_POST['passwd']) && isset($_POST['conf_passwd']))
{
	if (create_user($_POST['login'], $_POST['email'], $_POST['passwd']))
	{
		echo "User created!\n";
	}
	else
		header('Location: register.php?error=User already exists');
}
else
	echo "Can't create user...\n";
	
?>
