// (function() {
    /* I can not turn on outer function here because it interrupts with php-js function call
     * Like in friends_posts.control.php and my_profile.control.php
     */

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

    function send_id(action_name, post_id) {
        var formData = new FormData();
        formData.append('post_id', post_id);

        fetch('/api.php?action=' + action_name, {
            method: 'POST',
            body: formData,
        });
        //     .then(response => {
        //     response.text().then((text) => console.log(text));
        //     console.log(response)
        // });
    }

    // This function is executed in my_profile.control.php in html delete element
    function delete_post_n(post_id) {
        if (confirm("Do you want to delete this post?")) {
            // console.log('Delete: OK');
            // console.log("I deleted post №" + post_id);

            document.getElementById('post_' + post_id).remove();
            send_id('del_post', post_id);
        }
        // else {
        //     console.log('Delete: Cancel');
        // }
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

    /* Comment area symbol counter and send button activator - disactivator */
    function count_symbols(event) {
        // console.log(event);
        var txt_len = event.target.value.length;
        // console.log("Len: " + txt_len);
        var all_children = event.target.parentNode.children;
        all_children.comment_count.innerHTML = 255 - txt_len;
        if (txt_len > 0) {
            if (!all_children.btn_comment.classList.contains("active"))
                all_children.btn_comment.classList.add("active");
        }
        else {
            all_children.btn_comment.classList.remove("active");
        }
    }

    function send_comment(post_id, comment) {
        var formData = new FormData();
        formData.append('post_id', post_id);
        formData.append('comment', comment);

        fetch('/api.php?action=comment_post', {
            method: 'POST',
            body: formData,
        });
        // .then(response => {
        //     response.text().then((text) => console.log(text));
        //     console.log(response)
        // });
    }

    // function remove_text(event) {
    //     var txt = event.target.value;
    //     txt = "";
    // }


    /* Prevent default in necessary to mute initial form submit function to allow function add_comment work.
     * Otherwise both initial form submit and add_comment will send data
     */
    function add_comment(event) {
        // console.log(event);
        event.preventDefault();
        var form_values = {};
        var current_form = event.target;
        for (var i in Array.from(current_form))
        {
            form_values[current_form[i].id] = current_form[i].value;
        }
        // console.log(form_values);

        send_comment(form_values['post_id'], form_values['comment']);
        current_form.comment.value = "";
        frontend_instant_comment(form_values['post_id'], form_values['comment']);
        // current_form.response_field.innerHTML = "comment sent, refresh the page to see";

    }

    /* Get all comment forms from document and add actions on form submit and on keyup */
    var comment_forms = Array.from(document.getElementsByClassName('comment_form'));
    for (var id in comment_forms) {
        comment_forms[id].onsubmit = add_comment;
        comment_forms[id].comment.addEventListener('keyup', count_symbols);
    }

    /* Function is executed from friends_posts.control.php file */
    function hide_show_comments(post_id) {
        // var all_children = document.getElementById('post_' + post_id).children;
        // var x = all_children.show_comments;
        //#post_30 > div
        var x = document.querySelector("#post_" + post_id + " > div.show_comments");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }

    function frontend_instant_comment(post_id, comment) {
        // var comment = event.target.value;
        // var all_children = event.target.parentNode.children;
        // var show_comments = all_children.show_comments;
        // var show_comments_children = show_comments.childNodes;
        var comments_array = document.querySelector("#post_" + post_id + " > div.show_comments > div.comments_array");
        var p = document.createElement('p');
        p.classList.add("comment_display");
        p.align = "left";
        p.innerHTML = "<b>You say:</b> " + comment;
        comments_array.appendChild(p);
        // console.log(show_comments_children);
    }

// })();