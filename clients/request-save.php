	<?php
	include "../includes/dbconnect.php";
	session_start();

	$del = $_POST['del'];             
	$query = 'SELECT current_date FROM client';
	$result = mysqli_query($connect, $query) or die(mysqli_error($connect));
	while($row = mysqli_fetch_array($result))
	{   
	$date = $row['current_date'];
	}
	$tat=time();
	if($_GET["action"]=='adds') {
	foreach($_SESSION['cart'] as $id => $value) {

	//Save Transaction
	$query2 = "INSERT INTO request(request_code,date,client_id,part_code,quantity,price,total)
	values('".$tat."','".$date."','".$_SESSION['client_id']."','".$value['ids']."','".$value['quantity']."','".$value['price']."','".$value['quantity'] * $value['price']."')"; 
	mysqli_query($connect,$query2)or die(mysqli_error($connect));

	//Update Product
	$sql = "UPDATE particulars SET quantity = quantity - '".$value['quantity']."' WHERE part_code='".$value['ids']."'";
	mysqli_query($connect,$sql)or die(mysqli_error($connect));
	}
	//Save Transaction Detail 
	$query3 = "INSERT INTO requestline(request_code,date,client_id,totalprice,status,required_date)
	VALUES('".$tat."','".$date."','".$_SESSION['client_id']."','".$_SESSION['mm']."','Pending','".$del."')";
	mysqli_query($connect,$query3)or die(mysqli_error($connect)); 

	}
	unset($_SESSION["cart"]);
	unset($_SESSION['mm']);	
	?>

	<script type="text/javascript">
	alert("Successfully added.");
	window.location = "request-list.php";
	</script>
