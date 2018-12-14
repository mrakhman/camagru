<?php

include_once "1_models/users.model.php";
include_once "2_view/activation.view.php";

$email = $_GET['email'];
$token = $_GET['token'];


if (empty($email) || empty($token))
{
	activation_empty();
	exit();
}

if (!(activate_user($email, $token)))
{
	activation_damage();
	exit();
}

activation_success();

?>
