<?php
if (isset($_SESSION['user']) && isset($_SESSION['id']))
{
?>
	<ul class="menu">
		<li class="dropdown">
			<a class="dropbtn" href="index.php"> Home </a>
		</li>
		<li class="dropdown">
			<a class="dropbtn" href="upload.php"> New image </a>
		</li>
		<li class="dropdown">
			<a class="dropbtn" href="my_profile.php"> My profile </a>
		</li>
		<li class="dropdown">
			<a href="#" class="dropbtn"> My account </a>
			<div class="dropdown-content">
				<a href="change_passwd.php"> Settings </a>
				<a href=""> Nothing </a>
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
