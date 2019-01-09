<?php

$body = $_POST['file'];

// Trim off encoding string

$prefix = strpos($body, ',') + strlen(',');
$data = substr($body, $prefix);

// Decode into binary image
$image = base64_decode($data);

// Write image to file
file_put_contents('../Uploads/' . 'from_cam.png' , $image);

// Tell the client where to find the file
echo 'done';
