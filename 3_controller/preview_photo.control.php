<?php

include_once "2_view/gallery.view.php";
include_once "1_models/images.model.php";

function previews($user_id)
{
	$photos = show_previews($user_id);

	if (!$photos)
	{
		echo "Huyushki";
		return FALSE;
	}

	$i = 0;
	while (array_key_exists($i, $photos) && $photos[$i])
	{
		echo '<div class="responsive">
			<div class="gallery_container">
			<a href="#">
				<img src="Uploads/' . $photos[$i]['image_name'] . '" width="200">
			</a>
		</div></div>';
		$i++;
	}
	return TRUE;
}


if (isset($_SESSION['user']) && isset($_SESSION['id']))
{
//	previews($_SESSION['id']);
}

else if (empty($_SESSION['user']) || empty($_SESSION['id']))
{
	header('Location: index.php');
}

?>