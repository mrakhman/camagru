<?php

function create_user($login, $email, $passwd)
{
	if (empty($login) || empty($passwd) || empty($email))
		return FALSE;

	// Check if user login exists
	$user = get_user_by_login($login);
	if ($user)
		return FALSE;

	// // Check if user email
	// $user = get_user_by_email($email);
	// if ($user)
	// 	return FALSE;

	// Create user
	$passwd = hash('whirlpool', $passwd);
	$sql = 'INSERT INTO users(email, login, passwd) VALUES(:email, :login, :passwd)';
	$stmt = $pdo->prepare($sql);
	$stmt->execute(['login' => $login, 'email' => $email, 'passwd' => $passwd]);
	$stmt->close();
	return TRUE;
}


function get_user_by_login($login)
{
	if (empty($login))
		return FALSE;

	// Get user from db by login
	$current_user = array()
	$sql = 'SELECT * FROM users WHERE login = ?';
	$stmt = $pdo->prepare($sql);
	$stmt->execute([$login]);

	$stmt->store_result();
	$stmt->bind_result($current_user['id'], $current_user['login'], $current_user['email'], $current_user['passwd'], $current_user['is_admin']);
	if ($stmt->rowCount() == 0)
	{
		echo "No such user\n"; //
		$stmt->close();
		return NULL;
	}
	$post = $stmt->fetch(); // Put data from row into $user
	$stmt->close();
	return $current_user;	
}


function get_user_by_email($email)
{
	if (empty($email))
		return FALSE;

	// Get user from db by email
	$current_user = array()
	$sql = 'SELECT * FROM users WHERE email = ?';
	$stmt = $pdo->prepare($sql);
	$stmt->execute([$email]);

	$stmt->store_result();
	$stmt->bind_result($current_user['id'], $current_user['login'], $current_user['email'], $current_user['passwd'], $current_user['is_admin']);
	if ($stmt->rowCount() == 0)
	{
		echo "No such user\n"; //
		$stmt->close();
		return NULL;
	}
	$post = $stmt->fetch(); // Put data from row into $user
	$stmt->close();
	return $current_user;	
}