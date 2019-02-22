<?php
include_once "2_view/camera.view.php";

function show_stickers()
{
    echo '<div class="flex_sticker">';
    $directory = "img/stickers/";
    $stickers = glob($directory . "*.png");
    $id_text = 'sticker_';
    $id_n = 1;
    foreach ($stickers as $sticker) {
        echo '<div class="sticker" id="' . $id_text.$id_n . '">
                <img src="' . $sticker. '" height="100"/>
              </div>';
        $id_n++;
    }
    echo '</div>';
    return TRUE;
}

if (isset($_SESSION['user']) && isset($_SESSION['id']))
{
    show_stickers();
}

else if (empty($_SESSION['user']) || empty($_SESSION['id']))
{
	header('Location: index.php');
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