<?php
	if (isset($_SESSION['user']) && isset($_SESSION['id']))
	{
?>


<nav class="menu">
	<div class="dropdown">
		<button class="dropbtn"> My account </button>
		<div class="dropdown-content">
			<a href="change_passwd.php"> Settings </a>
			<a href=""> Nothing </a>
		</div>
	</div>
	<div class="dropdown">
		<a class="dropbtn" href="upload.php"> New image </a>
	</div>
</nav>


<?php
	}
