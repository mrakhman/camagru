<?PHP
session_start();
if ($_POST['submit'] === "Yes" || $_POST['submit'] === "Logout")
{
	if (empty($_SESSION['user']))
	{
		echo "You are not logged in";
		exit();
	}


	$user = $_SESSION['user'];
	$_SESSION['user'] = "";
	echo "<h3 align='center'> \"" . $user . "\" logged out </h3>\n";
}

else
{
	header('Location: ../index.php');
}
?>
