<?php
 include 'inc/session.php';

if(isset($_GET['pid']));
{
	$pro_id = $_GET['pid'];
	
	$sql = "delete from particulars where part_id = '$pro_id'";
	$result = mysqli_query($connect,$sql);
	
	if($result)
	{
		?>
		<script>
			alert("Particular has been deleted.");
			window.location.href = "inventory.php";
		</script>
		<?php
	}
	else
	{
		?>
		<script>
			alert("Failed to delete.");
			window.location.href = "inventory.php";
		</script>
		<?php
	}
}
?>