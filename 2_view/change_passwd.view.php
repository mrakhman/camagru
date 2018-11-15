	<h3>Change password</h3>
<form method="post" action="3_controller/change_passwd.control.php">
	<h>Login</h><br>
	<input type="text" placeholder="Enter login" name="login"/>
	<br><br>
	<h>Old password</h><br>
	<input type="password" placeholder="Enter password" name="old_passwd"/>
	<br><br>
	<h>New password</h><br>
	<input type="password" placeholder="Enter password" name="new_passwd"/>
	<br>
	<input type="password" placeholder="Repeat password" name="conf_passwd"/>
	<br><br>
	<input type="submit" name="submit" value="OK"/>
</form>
