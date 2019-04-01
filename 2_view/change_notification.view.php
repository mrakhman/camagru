<?php

    function notification_user_not_found()
    {
        echo '<p class="error"> User does not exist </p>';
    }

	function notification_enabled()
	{
		echo '<p class="success"> Notification are enabled! </p>';
	}

	function notification_disabled()
	{
		echo '<p class="success"> Notification are disabled! </p>';
	}

	function show_notification($is_checked)
	{
?>
		<h3>Change notifications</h3>
		<form method="post">
			<h>Notify me about</h><br>
            <h>new comments to my posts:</h><br>
            <input type="hidden" name="notification_check" value="not_notify"/>
            <input type="checkbox" name="notification_check" value="notify" <?php echo $is_checked; ?>>
			<br>
			<input type="submit" class="button" name="notifications_submit" value="OK"/>
		</form>

<?php
	}