<?PHP

if ($_POST['submit'] === "OK")
{
	include "../config/database.php";
	include "../1_models/users.model.php";

	session_start();

	$old_login = $_SESSION['user'];
	$new_login = $_POST['new_login'];
	$passwd = $_POST['passwd'];

	// Error handlers

	if (empty($new_login) || empty($passwd))
	{
		// echo "Empty input field(s)\n";
		header('Location: ../my_account.php?error=login_empty_input');
		exit();
	}

	$user = get_user_by_login($old_login);
	if (!($user))
	{
		// echo "User doesn't exist\n";
		header('Location: ../my_account.php?error=login_user_not_found');
		exit();
	}

	if (!(auth_user($user, $passwd)))
	{
		// echo "Wrong password\n";
		header('Location: ../my_account.php?error=login_wrong_passwd');
		exit();
	}

	if ($new_login == $old_login)
	{
		// echo "Old and new login can't be the same\n";
		header('Location: ../my_account.php?error=same_login');
		exit();
	}

	if (!(change_login($old_login, $new_login)))
	{
		// echo "sql error\n";
		header('Location: ../my_account.php?error=login_sql_error');
		exit();
	}

	else
	{
		// echo "Login successfully changed!\n";
		header('Location: ../my_account.php?change_login=ok');
		$_SESSION['user'] = $new_login;
	}

}

else
{
	header('Location: ../index.php');
}

?>
