// (function() {

    var del_class = document.getElementsByClassName('delete');

    // for (var i = 0; i < del_class.length; i++) {
    //     del_class[i].addEventListener('click', get_id, false);
    // }

    function get_id() {
        var del_id = this.id;
        delete_from_front(del_id);
        // delete_from_back(del_id);
        send_id(del_id);
    }

    function delete_from_front(del_id) {
        if (confirm("Do you want to delete this post?")) {
            console.log('Delete: OK');

            var parent_div = document.getElementById(del_id).parentNode;
            parent_div.remove();
        }
        else {
            console.log('Delete: Cancel');
        }
    }

    function send_id(del_id) {
        var formData = new FormData();
        formData.append('post_id', del_id);

        fetch('/api.php?action=del_post', {
            method: 'POST',
            body: formData,
        }).then(response => {
            response.text().then((text) => console.log(text));
            console.log(response)
        });
    }




// })();

/* ARTEM */
function delete_post_n(post_id) {
    if (confirm("Do you want to delete this post?")) {
        console.log('Delete: OK');
        console.log("I deleted post №" + post_id);

        document.getElementById('post_' + post_id).remove();
        // delete_from_front("delete" + post_id);
        send_id(post_id)
    }

    else {
        console.log('Delete: Cancel');
    }
}