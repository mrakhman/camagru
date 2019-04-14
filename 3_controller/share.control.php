<?php

function show_share($path)
{
?>
    <div id="share_media" class="flex_share_col">
        <div class="flex_share_row" id="share_fb">
            <div class="fb-share-button" data-href="<?php $path ?>" data-layout="button" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>
        </div>
        <div class="flex_share_row" id="share_vk">
            <script type="text/javascript">
                document.write(VK.Share.button({
                    url: 'https://camagru.ml:8443/my_profile.php',
                    title: 'Shared post from Camagru 42 project',
                    image: '<?=$path ?>'},
                    {type: 'round_nocount', text: 'Share'}
                    ));
                // type="round_nocount", text="Share"
            </script>
        </div>
    </div>

<?php
}

