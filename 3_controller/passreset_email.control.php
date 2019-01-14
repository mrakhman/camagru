<?PHP

include_once "1_models/users.model.php";
include_once "2_view/passreset_email.view.php";

function passreset_email($email)
{
	if (empty($email))
	{
		empty_input_passreset();
		return FALSE;
	}

	$passwd_reset = create_passreset_token($email);

	if (!$passwd_reset)
	{
		wrong_email();
		return FALSE;
	}

	if (!(send_passreset_email($email, $passwd_reset)))
	{
		send_email_fail();
		return FALSE;
	}

	reset_passwd_success();
	return TRUE;
}

if (array_key_exists('reset', $_POST) && $_POST['reset'] === "OK")
{
	$email = $_POST['email'];

	if (passreset_email($email))
		exit();
}

show_form_reset_email();
