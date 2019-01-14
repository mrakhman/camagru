<?php
include_once "config/database.php";

function save_photo($user_id, $image_name)
{
	global $pdo;


	if (empty($user_id) || empty($image_name))
		return FALSE;

	error_log('I"M HERE!');
	$sql = 'INSERT INTO images(user_id, image_name) VALUES(:user_id, :image_name)';
	$stmt = $pdo->prepare($sql);
	$stmt->execute(['user_id' => $user_id, 'image_name' => $image_name]);
	return TRUE;
}


