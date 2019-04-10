<?php
include_once "config/database.php";

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
	$message = "Welcome to Camagru! Click the link to verify your email: https://camagru.ml:8443/activation.php?email=" . $email . "&token=" . $token;
	$headers = 'From: mrakhman@student.42.fr' . "\r\n" . 'Reply-To: mrakhman@student.42.fr' . "\r\n";
	if (mail($to, $subject, $message, $headers))
		return TRUE;
	else
		return FALSE;
}

function get_user_by_changed_email($new_email)
{
    global $pdo;

    if (empty($new_email))
        return FALSE;

    $sql = 'SELECT * FROM change_email WHERE new_email = :new_email';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['new_email' => $new_email]);
    if (!($current_user = $stmt->fetch(PDO::FETCH_ASSOC)))
    {
        // echo "No such user\n";
        return NULL;
    }
    return ($current_user);
}

function change_email_final()
{
    global $pdo;

    $sql = 'UPDATE users INNER JOIN change_email
            ON users.id = change_email.user_id
            SET users.email = change_email.new_email';
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return TRUE;
}

function activate_user($email, $token)
{
	global $pdo;

	if (empty($email) || empty($token))
		return FALSE;

	$check_user = get_user_by_email($email);
    $check_new_email = get_user_by_changed_email($email);
	if (!$check_user && !$check_new_email)
		return FALSE;

	if ($check_user['token'] !== $token && $check_new_email['token'] !== $token)
		return FALSE;
    if ($check_user)
    {
        $sql = 'UPDATE users SET is_confirmed = 1 WHERE token = :token';
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['token' => $token]);
        return TRUE;
    }

    if ($check_new_email)
    {
        $sql = 'UPDATE change_email SET is_confirmed = 1 WHERE token = :token';
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['token' => $token]);
        change_email_final();
        return TRUE;
    }

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

function get_user_by_id($id)
{
    global $pdo;

    if (empty($id))
        return FALSE;
    $sql = 'SELECT * FROM users WHERE id = :id';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
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

//function change_email($old_email, $new_email)
//{
//	global $pdo;
//
//	if (empty($old_email) || empty($new_email))
//		return FALSE;
//
//	$sql = 'UPDATE users SET email = :new_email WHERE email = :old_email';
//	$stmt = $pdo->prepare($sql);
//	$stmt->execute(['new_email' => $new_email, 'old_email' => $old_email]);
//	return TRUE;
//}


function change_email_first($user_id, $new_email)
{
    global $pdo;

    if (empty($user_id) || empty($new_email))
        return FALSE;

    // Create token
    $token = str_shuffle("qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM0123456789");
    $token = substr($token, 0, 10);
    $is_confirmed = 0;

    // send email
    if (!(send_email($new_email, $token)))
        return FALSE;

    $sql = 'REPLACE INTO change_email(user_id, new_email, token, is_confirmed) VALUES(:user_id, :new_email, :token, :is_confirmed)';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['new_email' => $new_email, 'user_id' => $user_id, 'token' => $token, 'is_confirmed' => $is_confirmed]);
    return TRUE;
}


function create_passreset_token($email)
{
	global $pdo;

	if (empty($email))
		return FALSE;

	if (!($user = get_user_by_email($email)))
		return FALSE;

	$user_id = $user['id'];

	$token = str_shuffle("qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM0123456789");
	$token = substr($token, 0, 32);
	$expires = time() + (2 * 60 * 60);

	$sql = 'REPLACE INTO passreset(user_id, token, expires) VALUES(:user_id, :token, :expires)';
	$stmt = $pdo->prepare($sql);
	$passreset = array('user_id' => $user_id, 'token' => $token, 'expires' => $expires);
	if ($stmt->execute($passreset))
	{
		return $passreset;
	}
	return FALSE;
}

function send_passreset_email($email, $reset_array)
{
	if (empty($email))
		return FALSE;

	$token = $reset_array['token'];

	$to = $email;
	$subject = "Camagru - forgot password";
	$message = "Click the link to reset your password: ";
	$message .= "https://camagru.ml:8443/create_new_passwd.php?token=" . $token;
	$headers = 'From: mrakhman@student.42.fr' . "\r\n" . 'Reply-To: mrakhman@student.42.fr' . "\r\n";
	if (mail($to, $subject, $message, $headers))
		return TRUE;
	else
		return FALSE;
}

function get_passreset_array($token)
{
	global $pdo;

	if (empty($token))
		return FALSE;

	$expires = time();

	$sql = 'SELECT * FROM passreset WHERE token = :token AND expires >= :expires';
	$stmt = $pdo->prepare($sql);
	$stmt->execute(['token' => $token, 'expires' => $expires]);
	$reset_array = $stmt->fetch(PDO::FETCH_ASSOC);
	if (!$reset_array)
	{
		return NULL;
	}
	return $reset_array;
}

function reset_user_passwd($user_id, $passwd)
{
	global $pdo;

	if (empty($user_id) || empty($passwd))
		return FALSE;

	$passwd = hash('whirlpool', $passwd);

	$sql = 'UPDATE users SET passwd = :passwd WHERE id = :user_id';
	$stmt = $pdo->prepare($sql);

	// $stmt returns TRUE or FALSE and I store it in $result to return later
	$result = $stmt->execute(['user_id' => $user_id, 'passwd' => $passwd]);
	$sql = 'DELETE FROM passreset WHERE user_id = :user_id';
	$stmt = $pdo->prepare($sql);
	$stmt->execute(['user_id' => $user_id]);
	return $result;
}

function get_login_by_id($user_id)
{
    global $pdo;

    if (empty($user_id))
        return FALSE;

    $sql = 'SELECT login FROM users WHERE id = :user_id';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['user_id' => $user_id]);
    if (!($user_login = $stmt->fetch(PDO::FETCH_ASSOC)))
        return NULL;

    return ($user_login);
}

function get_notifications_status($user_id)
{
    global $pdo;

    if (empty($user_id))
        return FALSE;

    $sql = 'SELECT notifications FROM users WHERE id = :user_id';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['user_id' => $user_id]);
    if (!($notifications = $stmt->fetch(PDO::FETCH_ASSOC)))
        return NULL;

    return ($notifications);
}

function notifications_on($user_id)
{
    global $pdo;

    if (empty($user_id))
        return FALSE;

    $status = get_notifications_status($user_id);
    if ($status['notifications'] == 1)
        return TRUE;

    $sql = 'UPDATE users SET notifications = 1 WHERE id = :user_id';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['user_id' => $user_id]);
    return TRUE;
}


function notifications_off($user_id)
{
    global $pdo;

    if (empty($user_id))
        return FALSE;

    $status = get_notifications_status($user_id);
    if ($status['notifications'] == 0)
        return TRUE;

    $sql = 'UPDATE users SET notifications = 0 WHERE id = :user_id';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['user_id' => $user_id]);
    return TRUE;
}