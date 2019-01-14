<?php
function show_camera()
{

?>
	<div class="camera">
		<video id="video" width="400" height="300"></video>
		<a href="#" id="capture" class="button" onClick="action();"> Click </a>
		<canvas id="canvas" width="400" height="300"></canvas>
		<img id="photo" src="HIDE/krevetka.jpg" width="400" alt="photo of you">
	</div>
	<a href="#" id="continue" class="button"> Continue </a>

	<script>
		document.getElementById('continue').style.visibility = 'hidden';
	    function action() {
	            document.getElementById('continue').style.visibility = 'visible';
	        }
	</script>
    <script src="3_controller/camera_api.js"></script>

<?php
}

function upload_error()
{
	echo '<p class="error"> Could not upload :( </p>';
}

