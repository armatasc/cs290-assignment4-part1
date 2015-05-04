<html>
<body>

<?php
	session_start();
	if(isset($_SESSION)){
		if(isset($_SESSION['username']) && $_POST['username'] != $_SESSION['username']) {
			if($_GET['login'] != 'correct') {
				unset($_SESSION['count']);
				unset($_SESSION['username']);
				session_destroy();
				session_start();
			}
		}
		if(!isset($_SESSION['username']) && isset($_POST['username'])) {
			$_SESSION['username'] = $_POST['username'];
		}
		if(!isset($_SESSION['count'])){
			$_SESSION['count'] = 0;
		} else {
			$_SESSION['count'] += 1;
		}
		echo '<br>Hello '.$_SESSION['username'].', you have visited this page '.$_SESSION['count'].' times before.<br><br>
				  Click <a href="http://web.engr.oregonstate.edu/~armatasc/cs290/assignment4-part1/src/login.php?execute=logout" target="_self">here</a> to logout.<br><br>';
		echo '<a href="http://web.engr.oregonstate.edu/~armatasc/cs290/assignment4-part1/src/content2.php?login=correct" target="_self">Link to content2.php</a>';
	} else {
		echo 'A username must be entered. Click <a href="http://web.engr.oregonstate.edu/~armatasc/cs290/assignment4-part1/src/login.php?execute=logout" target="_self">here</a> to return to the login screen.';
	}
?>

</body>
</html>
