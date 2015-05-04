<html>
<body>
	
	<h3>URL PARAMETERS: 'min-multiplicand', 'max-multiplicand', 'min-multiplier', 'max-multiplier'</h3>
	
<?php
	error_reporting(E_ALL);
	ini_set('display_errors', '1');

	$flag1 = 1;
	$multiplicandF = 1; 	// set to zero if either multiplicand is a non-int
	$multiplierF = 1; 		// set to zero if either multiplicand is a non-int
	$greaterThanF = 1;		// if ANY min-[multiplicand|multiplier] > max-[multiplicand|multiplier], respectively
	
	// isset() conditions for each parameter
	if(!isset($_GET['min-multiplicand'])){
		echo 'Missing parameter \'min-multiplicand\'<br>';
		$flag1 = 0;			// will not check for integers or larger min than max values if flag is 0
	}
	if(!isset($_GET['max-multiplicand'])){
		echo 'Missing parameter \'max-multiplicand\'<br>';
		$flag1 = 0;
	}
	if(!isset($_GET['min-multiplier'])){
		echo 'Missing parameter \'min-multiplier\'<br>';
		$flag1 = 0;
	}
	if(!isset($_GET['max-multiplier'])){
		echo 'Missing parameter \'max-multiplier\'<br>';
		$flag1 = 0;
	}
	
	// check to ensure all parameters are set with the $flag variable
	if($flag1 === 1){
		// check to see if all parameters are integers
		if(!is_numeric($_GET['min-multiplicand'])){
				echo '\'min-multiplicand\' is not an integer <br>';
				$multiplicandF = 0;
		}
		if(!is_numeric($_GET['max-multiplicand'])){
				echo '\'max-multiplicand\' is not an integer <br>';
				$multiplicandF = 0;
		}
		if(!is_numeric($_GET['min-multiplier'])){
				echo '\'min-multiplier\' is not an integer <br>';
				$multiplierF = 0;
		}
		if(!is_numeric($_GET['max-multiplier'])){
				echo '\'max-multiplier\' is not an integer <br>';
				$multiplierF = 0;
		}
		// MULTIPLICAND: max must be greater than min
		if($multiplicandF === 1){
			if($_GET['min-multiplicand'] > $_GET['max-multiplicand']){
				echo '\'min-multiplicand\' is greater than \'max-multiplicand\' <br>';
				$greaterThanF = 0;
			}
		}
		if($multiplierF === 1){
			if($_GET['min-multiplier'] > $_GET['max-multiplier']){
				echo '\'min-multiplier\' is greater than \'max-multiplier\' <br>';
				$greaterThanF = 0;
			}
		}
	}
	// if ALL conditions met (none of the flags triggered), create table based off conditions
	if($flag1 === 1 && $multiplicandF === 1 && $multiplierF === 1 && $greaterThanF === 1){
		$minCand = $_GET['min-multiplicand'];
		$maxCand = $_GET['max-multiplicand']; 
		$minIer =  $_GET['min-multiplier'];
		$maxIer =  $_GET['max-multiplier'];
		$multiplicandDif = $_GET['max-multiplicand'] - $_GET['min-multiplicand'];
		$multiplierDif = $_GET['max-multiplier'] - $_GET['min-multiplier'];
		$temp = 0;
		$temp2 = 0;
		$i = 0;
		$j = 0;
		
		echo '<p>ALL conditions properly met! </p>';
		
		// Set up for creating the table
		echo '<h3>Multiplication Table</h3>
		<table border="2">
			<tr><td></td>';
			
		// creating top row (after blank space)
		for($i = 0; $i <= $multiplierDif; $i++){
			$temp = $minIer + $i;
			echo '<td><b>'.$temp.'</b></td>';
		}
		// create left column of multiplicands AND table boxes of the corresponding products
		for($i = 0; $i <= $multiplicandDif; $i++){
			$temp = $minCand + $i;
			echo '<tr><td><b>'.$temp.'</td></b>';
			for($j = 0; $j <= $multiplierDif; $j++){
				$temp2 = $temp*($minIer + $j);
				echo '<td>'.$temp2.'</td>';
			}
			echo '</tr>';
		}
		echo '</table>';
		// table finished
	}
	
	
?>

</body>
</html>
