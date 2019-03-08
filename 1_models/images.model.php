<?php
include_once "config/database.php";

//function add_photo($user_id, $image_name)
//{
//	global $pdo;
//
//	if (empty($user_id) || empty($image_name))
//		return FALSE;
//
//	$sql = 'INSERT INTO images(user_id, image_name) VALUES(:user_id, :image_name)';
//	$stmt = $pdo->prepare($sql);
//	$stmt->execute(['user_id' => $user_id, 'image_name' => $image_name]);
//	return TRUE;
//}


function add_post($user_id, $file_name, $description)
{
    global $pdo;
    if (empty($user_id) || empty($file_name) || empty($description))
        return FALSE;
    $sql = 'INSERT INTO posts(user_id, file_name, description) VALUES(:user_id, :file_name, :description)';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['user_id' => $user_id, 'file_name' => $file_name, 'description' => $description]);
    return TRUE;
}


function show_my_posts($user_id)
{
	global $pdo;

	if (empty($user_id))
		return FALSE;

	$sql = 'SELECT * FROM posts WHERE user_id = :user_id ORDER BY created_at DESC';
	$stmt = $pdo->prepare($sql);
	$stmt->execute(['user_id' => $user_id]);
	// if (!($stmt->fetch(PDO::FETCH_ASSOC)))
	// 	return NULL;

	$i = 0;
	$my_posts[$i] = array();
	while ($my_post = $stmt->fetch(PDO::FETCH_ASSOC))
	{
		$my_posts[$i] = $my_post;
		$i++;
	}
	return ($my_posts);
}

function show_previews($user_id)
{
	global $pdo;

	if (empty($user_id))
		return array();

	$sql = 'SELECT * FROM images WHERE user_id = :user_id';
	$stmt = $pdo->prepare($sql);
	$stmt->execute(['user_id' => $user_id]);

	$i = 0;
	$previews[$i] = array();
	while ($preview = $stmt->fetch(PDO::FETCH_ASSOC))
	{
		$previews[$i] = $preview;
		$i++;
	}
	return ($previews);
}

// function show_other($user_id)
// {

// }


