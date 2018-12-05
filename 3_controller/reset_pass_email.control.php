<?PHP

if ($_POST['submit'] === "OK")
{
	include "../config/database.php";
	include "../1_models/users.model.php";

	$email = $_POST['email'];

	if (empty($email))
	{
		header('Location: ../passwd_reset.php?error=empty_email');
		exit();
	}
	$passwd_reset = create_passreset_token($email);
	if (!$passwd_reset)
	{
		header('Location: ../passwd_reset.php?error=wrong_email');
		exit();
	}

	if (!(send_passreset_email($email, $passwd_reset)))
	{
		header('Location: ../passwd_reset.php?error=send_email_fail');
		exit();
	}
	else
	{
		header('Location: ../passwd_reset.php?reset_passwd=success');
	}

}

else
{
	header('Location: ../index.php');
}
