<?php
function show_camera()
{

?>
	<div class="camera">
		<video id="video" width="400" height="300"></video>
		<a href="#" id="capture" class="button"> Click </a>
		<canvas id="canvas" width="400" height="300"></canvas>
        <div class="photo_container">
            <img id="photo" src="img/icons/krevetka.jpg" width="400" alt="photo of you">

            <img id="sticker_overlay" src="">
        </div>
	</div>

<!--    <a href="#" id="continue" class="button" style="visibility: hidden;"> Continue </a>-->
<?php
}
