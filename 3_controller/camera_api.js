// (function() {
    var video = document.getElementById('video');
    var canvas = document.getElementById('canvas');
    var context = canvas.getContext('2d');
    var photo = document.getElementById('photo');
    var photo_field = document.getElementById('selected_photo');

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
		alert("Couldn't connect to your camera, check device settings!");
		// error.code
	});

// Take photo from video stream
	document.getElementById('capture').addEventListener('click', function() {

	    document.getElementById('continue').style.visibility = 'visible';

		context.save();
    	context.scale(-1,1);
		context.drawImage(video, 0, 0, 400 * -1, 300);
		context.restore();

// Manipulate the canvas
		photo.src = canvas.toDataURL('image/png');
		photo_field.value = photo.src;
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
        photo_field.value = this.src;
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

    var sticker_overlay = document.getElementById('sticker_overlay');
    var sticker_parent = document.getElementById('flex_sticker');

    var form_fields = {
        'id': document.getElementById('sticker_id'),
        'x': document.getElementById('sticker_coord_x'),
        'y': document.getElementById('sticker_coord_y'),
    };

    function unselect_all_stickers() {
        for (let sticker_index = 0; sticker_index < sticker_parent.children.length; sticker_index++) {
            sticker_parent.children[sticker_index].classList.remove("selected");
        }
    }

    function select_sticker() {
        // sticker_overlay.src = this.children[0].src;
        form_fields['id'].value = this.id;
        unselect_all_stickers();
        this.className += " selected";
    }

    function unselect_sticker() {
        sticker_overlay.src = "";
        form_fields['id'].value = null;
        unselect_all_stickers();
        this.className += " selected";
    }

    sticker_parent.children[0].onclick = unselect_sticker;
    for (let sticker_index = 1; sticker_index < sticker_parent.children.length; sticker_index++) {
        sticker_parent.children[sticker_index].onclick = select_sticker;
    }

    function put_sticker(e) {
        // console.log(e.clientX - e.target.x);
        // console.log(e.clientY - e.target.y);

        if (!form_fields['id'].value) {
            console.log("Sticker not selected");
            return;
        }

        if (!photo_field.value) {
            console.log("Image not selected");
            return;
        }

        var original_photo = new Image();
        original_photo.src = photo_field.value;

        context.save();
        context.drawImage(original_photo, 0, 0, photo.width, photo.height);

        var img = new Image();
        img.src = '/img/stickers/' + form_fields['id'].value + '.png';

        const HEIGHT = 100;
        const WIDTH = 100;
        context.drawImage(
            img,
            e.clientX - e.target.x - WIDTH / 2, // x
            e.clientY - e.target.y - HEIGHT / 2, // y
            WIDTH, //width
            HEIGHT, //height
        );
        context.restore();

        photo.src = canvas.toDataURL('image/png');

        form_fields['x'].value = e.clientX - e.target.x - WIDTH / 2;
        form_fields['y'].value = e.clientY - e.target.y - HEIGHT / 2;
    }

    photo.addEventListener('click', put_sticker);

    function get_form_values() {
        console.log(form_fields['id'].value);
        console.log(form_fields['x'].value);
        console.log(form_fields['y'].value);
        console.log(photo_field.value);
    }

    // function add_sticker() {
    //
    //
    //
    //     // Here you are
    //
    //     fetch('/sticker_overlay.control.php?action=save_img', {
    //         method: 'POST',
    //         body: formData,
    //     }).then(response => {
    //         response.text().then((text) => console.log(text));
    //         console.log(response)
    //     });
    // }

	document.getElementById('continue').addEventListener('click', send_file);
// })();
