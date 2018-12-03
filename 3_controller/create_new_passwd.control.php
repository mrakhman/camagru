<?PHP

if ($_POST['submit'] === "OK")
{
	include "../config/database.php";
	include "../1_models/users.model.php";

	$selector = $_POST['selector'];
	$validator = $_POST['validator'];
	$passwd = $_POST['passwd'];
	$conf_passwd = $_POST['conf_passwd'];

	if (empty($passwd) || empty($conf_passwd))
	{
		header('Location: ../create_new_passwd.php?error=empty_passwd');
		exit();
	}

	if (!($passwd === $conf_passwd))
	{
		header('Location: ../create_new_passwd.php?error=confirm_password_error');
		exit();
	}

	if (!(get_passreset_array_selector($selector)))
	{
		header('Location: ../create_new_passwd.php?error=no_matches');
		exit();
	}

	if (!(is_passreset_token_valid($selector, $validator)))
	{
		header('Location: ../create_new_passwd.php?error=invalid_link');
		exit();
	}

	else if (is_passreset_token_valid($selector, $validator))
	{
		if (reset_user_passwd($selector, $passwd))
		{
			header('Location: ../create_new_passwd.php?passwd_reset=success');
		}
	}

}

else
{
	header('Location: ../index.php');
}