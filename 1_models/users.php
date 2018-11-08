<?php

/*
** Function creates user.
** If user created - return TRUE
 */

function create_user($email, $login, $passwd)
{
	$sql = 'INSERT INTO users(email, login, passwd) VALUES(:email, :login, :passwd)';

}