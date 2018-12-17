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
</nav>


<?php
	}
