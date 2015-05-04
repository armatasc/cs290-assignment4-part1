<html>
<body>

	<h3>Please enter a username to be redirected...</h3>

<form action="content1.php" method="POST">
	Username: <input type="text" name="username">
	<input type="submit" value="Login">
</form>

<?php
	session_start();
	
	if(isset($_GET['execute']) && $_GET['execute'] == 'logout') {
		unset($_SESSION['count']);
		unset($_SESSION['username']);
		session_destroy();
	}
?>

</body>
</html>
