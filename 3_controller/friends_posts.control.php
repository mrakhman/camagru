<?php

include_once "1_models/images.model.php";
include_once "1_models/users.model.php";

function friends_posts()
{
	$posts = show_other_posts($_SESSION['id']);
	if (!($posts))
	{
		echo "Huyushki";
		return FALSE;
	}

    echo '<div class="responsive">';
	$i = 0;
	while (array_key_exists($i, $posts) && $posts[$i])
    {
        $user_id = $posts[$i]['user_id'];
        $user_login = get_login_by_id($user_id);
        echo '<div class="gallery_container">
			<img src="Uploads/' . $posts[$i]['file_name'] . '" width="300">
			<p class="nick">' . $user_login['login'] . '</p>
			<p class="desc">' . $posts[$i]['description'] . '</p>
			<p class="date">' . $posts[$i]['created_at'] . '</p>
		</div>';
        $i++;
    }
    echo '</div>';
	return TRUE;
}

if (isset($_SESSION['user']) && isset($_SESSION['id']))
{
    friends_posts();
}

else if (empty($_SESSION['user']) || empty($_SESSION['id']))
{
	header('Location: index.php');
}

