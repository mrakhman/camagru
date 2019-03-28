<?php
if (isset($_SESSION['user']) && isset($_SESSION['id']))
{
?>
	<ul class="menu">
		<li class="dropdown">
			<a class="dropbtn" href="index.php"> Home </a>
		</li>
		<li class="dropdown">
			<a class="dropbtn" href="camera.php"> New image </a>
		</li>
		<li class="dropdown">
			<a class="dropbtn" href="my_profile.php"> My profile </a>
		</li>
		<li class="dropdown">
			<a href="#" class="dropbtn"> Settings </a>
			<div class="dropdown-content">
				<a href="change_passwd.php"> Change password </a>
                <a href="change_login.php"> Change login </a>
                <a href="change_email.php"> Change email </a>
                <a href="change_notification.php"> Change notifications </a>
			</div>
		</li>
	</ul>


<?php
}

else if (empty($_SESSION['user']) || empty($_SESSION['id']))
{
?>
	<ul class="menu">
		<li class="dropdown">
			<a class="dropbtn" href="index.php"> Home </a>
		</li>
	</ul>

<?php
}
