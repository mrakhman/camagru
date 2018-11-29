<?PHP

if ($_POST['submit'] === "OK")
{
	include "../config/database.php";
	include "../1_models/users.model.php";

	$email = $_POST['email'];

	if (!(reset_passwd_email($email)))
	{
		header('Location: ../passwd_reset.php?error=passw_reset_error');
		exit();
	}
	else
	{
		header('Location: ../my_account.php?reset_passwd=ok');
	}

}

else
{
	header('Location: ../index.php');
}
