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
	$query2 = "INSERT INTO purchase(purchase_code,date,stk_id,part_code,quantity,price,total)
	values('".$tat."','".$date."','".$_SESSION['stk_id']."','".$value['ids']."','".$value['quantity']."','".$value['price']."','".$value['quantity'] * $value['price']."')"; 
	mysqli_query($connect,$query2)or die(mysqli_error($connect));

	//Update Product
	$sql = "UPDATE particulars SET quantity = quantity - '".$value['quantity']."' WHERE part_code='".$value['ids']."'";
	mysqli_query($connect,$sql)or die(mysqli_error($connect));
	}
	//Save Transaction Detail 
	$query3 = "INSERT INTO purchaseline(stk_id, purchase_code,date,deliveryfee, total_price,status,delivery_date)VALUES
	('".$_SESSION['stk_id']."','".$tat."','".$date."',100,'".$_SESSION['mtotal']."'+100,'Pending','".$del."')";
	mysqli_query($connect,$query3)or die(mysqli_error($connect)); 



	}

	unset($_SESSION["cart"]);
	unset($_SESSION['mtotal']);	
	?>

	<script type="text/javascript">
	alert("Successfully added.");
	window.location = "purchase-list.php";
	</script>
