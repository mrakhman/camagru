<?php

include_once "2_view/logout.view.php";

function logout()
{
	session_unset();
	session_destroy();
	header('Location: index.php');
}

// session_start();

if (isset($_SESSION['user']) && isset($_SESSION['id']))
{
	show_form_logout();
	if ((array_key_exists('submit', $_POST) && $_POST['submit'] === "Yes")
		|| (array_key_exists('logout', $_POST) && $_POST['logout'] === "Logout"))
		logout();
}

?>
