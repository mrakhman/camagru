<?PHP
session_start();
if ($_POST['submit'] === "Yes" || $_POST['submit'] === "Logout")
{
	if (empty($_SESSION['user']))
	{
		echo "You are not logged in";
		exit();
	}
	session_unset();
	session_destroy();
	header('Location: ../index.php');

}

else
{
	header('Location: ../index.php');
}
?>
