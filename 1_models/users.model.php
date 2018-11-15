<?php

include "config/database.php";

function create_user($login, $email, $passwd)
{
	global $pdo;

	if (empty($login) || empty($passwd) || empty($email))
		return FALSE;

	// Check if user login exists
	$check_user = get_user_by_login($login);
	if ($check_user)
		return FALSE;

	// Check if user email exists
	$check_user = get_user_by_email($email);
	if ($check_user)
		return FALSE;

	// Create user
	$passwd = hash('whirlpool', $passwd);
	$sql = 'INSERT INTO users(login, email, passwd) VALUES(:login, :email, :passwd)';
	$stmt = $pdo->prepare($sql);
	$stmt->execute(['login' => $login, 'email' => $email, 'passwd' => $passwd]);
	return TRUE;
}

function get_user_by_login($login)
{
	global $pdo;

	if (empty($login))
		return FALSE;
	$sql = 'SELECT * FROM users WHERE login = :login';
	$stmt = $pdo->prepare($sql);
	$stmt->execute(['login' => $login]);
	if (!($current_user = $stmt->fetch(PDO::FETCH_ASSOC)))
	{
		// echo "No such user\n";
		return NULL;
	}
	return ($current_user);
}

function get_user_by_email($email)
{
	global $pdo;

	if (empty($email))
		return FALSE;
	$sql = 'SELECT * FROM users WHERE email = :email';
	$stmt = $pdo->prepare($sql);
	$stmt->execute(['email' => $email]);
	if (!($current_user = $stmt->fetch(PDO::FETCH_ASSOC)))
	{
		// echo "No such user\n";
		return NULL;
	}
	return ($current_user);
}

function auth_user($user, $passwd)
{
	if (empty($user) || empty($passwd))
		return FALSE;

	if ($user['passwd'] === hash('whirlpool', $passwd))
		return TRUE;
	return FALSE;
}

?>
