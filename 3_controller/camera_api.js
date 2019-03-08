(function() {
    // Turning the whole file into a function prevents it from being edited by user
    // This function is not accessible from html page. Comment function initialization for debugging

    var video = document.getElementById('video');
    var canvas = document.getElementById('canvas');
    var context = canvas.getContext('2d');
    var photo = document.getElementById('photo');
    var photo_field = document.getElementById('selected_photo');
    // var choose_file = document.getElementById('choose_file');

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
	},	function camera_error() {
	    video.remove();
        document.getElementById('capture').style.visibility = 'hidden';
		alert("Couldn't connect to your camera, check device settings. \n If you can't use your camera, use 'Upload my photo' button");
		// error.code
	});

	// Take photo from video stream
	document.getElementById('capture').addEventListener('click', function() {
	    /* Next line makes 'Continue' visible. Now it's disabled - #939393 color button instead */
	    // document.getElementById('continue').style.visibility = 'visible';
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
        /* Do not let save img with 'disabled' attribute.
        ** Implemented here 'document.getElementById('continue').addEventListener('click', send_file)'
        */

        // Sending file to server
        var formData = new FormData();
        formData.append('file', photo_field.value);
        // formData.append('file', photo.src);
        formData.append('file_type', 'base64');
        formData.append('sticker_id', form_fields['id'].value);
        formData.append('sticker_coord_x', form_fields['x'].value);
        formData.append('sticker_coord_y', form_fields['y'].value);
        formData.append('sticker_coord_y', form_fields['y'].value);
        formData.append('description', document.getElementById('txtArea').value);

        // Uploading a file
        // This part is supported by api.php and save_image_api.control.php
        fetch('/api.php?action=build_post', {
            method: 'POST',
            body: formData,
        }).then(response => {
            response.text().then((text) => console.log(text));
            console.log(response)
        });
    }



    document.getElementById('choose_file').addEventListener('change', drawUploadedPhoto);

    // function drawUploadedPhoto(e) {
    //     photo.src = URL.createObjectURL(e.target.files[0]);
    //     photo.onload = function() {
    //         context.drawImage(photo, 0, 0, 400, 0);
    //     };
    //     photo_field.value = photo.src;
    //
    //     /* Next line makes 'Continue' visible. Now it's disabled - #939393 color button instead */
    //     // document.getElementById('continue').style.visibility = 'visible';
    // }

    function drawUploadedPhoto(e) {
        photo.src = URL.createObjectURL(e.target.files[0]);
        // photo_field.value = photo.src;

        // 1. Get file content
        // 2. Draw it on canvas
        // 3. Make canvas.toDataURL(png) -> photo_field.value
        function getBase64(file) {
            var reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = function () {
                console.log(reader.result);
                photo_field.value = reader.result;
            };
            reader.onerror = function (error) {
                console.log('Error: ', error);
            };
        }

        getBase64(e.target.files[0]);
        /* Next line makes 'Continue' visible. Now it's disabled - #939393 color button instead */
        // document.getElementById('continue').style.visibility = 'visible';
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

    // for CSS selected sticker

    sticker_parent.children[0].onclick = unselect_sticker;

    for (let sticker_index = 1; sticker_index < sticker_parent.children.length; sticker_index++) {
        sticker_parent.children[sticker_index].onclick = select_sticker;
    }

    function put_sticker(e) {
        // console.log(e.clientX - e.target.x);
        // console.log(e.clientY - e.target.y);

        if (!photo_field.value) {
            alert("Take photo with camera or upload from your files");
            console.log("Image not selected");
            return;
        }

        if (!form_fields['id'].value) {
            // alert("Select sticker to apply");
            document.getElementById('continue').style.backgroundColor = '#939393';
            // document.getElementById('continue').setAttribute('disabled', 'disabled');
            continue_disability(true);
            console.log("Sticker not selected");
            photo.src = photo_field.value;
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
            WIDTH, // width
            HEIGHT, // height
        );
        context.restore();

        photo.src = canvas.toDataURL('image/png');
        document.getElementById('continue').style.backgroundColor = '#396';
        // document.getElementById('continue').removeAttribute('disabled');
        continue_disability(false);

        form_fields['x'].value = e.clientX - e.target.x - WIDTH / 2;
        form_fields['y'].value = e.clientY - e.target.y - HEIGHT / 2;
    }

    photo.addEventListener('click', put_sticker);

  /*   // Function for debugging
    function get_form_values() {
        console.log(form_fields['id'].value);
        console.log(form_fields['x'].value);
        console.log(form_fields['y'].value);
        console.log(photo_field.value);
    } */

    /* function add_sticker() {



        // Here you are

        fetch('/sticker_overlay.control.php?action=save_img', {
            method: 'POST',
            body: formData,
        }).then(response => {
            response.text().then((text) => console.log(text));
            console.log(response)
        });
    } */


    /* Text area symbol counter */
    function count_symbols() {
        var txt_len = document.getElementById('txtArea').value.length;
        document.getElementById('textarea_count').innerHTML = 200 - txt_len;
    }
    document.getElementById('txtArea').addEventListener('keyup', count_symbols);


    // if (document.getElementById('continue').disabled === false) {
    //     console.log("HELLO1");
    //     document.getElementById('continue').addEventListener('click', send_file);
    // }
    continue_disability(true);

    function continue_disability(status) {
        const continue_button = document.getElementById('continue');
        if (status)
        {
            continue_button.disabled = true;
            continue_button.removeEventListener('click', send_file);
        }
        else
        {
            continue_button.disabled = false;
            continue_button.addEventListener('click', send_file);
        }
        console.log("CONTINUE STATUS: " + status);
    }
})();
