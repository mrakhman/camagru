<?php
include_once "2_view/camera.view.php";

function show_stickers()
{
    $directory = "img/stickers/";
    $stickers = glob($directory . "*.png");
    foreach ($stickers as $sticker) {
        echo '<div class="sticker" id="' . basename($sticker, ".png") . '">
                <img src="' . $sticker. '" height="100" />
              </div>' . "\n";
    }
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
