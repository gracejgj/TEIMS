<?php
 include 'inc/session.php';

if(isset($_GET['pid']))
{
	$pro_id = $_GET['pid'];
	
	$sql = "delete from supplier where supplier_id = '$pro_id'";
	$result = mysqli_query($connect,$sql);
	
	if($result)
	{
		?>
		<script>
			alert("Supplier has been deleted.");
			window.location.href = "suppliers.php";
		</script>
		<?php
	}
	else
	{
		?>
		<script>
			alert("Failed to delete.");
			window.location.href = "suppliers.php";
		</script>
		<?php
	}
}
?>