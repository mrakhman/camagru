<?PHP

if ($_POST['submit'] === "OK")
{
	include "../config/database.php";
	include "../1_models/users.model.php";

	session_start();

	$login = $_SESSION['user'];
	$new_email = $_POST['new_email'];
	$passwd = $_POST['passwd'];
	
	$user = get_user_by_login($login);
	$old_email = $user['email'];

	// Error handlers

	if (empty($new_email) || empty($passwd))
	{
		// echo "Empty input field(s)\n";
		header('Location: ../my_account.php?error=email_empty_input');
		exit();
	}

	
	if (!($user))
	{
		// echo "User doesn't exist\n";
		header('Location: ../my_account.php?error=email_user_not_found');
		exit();
	}

	if (!(auth_user($user, $passwd)))
	{
		// echo "Wrong password\n";
		header('Location: ../my_account.php?error=email_wrong_passwd');
		exit();
	}

	if ($new_email == $old_email)
	{
		// echo "Old and new email can't be the same\n";
		header('Location: ../my_account.php?error=same_email');
		exit();
	}

	if (!(change_email($old_email, $new_email)))
	{
		// echo "sql error\n";
		header('Location: ../my_account.php?error=email_sql_error');
		exit();
	}

	else
	{
		// echo "Login successfully changed!\n";
		header('Location: ../my_account.php?change_email=ok');
	}

}

else
{
	header('Location: ../index.php');
}

?>
