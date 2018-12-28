<?php

function fatal_error()
{
	echo '<p class="error"> Choose file </p>';
}

function add_description()
{
	echo '<p class="error"> Choose file again and add description </p>';
}

function file_type()
{
	echo '<p class="error"> Upload only .jpg / .jpeg / .png </p>';
}

function upload_file_error()
{
	echo '<p class="error"> Uploading error </p>';
}

function file_size()
{
	echo '<p class="error"> File size must be less than 7 Gb </p>';
}

function move_error()
{
	echo '<p class="error"> Could not move </p>';
}

function upload_error()
{
	echo '<p class="error"> Could not upload :( </p>';
}

function upload_success()
{
	echo '<p class="success"> Uploaded! </p>';
}

function show_upload()
{
?>

	<form method="post" enctype="multipart/form-data">
		<input type="file" name="file"><br><br>
		Not empty!<br>
		<input type="text" class="input" name="upload_desc" placeholder="Add description..."><br> 
		<input type="submit" class="button" name="upload" value="Upload">
	</form>

<?php
}