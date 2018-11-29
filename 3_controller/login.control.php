<?PHP

// dont forget to firbid login for not activated user

if ($_POST['submit'] === "OK")
{
	include "../config/database.php";
	include "../1_models/users.model.php";

	$login = $_POST['login'];
	$passwd = $_POST['passwd'];

	if (empty($login) || empty($passwd))
	{
		// echo "Empty input field(s)\n";
		header('Location: ../index.php?error=empty_input');
		exit();
	}

	session_start();
	$user_login = get_user_by_login($login);

	if (!($user_login))
	{
		// echo "User doesn't exist\n";
		header('Location: ../index.php?error=user_not_found');
		exit();
	}

	if (!(auth_user($user_login, $passwd)))
	{
		// echo "Wrong password\n";
		header('Location: ../index.php?error=auth_fail');
		exit();
	}

	/* Final case for the correct login, passd.
	** I put 'else if' instead of just 'else' because I want to check if it aslo equals to 'true'
	** even though password check (auth_user) is a boolean and just equals to 'true' or 'false'.
	** Just in case auth_user could be a srting or a number that is not 'true' or 'false' I want
	** to make sure that I don't login user with just 'else' statement.
	** [https://www.youtube.com/watch?v=LC9GaXkdxF8]
	*/

	else if (auth_user($user_login, $passwd))
	{
		$_SESSION['user'] = $login;
		// echo "User successfully logged in!\n";
		header('Location: ../index.php?login=' . $login);
	}
}

// Send user back to index.php page in case he wants to get to login.php page from URL
else
{
	header('Location: ../index.php');
}

?>
