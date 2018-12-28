<?php
	if (isset($_SESSION['user']) && isset($_SESSION['id']))
	{
?>


<nav class="menu">
	<div class="dropdown">
		<a class="dropbtn" href="upload.php"> New image </a>
	</div>
	<div class="dropdown">
		<a class="dropbtn" href="my_profile.php"> My profile </a>
	</div>
	<div class="dropdown">
		<button class="dropbtn"> My account </button>
		<div class="dropdown-content">
			<a href="change_passwd.php"> Settings </a>
			<a href=""> Nothing </a>
		</div>
	</div>
	
</nav>


<?php
	}
