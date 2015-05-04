<?php
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
?>

<html>
<body>

<h3>Please enter a key/value pair: </h3>

<form action="" method="POST">
  Key: <input type="text" name="key"><br>
  Value: <input type="text" name="value"><br><br>
  <input type="submit" value="Submit">
</form>
<br>

<?php
	$temp;

	if($_GET) {
		$temp = $_GET;
		$temp = json_encode($temp);
		echo '{"Type:"GET","parameters":'.$temp.'}<br><br>';
	} else {
		echo '{"Type:"GET","parameters":null}<br><br>';
	}
	if($_POST){
		$arr = array();
		$arr[$_POST['key']] = $_POST['value'];
		$temp = json_encode($arr);
		echo '{"Type:"POST","parameters":'.$temp.'}';
	} else {
		echo '{"Type:"POST","parameters":null}';
	}
?>

</body>
</html>
