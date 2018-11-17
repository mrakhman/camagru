<?PHP

if ($_POST['submit'] === "OK")
{
	include "../config/database.php";
	include "../1_models/users.model.php";

	session_start();

	$login = $_SESSION['user'];
	$old_passwd = $_POST['old_passwd'];
	$new_passwd = $_POST['new_passwd'];
	$conf_passwd = $_POST['conf_passwd'];

	// Error handlers

	if (empty($old_passwd) || empty($new_passwd) || empty($conf_passwd))
	{
		// echo "Empty input field(s)\n";
		header('Location: ../my_account.php?error=empty_input');
		echo "Empty input field(s)\n";
		exit();
	}

	$session_user = get_user_by_login($login);
	if (!($session_user))
	{
		// echo "User doesn't exist\n";
		header('Location: ../my_account.php?error=user_not_found');
		exit();
	}

	if (!(auth_user($session_user, $old_passwd)))
	{
		// echo "Wrong password\n";
		header('Location: ../my_account.php?error=wrong_passwd');
		exit();
	}

	if (!($new_passwd === $conf_passwd))
	{
		// echo "Confirm password error\n";
		header('Location: ../my_account.php?error=confirm_password_error');
		exit();
	}

	if ($new_passwd == $old_passwd)
	{
		// echo "Old and new passwords can't be the same\n";
		header('Location: ../my_account.php?error=same_passwords');
		exit();
	}

	if (!(change_passwd($login, $new_passwd)))
	{
		// echo "sql error\n";
		header('Location: ../my_account.php?error=sql_error');
		exit();
	}

	else
	{
		// echo "Password successfully changed!\n";
		header('Location: ../my_account.php?change_pass=ok');
	}

}

else
{
	header('Location: ../index.php');
}

?>
