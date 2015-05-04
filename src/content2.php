<html>
<body>

<?php
	session_start();

	if((isset($_GET['login']) && $_GET['login'] == 'correct')) {
		echo '<br>';
		echo '<a href="http://web.engr.oregonstate.edu/~armatasc/cs290/assignment4-part1/src/content1.php?login=correct" target="_self">Link to content1.php</a>';
	} else {
		echo 'A username must be entered. Click <a href="http://web.engr.oregonstate.edu/~armatasc/cs290/assignment4-part1/src/login.php?execute=logout" target="_self">here</a> to return to the login screen.';
	}
?>

</body>
</html>
