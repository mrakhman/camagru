<?php

include "2_view/activation.view.php";

$email = $_GET['email'];
$token = $_GET['token'];


if (empty($email) || empty($token))
{
	activation_empty();
	exit();
}

include "1_models/users.model.php";

if (!(activate_user($email, $token)))
{
	activation_damage();
	exit();
}

activation_success();

?>
