<?php

	include 'inc/session.php';

	if(isset($_POST['submit']))
	{
	$p_id = $_GET['pid']; 	
	$pname = $_POST['name'];  
	$codes = $_POST['code'];  
	$quanty = $_POST['qty']; 
	$racks = $_POST['rack'];  	
	$stat = $_POST['pstatus'];  
	
	$sql = "update particulars set part_name = '$pname', part_code = '$codes', quantity = '$quanty', rack_id = '$racks', status = '$stat' where part_id = '$p_id'"; 
	$result = mysqli_query($connect,$sql);
	
	if($result)
	{
		?>
		<script>
			alert("Equipment has been updated.");
			window.location.href = "inventory.php";
		</script>
		<?php
	}
	else
	{
		?>
		<script>
			alert("Failed to update. There's duplicate entry of part code. Please check and try again.");
			window.location.href = "inventory-update.php?pid=<?php echo $p_id; ?>";
		</script>
		<?php
	}
}
?>