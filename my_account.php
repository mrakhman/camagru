<?php
session_start();
if (isset($_SESSION['user']))
{
	include_once "2_view/layout/header.php";
	include "2_view/layout/menu.php";
	echo '<div class="main">';
	include "2_view/change_passwd.view.php";
	include "2_view/change_login.view.php";
	include "2_view/change_email.view.php";


	include_once "2_view/layout/footer.php";
}

else
{
	header('Location: index.php');
	echo '</div>';
}

?>

