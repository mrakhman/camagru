<?php
//include_once "camera.php";

include_once "1_models/images.model.php";

//function add_sticker() // ($sticker_id, $user_id)
//{
//    $STICKER_DIMENSIONS = 100;
//    $sticker = imagecreatefrompng('img/stickers/queen1.png');
//    imagealphablending($sticker, true);
//    imagesavealpha($sticker, true);
//
//    $photo = imagecreatefrompng('Uploads/4_5c23e70a47d794.11054613.png');
//    imagealphablending($photo, true);
//    imagesavealpha($photo, true);
//
//    $w_sticker = imagesx($sticker);
//    $h_sticker = imagesy($sticker);
////    $w_photo = imagesx($photo);
////    $h_photo = imagesy($photo);
//
//    imagecopyresampled($photo, $sticker, 0, 0, 0, 0, $STICKER_DIMENSIONS, $STICKER_DIMENSIONS, $w_sticker, $h_sticker);
//
//    $result = imagepng($photo, 'img.png');
//    if (!$result)
//        return False;
//    imagedestroy($photo);
//    imagedestroy($sticker);
//    return True;
//
//}



function generate_filename($user_id)
{
    $file_name = uniqid('0' . $user_id . '_', true) . '.png';
    return $file_name;
}

function render_image($sticker_id, $sticker_coord_x, $sticker_coord_y, $selected_photo, $filename)
{
    if (empty($sticker_id) || empty($sticker_coord_x) || empty($sticker_coord_y) || empty($selected_photo)|| empty($filename))
    {
        echo "build_post parameters missing";
        return FALSE;
    }

    $sticker_path = 'img/stickers/' . $sticker_id . '.png';

    $STICKER_DIMENSIONS = 100;
    $sticker = @imagecreatefrompng($sticker_path);
    if (!$sticker) {
        echo "Sticker ";
        return FALSE;
    }
    imagealphablending($sticker, true);
    imagesavealpha($sticker, true);

    $photo = imagecreatefromstring($selected_photo);
    if (!$photo) {
        echo "Photo ";
        return FALSE;
    }
    imagealphablending($photo, true);
    imagesavealpha($photo, true);

    $w_sticker = imagesx($sticker);
    $h_sticker = imagesy($sticker);

    imagecopyresampled($photo, $sticker, $sticker_coord_x, $sticker_coord_y, 0, 0, $STICKER_DIMENSIONS, $STICKER_DIMENSIONS, $w_sticker, $h_sticker);

    $result = imagepng($photo, './Uploads/' . $filename);
    if (!$result)
    {
        echo "Result ";
        return FALSE;
    }
    imagedestroy($photo);
    imagedestroy($sticker);
    return TRUE;
}

// Right now if description is missing - post is uploaded anyway, OK

function build_post()
{
    $user_id = $_SESSION['id'];
    $body = $_POST['file'];
    $sticker_id = $_POST['sticker_id'];
    $sticker_coord_x = $_POST['sticker_coord_x'];
    $sticker_coord_y = $_POST['sticker_coord_y'];
    $description = $_POST['description'];

    if (empty($body) || empty($user_id))
    {
        echo "oooops";
        return FALSE;
    }

    // Trim off encoding string
    $prefix = strpos($body, ',') + strlen(',');
    $data = substr($body, $prefix);

    // Decode into binary image
    $selected_photo = base64_decode($data);

    // Call file name function and render image function
    $filename = generate_filename($user_id);
    $result = render_image($sticker_id, $sticker_coord_x, $sticker_coord_y, $selected_photo, $filename);

    if (!$result)
    {
        echo 'error';
        return FALSE;
    }

    if (!add_post($user_id, $filename, $description))
    {
        echo '<p class="error"> Could not upload :( </p>';
        return FALSE;
    }
    echo $filename;
    return TRUE;
}






/*

 ========== FRONT PART =====
1. assign id for each sticker
2. apply onClick functions on each sticker
3. when certain sticker is selected (get the id, and the src -> address on server)
4. send the sticker's info to the back end (use json file)
========== BACKEND PART =======
5. trim the json file received from the front, find the location of the sticker (inside of your folder local path)
6. merge the sticker into the base image (check PHP gd lib)
7. save the merged image to a folder which is accessible from public
8. send the info of merged image back to the front (use json file)
========= FRONT PART ==========
9. trim the json file received from the back (get the address on server)
10. display merged images by the address you have got
11. let user select the image he/she wants to publish (onclick or HTML checkbox)
12. PUBLISH send selected image info to the back (json)
======== BACKEND PART ======
13. trim json
14. INSERT image path to database
15. load your view with your model
*/