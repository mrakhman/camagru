<?php


$email = $_GET['email'];
$token = $_GET['token'];

if (empty($email) || empty($token))
{
	header('Location: ../index.php');
}

if (isset($email) && isset($token))
{
	header('Location: ../index.php');
	exit();
}

if (!(activate_user($email, $token)))
{
	header('Location: ../index.php');
	exit();
}

echo "Email verified";

?>
