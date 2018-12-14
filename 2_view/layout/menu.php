<?php
	if (isset($_SESSION['user']) && isset($_SESSION['id']))
	{
?>


<nav class="menu">
	<div class="dropdown">
		<button class="dropbtn"> My account </button>
		<div class="dropdown-content">
			<a href="my_account.php"> Change email </a>
			<a href="my_account.php"> Change username </a>
			<a href="my_account.php"> Change password </a>
		</div>
	</div>
</nav>


<?php
	}
