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

function show_continue()
{

?>
	<form method="post">
<!-- 		Not empty!<br>
		<input type="text" class="input" name="upload_desc" placeholder="Add description..."><br> -->
		<input type="submit" class="button" name="continue" value="Continue">
	</form>
	<!-- <a href="#" id="continue" class="button"> Continue </a> -->
<?php
}
