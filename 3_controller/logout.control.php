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
	if ($_POST['submit'] === "Yes" || $_POST['logout'] === "Logout")
		logout();
}

?>
