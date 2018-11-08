<?PHP
include_once '1_models/config/database.php';
include '1_models/users.php';

	session_start();
	if (isset($_POST[login]) && isset($_POST[passwd]))
	{
		$user = get_user($_POST[login]);
		if (auth_user($user, $_POST[passwd]))
		{
			$_SESSION[user] = $user;
			echo "<h3 align='center'> User logged in </h3>\n";
		}
		else
		{
			$_SESSION[user] = "";
			echo "<h3 align='center'> Error </h3>\n";
		}
	}
	else
		echo "<h3 align='center'> Error </h3>\n";
?>
