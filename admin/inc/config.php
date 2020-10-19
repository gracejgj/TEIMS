	
	<?php
	$localhost = "localhost";
	$username = "root";
	$password = "Jgracej9306__";
	$database = "teims";
	
	$connect = new mysqli($localhost, $username, $password, $database);
	if($con->connect_error){
	die ('Failed to connect to MySQL: ' . $mysqli->connect_errno);
	}
	?>