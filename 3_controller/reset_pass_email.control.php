<?PHP

if ($_POST['submit'] === "OK")
{
	include "../config/database.php";
	include "../1_models/users.model.php";

	$email = $_POST['email'];

	if (empty($email))
	{
		header('Location: ../passwd_reset.php?error=empty_input');
		exit();
	}

	if (!(reset_passwd_db($email)))
	{
		header('Location: ../passwd_reset.php?error=wrong_email');
		exit();
	}

	if (!(reset_passwd_email($email)))
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
