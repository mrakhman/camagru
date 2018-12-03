<?php
include "../config/database.php";

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

	if ($check_user)
		return FALSE;
	
	// Create token
	$token = str_shuffle("qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM0123456789");
	$token = substr($token, 0, 10);

	// send email
	if (!(send_email($email, $token)))
		return FALSE;

	// Create user
	$passwd = hash('whirlpool', $passwd);
	$sql = 'INSERT INTO users(login, email, token, passwd) VALUES(:login, :email, :token, :passwd)';
	$stmt = $pdo->prepare($sql);
	$stmt->execute(['login' => $login, 'email' => $email, 'token' => $token, 'passwd' => $passwd]);
	return TRUE;
}

function send_email($email, $token)
{
	if (empty($email) || empty($token))
		return FALSE;

	$to = $email;
	$subject = "Camagru - confirm your email";
	$message = "Welcome to Camagru! Click the link to verify your email: http://localhost:8080/42_mrakhman_mamp/camagru/activation.php?email=" . $email . "&token=" . $token;
	$headers = 'From: mrakhman@student.42.fr' . "\r\n" . 'Reply-To: mrakhman@student.42.fr' . "\r\n";
	if (mail($to, $subject, $message, $headers))
		return TRUE;
	else
		return FALSE;
}

function activate_user($email, $token)
{
	global $pdo;

	if (empty($email) || empty($token))
		return FALSE;

	$check_user = get_user_by_email($email);
	if (!($check_user))
		return FALSE;

	if ($check_user['token'] !== $token)
		return FALSE;

	$sql = 'UPDATE users SET is_confirmed = 1 WHERE token = :token';
	$stmt = $pdo->prepare($sql);
	$stmt->execute(['token' => $token]);
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

	if (($user['passwd'] === hash('whirlpool', $passwd)) && $user['is_confirmed'] === 1)
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

function is_script_input($str)
{
		if (preg_match("/(<script>)/", $str))
			return TRUE;
		else
			return FALSE;
}

// function secure_passwd($passwd)
// {
		// if (strlen($passwd) < 8)
		// 	return FALSE;
		// if (preg_match(pattern, subject))
// }

function create_passreset_token($email)
{
	global $pdo;

	if (empty($email))
		return FALSE;

	if (!(get_user_by_email($email)))
		return FALSE;

	// Clean table before inserting data in case user changes password 2 times in a row
	$sql = 'DELETE FROM passreset WHERE email = :email';
	$stmt = $pdo->prepare($sql);
	$stmt->execute(['email' => $email]);

	// Create token && selector (instead of email)
	$selector = str_shuffle("qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM0123456789");
	$token = str_shuffle("qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM0123456789");
	$selector = substr($selector, 0, 8);
	$token = substr($token, 0, 32);
	
	$expires = date("U") + 1800;
	$token = hash('whirlpool', $token);

	$sql = 'INSERT INTO passreset(email, selector, token, expires) VALUES(:email, :selector, :token, :expires)';
	$stmt = $pdo->prepare($sql);
	$stmt->execute(['email' => $email, 'selector' => $selector, 'token' => $token, 'expires' => $expires]);
	return TRUE;
}

function get_passreset_array_email($email)
{
	global $pdo;

	if (empty($email))
		return FALSE;

	$sql = 'SELECT * FROM passreset WHERE email = :email';
	$stmt = $pdo->prepare($sql);
	$stmt->execute(['email' => $email]);
	if (!($reset_array = $stmt->fetch(PDO::FETCH_ASSOC)))
	{
		return NULL;
	}
	return ($reset_array);
}

function send_passreset_email($email)
{
	if (empty($email))
		return FALSE;

	$reset_array = get_passreset_array_email($email);
	$selector = $reset_array['selector'];
	$token = $reset_array['token'];

	$to = $email;
	$subject = "Camagru - forgot password";
	$message = "Click the link to reset your password: http://localhost:8080/42_mrakhman_mamp/camagru/create_new_passwd.php?selector=" . $selector . "&validator=" . $token;
	$headers = 'From: mrakhman@student.42.fr' . "\r\n" . 'Reply-To: mrakhman@student.42.fr' . "\r\n";
	if (mail($to, $subject, $message, $headers))
		return TRUE;
	else
		return FALSE;
}

function get_passreset_array_selector($selector)
{
	global $pdo;

	if (empty($selector))
		return FALSE;

	$expires = date("U");

	$sql = 'SELECT * FROM passreset WHERE selector = :selector AND expires >= :expires';
	$stmt = $pdo->prepare($sql);
	$stmt->execute(['selector' => $selector, 'expires' => $expires]);
	if (!($reset_array = $stmt->fetch(PDO::FETCH_ASSOC)))
	{
		return NULL;
	}
	return ($reset_array);
}

function is_passreset_token_valid($selector, $validator)
{
	if (empty($selector) || empty($validator))
		return FALSE;

	$reset_array = get_passreset_array_selector($selector);

	if (($reset_array['validator'] === hash('whirlpool', $validator)))
		return TRUE;
	return FALSE;
}

function reset_user_passwd($selector, $passwd)
{
	global $pdo;

	if (empty($selector))
		return FALSE;

	$reset_array = get_passreset_array_selector($selector);
	$reset_email = $reset_array['email'];
	$passwd = hash('whirlpool', $passwd);

	$sql = 'SELECT * FROM users WHERE email = :reset_email';
	$stmt = $pdo->prepare($sql);
	if ($stmt->execute(['reset_email' => $reset_email]))
	{
		$sql = 'UPDATE users SET passwd = :passwd WHERE email = :email';
		$stmt = $pdo->prepare($sql);
		$stmt->execute(['email' => $email, 'passwd' => $passwd]);
		return TRUE;
	}
}

?>
