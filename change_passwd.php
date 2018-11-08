<?PHP

// Вообще ничего не меняла, это чисто функция из day04


if (isset($_POST[login]) && isset($_POST[oldpw]) && isset($_POST[newpw]) && $_POST[submit] === "OK")
{
	if(!file_exists("../private"))
		mkdir("../private");
	if (!file_exists("../private/passwd"))
		$array = array();
	else
		$array = unserialize(file_get_contents("../private/passwd"));
	$marker = -1;
	foreach ($array as $key => $value)
	{
		if ($_POST[login] === $value[login])
			$marker = $key;
	}
	if ($marker === -1)
	{
		echo "ERROR\n";
	}
	else
	{
		if (hash('whirlpool', $_POST[oldpw]) === $array[$key][passwd])
		{
			$array[$key] = array('login' => $_POST[login], 'passwd' => hash('whirlpool', $_POST[newpw]));
			file_put_contents("../private/passwd", serialize($array));
			echo "OK\n";
			header('Location: index.html');
		}
		else
			echo "ERROR\n";
	}
}
else
	echo "ERROR\n";
?>
