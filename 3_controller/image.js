(function() {

    var del_class = document.getElementsByClassName('delete');

    // for (var i = 0; i < del_class.length; i++) {
    //     del_class[i].addEventListener('click', get_id, false);
    // }

    // function get_id() {
    //     var del_id = this.id;
    //     delete_from_front(del_id);
    //     // delete_from_back(del_id);
    //     send_id(del_id);
    // }

    // function delete_from_front(del_id) {
    //     if (confirm("Do you want to delete this post?")) {
    //         console.log('Delete: OK');
    //
    //         var parent_div = document.getElementById(del_id).parentNode;
    //         parent_div.remove();
    //     }
    //     else {
    //         console.log('Delete: Cancel');
    //     }
    // }

    function send_id(action, post_id) {
        var formData = new FormData();
        formData.append('post_id', post_id);

        fetch('/api.php?action=' + action, {
            method: 'POST',
            body: formData,
        }).then(response => {
            response.text().then((text) => console.log(text));
            console.log(response)
        });
    }

    // This function is executed in my_profile.control.php in html delete element
    function delete_post_n(post_id) {
        if (confirm("Do you want to delete this post?")) {
            console.log('Delete: OK');
            console.log("I deleted post №" + post_id);

            document.getElementById('post_' + post_id).remove();
            // delete_from_front("delete" + post_id);
            send_id('del_post', post_id);
        }
        else {
            console.log('Delete: Cancel');
        }
    }

    function like_post(post_id) {
        function onclick_handler() {
            var like = document.getElementById('like_' + post_id);

            like.src = 'img/icons/heart_red.png';
            like.onclick = unlike_post(post_id);

            send_id('like_post', post_id);
        }
        return onclick_handler;
    }

    function unlike_post(post_id) {
        function onclick_handler() {
            var like = document.getElementById('like_' + post_id);

            like.src = 'img/icons/heart_white.png';
            like.onclick = like_post(post_id);

            send_id('unlike_post', post_id);
        }
        return onclick_handler;
    }



})();
