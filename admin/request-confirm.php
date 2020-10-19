<?php 
	require ("../includes/dbconnect.php");
	session_start();
	
	//if($_GET["action"]=='adds') {
	//$del = $_POST['del'];   
	
	$query = 'SELECT current_date FROM client';
	$result = mysqli_query($connect, $query) or die(mysqli_error($connect));
	while($row = mysqli_fetch_array($result))
	{   
	$date = $row['current_date'];
	}
	$tat=time();
	
	
	if (isset($_GET['cancel'])) 
	{
	mysqli_query($connect, "UPDATE requestline SET status = 'Cancelled', remarks = 'Your order has been cancelled <br>
		due to lack of communication <br> and incomplete information!' WHERE request_code='".$_GET['cancel']."'")or die(mysqli_error($connect));
	}
	elseif (isset($_GET['confirm'])) {
	$dates = $_POST['dates'];
	mysqli_query($connect, "UPDATE requestline SET status = 'Confirmed', remarks = 'Your order has been confirmed!', delivery_date = '".$dates."' WHERE request_code='".$_GET['confirm']."'")or die(mysqli_error($connect));
	}

	?>
	
	<script type="text/javascript">
	alert("Transaction Updated.");
	window.location = "request-new.php";
	</script>