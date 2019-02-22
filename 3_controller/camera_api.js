(function() {
    var video = document.getElementById('video');
    var canvas = document.getElementById('canvas');
    var context = canvas.getContext('2d');
    var photo = document.getElementById('photo');

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
	},	function error() {
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

    function send_file() {

// Sending file to server
        var formData = new FormData();
        formData.append('file', photo.src);
        formData.append('file_type', 'base64');

// Uploading a file
        // This part is supported by api.php and save_image_api.control.php
        fetch('/api.php?action=save_img', {
            method: 'POST',
            body: formData,
        }).then(response => {
            response.text().then((text) => console.log(text));
            console.log(response)
        });

    }

    function select_from_preview() {
        photo.src = this.src;
    }

    function count_pre() {
        var count = document.getElementById('preview').childElementCount;
        return(count);
    }

    function add_preview() {
        var main_div = document.createElement('div');
        main_div.className = 'responsive';

        var gallery_container = document.createElement('div');
        gallery_container.className = 'preview_container';

        var a = document.createElement('a');
        a.href = '#';

        var img = document.createElement('img');
        img.width = 200;
        img.src = canvas.toDataURL('image/png');
        img.onclick = select_from_preview;

        document.getElementById('preview').appendChild(main_div);
        main_div.appendChild(gallery_container);
        gallery_container.appendChild(a);
        a.appendChild(img);

        var count = count_pre();
        if (count > 4) {
            document.getElementById('preview').children[0].remove();
        }
    }

    function add_sticker() {
        document.getElementById('sticker_1');
        // Here you are
    }

	document.getElementById('continue').addEventListener('click', send_file);
})();