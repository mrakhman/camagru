<?PHP
include_once "1_models/users.model.php";
include_once "2_view/login.view.php";

function login_user($login, $passwd)
{
	if (empty($login) || empty($passwd))
	{
		empty_input_login();
		return FALSE;
	}

	$user = get_user_by_login($login);

	if (!($user))
	{
		user_not_found_login();
		return FALSE;
	}

	if ($user['is_confirmed'] !== 1)
	{
		not_confirmed();
		return FALSE;
	}

	if (!(auth_user($user, $passwd)))
	{
		auth_fail();
		return FALSE;
	}

	else if (auth_user($user, $passwd))
	{
		$_SESSION['user'] = $user['login'];
		$_SESSION['id'] = $user['id'];
		return TRUE;
	}
}

if (array_key_exists('log_in', $_POST) && $_POST['log_in'] === "OK")
{
	$login = $_POST['username'];
	$passwd = $_POST['passwd'];
	login_user($login, $passwd);
	header('Location: index.php');
}

if ((empty($_SESSION['user']) || $_SESSION['user'] == "") && empty($_SESSION['id']))
{
	// echo '<p class="login_status"> You are logged out </p>';
	show_form_login();
}

else if (isset($_SESSION['user']) && isset($_SESSION['id']))
{
	echo '<p class="login_status"> Hello, ' . $_SESSION['user'] . '! </p>';
}

?>
