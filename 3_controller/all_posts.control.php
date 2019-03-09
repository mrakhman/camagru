<?php

include_once "1_models/images.model.php";

function all_posts($user_id)
{
	$posts = show_other_posts($user_id);

	if (!($posts))
	{
		echo "Huyushki";
		return FALSE;
	}

	$i = 0;
	while (array_key_exists($i, $posts) && $posts[$i])
	{
		echo '<div class="responsive">
			<div class="gallery_container">
			<a href="#">
				<img src="Uploads/' . $posts[$i]['file_name'] . '" width="300">
			</a>
			<p class="desc">' . $posts[$i]['description'] . '</p>
			<p class="date">' . $posts[$i]['created_at'] . '</p>
		</div></div>';
		$i++;
	}
	return TRUE;
}


if (isset($_SESSION['user']) && isset($_SESSION['id']))
{
    all_posts($_SESSION['id']);
}

else if (empty($_SESSION['user']) || empty($_SESSION['id']))
{
	header('Location: index.php');
}

?>