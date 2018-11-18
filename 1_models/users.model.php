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

function change_passwd($login, $new_passwd)
{
	global $pdo;

	if (empty($login) || empty($new_passwd))
		return FALSE;

	$new_passwd = hash('whirlpool', $new_passwd);
	$sql = 'UPDATE users SET passwd = :new_passwd WHERE login = :login';
	$stmt = $pdo->prepare($sql);
	$stmt->execute(['login' => $login, 'new_passwd' => $new_passwd]);
	return TRUE;
}

function change_login($old_login, $new_login)
{
	global $pdo;

	if (empty($old_login) || empty($new_login))
		return FALSE;

	$sql = 'UPDATE users SET login = :new_login WHERE login = :old_login';
	$stmt = $pdo->prepare($sql);
	$stmt->execute(['new_login' => $new_login, 'old_login' => $old_login]);
	return TRUE;
}

function change_email($old_email, $new_email)
{
	global $pdo;

	if (empty($old_email) || empty($new_email))
		return FALSE;

	$sql = 'UPDATE users SET email = :new_email WHERE email = :old_email';
	$stmt = $pdo->prepare($sql);
	$stmt->execute(['new_email' => $new_email, 'old_email' => $old_email]);
	return TRUE;
}

?>
