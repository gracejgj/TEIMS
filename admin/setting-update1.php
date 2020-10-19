<?php

	include 'inc/session.php';

	if(isset($_POST['submit']))
	{
	$p_id = $_GET['pid']; 	 
	$code = $_POST['stkCode']; 
	$pass = $_POST['stkPwd'];  
	
	$sql = "update staff set stkCode = '$code', stkPwd = '$pass' where stkID = '$p_id'"; 
	$result = mysqli_query($connect,$sql);
	
	if($result)
	{
		?>
		<script>
			alert("Setting has been updated.");
			window.location.href = "setting.php";
		</script>
		<?php
	}
	else
	{
		?>
		<script>
			alert("Fail to update.");
			window.location.href = "setting-update.php?pid=<?php echo $p_id; ?>";
		</script>
		<?php
	}
}
?>