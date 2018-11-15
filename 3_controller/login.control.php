<?PHP

if ($_POST['submit'] === "OK")
{
	include "../config/database.php";
	include "../1_models/users.model.php";

	$login = $_POST['login'];
	$passwd = $_POST['passwd'];

	if (empty($login) || empty($passwd))
	{
		echo "Empty input field(s)\n";
		header('Location: ooops.php?error=empty_input');
		exit();
	}

	session_start();
	$session_user = get_user_by_login($login);
	if (!($session_user))
	{
		echo "User doesn't exist\n";
		header('Location: ooops.php?error=user_not_found');
		exit();
	}

	if (!(auth_user($session_user, $passwd)))
	{
		$_SESSION['user'] = "";
		echo "Wrong password\n";
		header('Location: ooops.php?error=wrong_passwd');
		exit();
	}

	$_SESSION['user'] = $session_user;
	echo "User successfully logged in!\n";
	header('Location: success.php?login=' . $session_user['login']);
}

// Send user back to index.php page in case he wants to get to login.php page from URL
else
{
	header('Location: ../index.php');
}

?>
