<?php

function activation_empty()
{
	echo '<p class="error" align="center"> Email or token is missing </p>';
	echo '<p align="center"> Click <a href="index.php">here</a> to register new account </p>';
}

function activation_damage()
{
	echo '<p class="error" align="center"> Activation link has been damaged </p>';
	echo '<p align="center"> Click <a href="index.php">here</a> to register new account </p>';
}

function activation_success()
{
	echo '<p class="success" align="center"> Thank you for confirming your email. You can now login above! </p>';
}

?>
