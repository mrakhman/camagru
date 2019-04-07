(function() {
    // Turning the whole file into a function prevents it from being edited by user
    // This function is not accessible from html page. Comment function initialization for debugging

    var video = document.getElementById('video');
    var canvas = document.getElementById('canvas');
    var context = canvas.getContext('2d');
    var photo = document.getElementById('photo');
    var photo_field = document.getElementById('selected_photo');

    const MAX_HEIGHT = 400;
    const MAX_WIDTH = 400;

    const STICKER_HEIGHT = 100;
    const STICKER_WIDTH = 100;

    // navigator.getMedia = (
	// 	// navigator.getUserMedia ||
	// 	navigator.webkitGetUserMedia ||
	// 	// navigator.mozGetUserMedia ||
    //         navigator.mediaDevices.getUserMedia ||
	// 	navigator.msGetUserMedia
	// 	);

    let constraints = {
        video: true,
        audio: false
    };
    // Turn on the video stream
    navigator.mediaDevices.getUserMedia(constraints).then(function(stream) {
		// try {
			video.srcObject = stream;
		// }
		// catch (error) {
		// 	// video.src = vendorUrl.createObjectURL(stream);
		// }
		video.play();
	}).catch(function camera_error() {
	    video.remove();
        document.getElementById('capture').style.visibility = 'hidden';
		// alert("Couldn't connect to your camera, check device settings. \n If you can't use your camera, use 'Upload my photo' button");
		// error.code
	});

	// Take photo from video stream
	document.getElementById('capture').addEventListener('click', function() {
	    /* Next line makes 'Continue' visible. Now it's disabled - #939393 color button instead */
	    // document.getElementById('continue').style.visibility = 'visible';

        canvas.height = video.height;
        canvas.width = video.width;

		context.save();
    	context.scale(-1,1);
		context.drawImage(video, 0, 0, 400 * -1, 300);
		context.restore();

        // Manipulate the canvas
		photo.src = canvas.toDataURL('image/png');
		photo.width = canvas.width;
		photo.height = canvas.height;
		photo_field.value = photo.src;
        add_preview();
        put_sticker_at(form_fields['x'].value, form_fields['y'].value, form_fields['id'].value);
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
        formData.append('description', document.getElementById('description').value);

        // Uploading a file
        // This part is supported by api.php and save_image_api.control.php
        fetch('/api.php?action=build_post', {
            method: 'POST',
            body: formData,
        }).then(response => {
            response.text().then((text) => console.log(text));
            console.log(response);
            window.location.href = "/my_profile.php";
        });


    }



    document.getElementById('choose_file').addEventListener('change', drawUploadedPhoto);

    function drawUploadedPhoto(e) {
        // 1. Get file content
        // 2. Draw it on canvas
        // 3. Make canvas.toDataURL(png) -> photo_field.value

        console.log("Creating IMG from data");
        const file_img = new Image();
        file_img.src = URL.createObjectURL(e.target.files[0]);

        file_img.onload = () =>
        {
            console.log("Uploaded img: " + file_img.width + 'x' + file_img.height);
            console.log("We are going to draw this data on canvas");

            if (file_img.height >= file_img.width)
            {
                canvas.width = file_img.height > MAX_HEIGHT ? (file_img.width * MAX_HEIGHT) / file_img.height : file_img.width;
                canvas.height = file_img.height > MAX_HEIGHT ? MAX_HEIGHT : file_img.width;
            }
            else
            {
                canvas.width = file_img.width > MAX_WIDTH ? MAX_WIDTH : file_img.width;
                canvas.height = file_img.width > MAX_WIDTH ? (file_img.height * MAX_WIDTH) / file_img.width : file_img.height;
            }

            context.save();
            context.drawImage(file_img, 0, 0, canvas.width, canvas.height);
            context.restore();

            // Manipulate the canvas
            photo.src = canvas.toDataURL('image/png');
            photo.width = canvas.width;
            photo.height = canvas.height;
            photo_field.value = photo.src;
            // add_preview();
            put_sticker_at(form_fields['x'].value, form_fields['y'].value, form_fields['id'].value);
        }
    }


    function select_from_preview() {
        photo.src = this.src;

        photo.width = video.width;
        photo.height = video.height;
        canvas.width = video.width;
        canvas.height = video.height;

        photo_field.value = this.src;
        put_sticker_at(form_fields['x'].value, form_fields['y'].value, form_fields['id'].value);
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
        // a.href = '';

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
        put_sticker_at(form_fields['x'].value, form_fields['y'].value, form_fields['id'].value);
        if (photo_field.value)
            enable_continue();
    }

    function unselect_sticker() {
        sticker_overlay.src = "";
        form_fields['id'].value = null;
        unselect_all_stickers();
        this.className += " selected";
        photo.src = photo_field.value ? photo_field.value : photo.src;
        disable_continue();
    }

    // for CSS selected sticker

    sticker_parent.children[0].onclick = unselect_sticker;

    for (let sticker_index = 1; sticker_index < sticker_parent.children.length; sticker_index++) {
        sticker_parent.children[sticker_index].onclick = select_sticker;
    }

    function put_sticker_at(pos_x, pos_y, sticker_id)
    {
        if (sticker_id === '' || sticker_id == null || !photo_field.value)
            return;
        const original_photo = new Image();
        original_photo.src = photo_field.value;

        context.save();
        context.drawImage(original_photo, 0, 0, original_photo.width, original_photo.height);

        var img = new Image();
        img.src = '/img/stickers/' + sticker_id + '.png';


        context.drawImage(
            img,
            pos_x, // x
            pos_y, // y
            STICKER_WIDTH, // width
            STICKER_HEIGHT, // height
        );
        context.restore();

        photo.src = canvas.toDataURL('image/png');
        enable_continue();
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
            // document.getElementById('continue').style.backgroundColor = '#939393';
            // document.getElementById('continue').setAttribute('disabled', 'disabled');
            disable_continue();
            console.log("Sticker not selected");
            photo.src = photo_field.value;
            return;
        }

        // var pos_x = e.clientX - e.target.x - STICKER_WIDTH / 2;
        // var pos_y = e.clientY - e.target.y - STICKER_HEIGHT / 2;
        var pos_x = e.offsetX - STICKER_WIDTH / 2;
        var pos_y = e.offsetY - STICKER_HEIGHT / 2;
        put_sticker_at(pos_x, pos_y, form_fields['id'].value);
        // document.getElementById('continue').style.backgroundColor = '#396';
        // document.getElementById('continue').removeAttribute('disabled');
        enable_continue();

        form_fields['x'].value = pos_x;
        form_fields['y'].value = pos_y;
    }

    photo.addEventListener('click', put_sticker);


    /* Text area symbol counter */
    function count_symbols() {
        var txt_len = document.getElementById('description').value.length;
        document.getElementById('textarea_count').innerHTML = 200 - txt_len;
    }
    document.getElementById('description').addEventListener('keyup', count_symbols);


    function continue_disability(status) {

        const continue_button = document.getElementById('continue');
        if (status)
        {
            // continue_button.disabled = true;
            continue_button.classList.add('disabled');
            continue_button.removeEventListener('click', send_file);
        }
        else
        {
            // continue_button.disabled = false;
            continue_button.classList.remove('disabled');
            continue_button.addEventListener('click', send_file);
        }
        console.log("CONTINUE STATUS: " + status);
    }

    function enable_continue() {
        continue_disability(false);
    }

    function disable_continue() {
        continue_disability(true);
    }

    disable_continue();

})();
