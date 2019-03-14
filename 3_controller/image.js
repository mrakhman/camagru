// (function() {

    var del_class = document.getElementsByClassName('delete');

    for (var i = 0; i < del_class.length; i++) {
        // del_class[i].addEventListener('click', get_id, false);
    }

    function get_id() {
        var del_id = this.id;
        delete_from_front(del_id);
        delete_from_back(del_id)
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

    function delete_from_back(del_id) {

    }




    // function myFunction() {
    //     var txt;
    //     if (confirm("Press a button!")) {
    //         txt = "You pressed OK!";
    //     } else {
    //         txt = "You pressed Cancel!";
    //     }
    //     document.getElementById("demo").innerHTML = txt;
    // }


// })();
function delete_post_n(post_id) {
    console.log("I'm gonna delete post №" + post_id);
    document.getElementById('post_' + post_id).remove();
    // delete_from_front("delete" + post_id);
}