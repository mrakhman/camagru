<?php

include_once "1_models/images.model.php";

function all_posts()
{
	$posts = show_all_posts();

	if (!($posts))
	{
		echo "Huyushki";
		return FALSE;
	}

    echo '<div class="responsive">';
	$i = 0;
	while (array_key_exists($i, $posts) && $posts[$i])
    {
        echo '<div class="gallery_container">
			<img src="Uploads/' . $posts[$i]['file_name'] . '" width="300">
			<p class="desc">' . $posts[$i]['description'] . '</p>
			<p class="date">' . $posts[$i]['created_at'] . '</p>
		</div>';
        $i++;
    }
    echo '</div>';
	return TRUE;
}




//if (isset($_SESSION['user']) && isset($_SESSION['id']))
//{
    all_posts();
//}

//else if (empty($_SESSION['user']) || empty($_SESSION['id']))
//{
//	header('Location: index.php');
//}

?>