<?php

include_once "2_view/camera.view.php";

if (isset($_SESSION['user']) && isset($_SESSION['id']))
{
	show_camera();
}

else if (empty($_SESSION['user']) || empty($_SESSION['id']))
{
	header('Location: index.php');
}


// function save_img_api()
// {
// 	$user_id = $_SESSION['id'];
// 	$body = $_POST['file'];

// 	if (empty($body) || empty($user_id))
// 	{
// 		echo "oooops";
// 		return FALSE;
// 	}

// // Trim off encoding string
// 	$prefix = strpos($body, ',') + strlen(',');
// 	$data = substr($body, $prefix);

// // Decode into binary image
// 	$image = base64_decode($data);

// // Write image to file
// 	$file_name = uniqid('0' . $_SESSION['id'] . '_', true) . '.png';
// 	file_put_contents('../Uploads/' . $file_name , $image);

// 	if (!save_image($user_id, $file_name))
// 	{
// 		echo '<p class="error"> Could not upload :( </p>';
// 		return FALSE;
// 	}
// 		return TRUE;
// }

// save_img_api();
