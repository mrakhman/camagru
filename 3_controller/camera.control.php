<?php

include_once "2_view/camera.view.php";
include_once "1_models/users.model.php";

if (isset($_SESSION['user']) && isset($_SESSION['id']))
{
	show_camera();
}

else if (empty($_SESSION['user']) || empty($_SESSION['id']))
{
	header('Location: index.php');
}

?>

<script type="text/javascript">
(function() {
	var video = document.getElementById('video');
	var	canvas = document.getElementById('canvas');
	var	context = canvas.getContext('2d');
	var photo = document.getElementById('photo');
	var	vendorUrl = window.URL || window.webkitURL;

	navigator.getMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia;

	navigator.getMedia({
		video: true, audio: false
	}, function(stream) {
		video.src = vendorUrl.createObjectURL(stream);
		video.play();
	}, function(error) {
		// An error occured
		// error.code
	});

	document.getElementById('capture').addEventListener('click', function() {
		context.drawImage(video, 0, 0, 400, 300);

		// Manipulate the canvas here

		photo.setAttribute('src', canvas.toDataURL('image/png'));
	});
})();
</script>
