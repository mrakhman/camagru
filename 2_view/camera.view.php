<?php
function show_camera()
{

?>
	<div class="camera">
		<video id="video" width="400" height="300"></video>
		<a href="#" id="capture" class="button"> Take photo </a>
		<canvas id="canvas" width="400" height="300"></canvas>
		<img id="photo" src="HIDE/krevetka.jpg" width="400" alt="photo of you">
	</div>

<?php
}
