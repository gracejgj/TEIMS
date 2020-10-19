<?php 
	require ("../includes/dbconnect.php");
	session_start();
	
if (isset($_GET['cancel'])) {
	mysqli_query($connect, "UPDATE purchaseline SET status = 'Cancelled', remarks = 'Your order has been cancelled <br>
	 due to lack of communication <br> and incomplete information!' WHERE purchase_code='".$_GET['cancel']."'")or die(mysqli_error($connect));
}
elseif (isset($_GET['confirm'])) {
	mysqli_query($connect, "UPDATE purchaseline SET status = 'Confirmed', remarks = 'Your order has been confirmed!' WHERE purchase_code='".$_GET['confirm']."'")or die(mysqli_error($connect));
}
 ?>
 <script type="text/javascript">
			alert("Transaction Updated.");
			window.location = "order.php";
		</script>