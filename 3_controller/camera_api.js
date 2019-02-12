(function() {
    const video = document.getElementById('video');
    const canvas = document.getElementById('canvas');
    const context = canvas.getContext('2d');
    const photo = document.getElementById('photo');

    navigator.getMedia = (
		navigator.getUserMedia || 
		navigator.webkitGetUserMedia || 
		navigator.mozGetUserMedia || 
		navigator.msGetUserMedia
		);

// Turn on the video stream
	navigator.getMedia({
		video: true,
		audio: false
	},	function(stream) {
		// try {
			video.srcObject = stream;
		// }
		// catch (error) {
		// 	// video.src = vendorUrl.createObjectURL(stream);
		// }
		video.play();
	},	function(error) {
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
		photo.src = canvas.toDataURL('image/png');
		add_preview();

	});

    const send_file = function() {

// Sending file to server
        const formData = new FormData();
        formData.append('file', photo.src);
        formData.append('file_type', 'base64');

// Uploading a file
        fetch('/api.php?action=post_img', {
            method: 'POST',
            body: formData,
        }).then(response => {
            response.text().then((text) => console.log(text));
            console.log(response)
        });

    };

    const select_from_preview = function () {
        photo.src = this.src;
    };

    const add_preview = function() {
        const main_div = document.createElement('div');
        main_div.className = 'responsive';

        const gallery_container = document.createElement('div');
        gallery_container.className = 'preview_container';

        const a = document.createElement('a');
        a.href = '#';

        const img = document.createElement('img');
        img.width = 200;
        img.src = canvas.toDataURL('image/png');
        img.onclick = select_from_preview;

        a.appendChild(img);
        gallery_container.appendChild(a);
        main_div.appendChild(gallery_container);
        document.getElementById('preview').appendChild(main_div);
};

    // Add function to have no more than 4 previews at a time and change first with last


	document.getElementById('continue').addEventListener('click', send_file);
})();
