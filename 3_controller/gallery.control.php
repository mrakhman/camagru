<?php

include_once "2_view/gallery.view.php";
include_once "1_models/images.model.php";

function gallery($user_id)
{
	$posts = show_my_posts($user_id);

	if (!($posts))
	{
		echo "Huyushki";
		return FALSE;
	}

	echo ''
	return TRUE;
}


if (isset($_SESSION['user']) && isset($_SESSION['id']))
{
	//show_gallery();
	gallery($_SESSION['id']);
}

else if (empty($_SESSION['user']) || empty($_SESSION['id']))
{
	header('Location: index.php');
}

?>