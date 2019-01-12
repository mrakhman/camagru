(function() {
	var video = document.getElementById('video');
	var	canvas = document.getElementById('canvas');
	var	context = canvas.getContext('2d');
	var photo = document.getElementById('photo');

	navigator.getMedia = (
		navigator.getUserMedia || 
		navigator.webkitGetUserMedia || 
		navigator.mozGetUserMedia || 
		navigator.msGetUserMedia
		);

// Turn on the video stream
	navigator.getMedia(
	{
		video: true,
		audio: false
	},
	
	function(stream) {
		try {
			video.srcObject = stream;
		}
		catch (error) {
			video.src = vendorUrl.createObjectURL(stream);
		}
		video.play();
	},

	function(error) {
		alert("An error occured, pray!");
		// error.code
	});

// Take photo from video stream
	document.getElementById('capture').addEventListener('click', function() {
		context.save();
    	context.scale(-1,1);
		context.drawImage(video, 0, 0, 400 * -1, 300);
		context.restore();

// Manipulate the canvas
		photo.setAttribute('src', canvas.toDataURL('image/png'));

	});

	document.getElementById('continue').addEventListener('click', function() {

// Sending file to server
		var formData = new FormData();
		formData.append('file', canvas.toDataURL('image/png'));
		formData.append('file_type', 'base64');

// Uploading a file
		fetch('/42_mrakhman_mamp/camagru/3_controller/save_image_api.control.php', {
			method: 'POST',
			body: formData,
		}).then(response => console.log(response));

	});
})();
