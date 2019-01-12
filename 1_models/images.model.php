<?php
include_once "config/database.php";

function add_post($user_id, $file_name, $description, $login)
{
	global $pdo;

	if (empty($user_id) || empty($login) || empty($file_name) || empty($description))
		return FALSE;

	$sql = 'INSERT INTO posts(user_id, file_name, description, author) VALUES(:user_id, :file_name, :description, :login)';
	$stmt = $pdo->prepare($sql);
	$stmt->execute(['user_id' => $user_id, 'file_name' => $file_name, 'description' => $description, 'login' => $login]);
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

// function show_other($user_id)
// {

// }

