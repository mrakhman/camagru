
        // var main_div = document.createElement('div');
        // main_div.className = 'responsive';
        //
        // var main_div = document.createElement('div');
        // main_div.className = 'sticker';
        //
        // var a = document.createElement('a');
        // a.href = '#';
        //
        // var img = document.createElement('img');
        var dir = "img/stickers";
        $.ajax({
            // This will retrieve the contents of the folder if the folder is configured as 'browsable'
            url: dir,
            success: function (data) {
                // List all .png file names in the page
                $(data).find("a").attr("href", function (i, val) {
                    if (val.match(/\.png$/)) {
                        $("body").append( "<img src='"+ dir + val +"'>" );
                    }
                });
            }
        });
