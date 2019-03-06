<?php

include_once "2_view/upload.view.php";
include_once "1_models/images.model.php";


function upload_photo()
{
	if (isset($_FILES['file']))
	{
		$user_id = $_SESSION['id'];
//		$login = $_SESSION['user'];

		// File properties
		$file = $_FILES['file'];
		$file_name = $file['name'];
		$file_tmp = $file['tmp_name'];
		$file_size = $file['size'];
		$file_error = $file['error'];

		// Work out the file extentions
		$file_ext = explode('.', $file_name);
		$file_ext = strtolower(end($file_ext));
		$allowed = array('jpg', 'png', 'jpeg');

		if (!($file_name || $file_tmp || $file_size || $file_ext))
		{
			fatal_error();
			return FALSE;
		}

//		if (empty($description))
//		{
//			add_description();
//			return FALSE;
//		}

		if (!in_array($file_ext, $allowed))
		{
			file_type();
			return FALSE;
		}

		if ($file_error !== 0)
		{
			upload_file_error();
			return FALSE;
		}

		if ($file_size >= 7000000)
		{
			file_size();
			return FALSE;
		}

		$file_name_new = uniqid($_SESSION['id'] . '_U', true) . '.' . $file_ext;
		$file_destination = 'Uploads/upl' . $file_name_new;
		if (!move_uploaded_file($file_tmp, $file_destination))
		{
			move_error();
			return FALSE;
		}

		if (!add_photo($user_id, $file_name_new))
		{
			upload_error();
			return FALSE;
		}
		upload_success();
		return TRUE;
	}
}

if (array_key_exists('upload', $_POST) && $_POST['upload'] === "Upload")
{
//	upload_post($_POST['upload_desc']);
	upload_photo();
}


if (isset($_SESSION['user']) && isset($_SESSION['id']))
{
	show_upload();
}

else if (empty($_SESSION['user']) || empty($_SESSION['id']))
{
	header('Location: index.php');
}

?>

