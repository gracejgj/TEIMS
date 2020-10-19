<?php
 include 'inc/session.php';

if(isset($_GET['pid']))
{
	$pro_id = $_GET['pid'];
	
	$sql = "delete from client where client_id = '$pro_id'";
	$result = mysqli_query($connect,$sql);
	
	if($result)
	{
		?>
		<script>
			alert("Clients has been deleted.");
			window.location.href = "clients.php";
		</script>
		<?php
	}
	else
	{
		?>
		<script>
			alert("Failed to delete.");
			window.location.href = "clients.php";
		</script>
		<?php
	}
}
?>