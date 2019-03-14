<?php

include_once "1_models/images.model.php";

function gallery($user_id)
{
    $session_id = $_SESSION['id'];
	$posts = show_my_posts($user_id);

	if (!$posts)
	{
		echo "Huyushki";
		return FALSE;
	}

	$i = 0;
    echo '<div class="responsive">';
	while (array_key_exists($i, $posts) && $posts[$i])
    {
			echo '<div class="gallery_container" id="post_' . $posts[$i]['id'] . '">
			<img src="Uploads/' . $posts[$i]['file_name'] . '" width="300">
			<p class="desc">' . $posts[$i]['description'] . '</p>
			<p class="date">' . $posts[$i]['created_at'] . '</p>';

        if ($session_id == $posts[$i]['user_id'])
        {
            echo '<a href="#" class="delete" onclick="delete_post_n('. $posts[$i]['id'] .')" align="right">Delete</a>';
        }
        echo '</div>';
        $i++;
    }
    echo '</div>';
	return TRUE;
}



if (isset($_SESSION['user']) && isset($_SESSION['id']))
{
	gallery($_SESSION['id']);
}

else if (empty($_SESSION['user']) || empty($_SESSION['id']))
{
	header('Location: index.php');
}

?>