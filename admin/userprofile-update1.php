<?php

	include 'inc/session.php';

	if(isset($_POST['submit']))
	{
	$p_id = $_GET['pid']; 	
	$sname = $_POST['name'];  
	$sgender = $_POST['gender'];  
	$code = $_POST['username']; 
	$pass = $_POST['password'];  
	
	$sql = "update admin set stk_name = '$sname', stk_gender = '$sgender', username = '$code', password = '$pass' where stk_id = '$p_id'"; 
	$result = mysqli_query($connect,$sql);
	
	if($result)
	{
		?>
		<script>
			alert("Profile has been updated.");
			window.location.href = "userprofile.php";
		</script>
		<?php
	}
	else
	{
		?>
		<script>
			alert("Fail to update.");
			window.location.href = "userprofile-update.php?pid=<?php echo $p_id; ?>";
		</script>
		<?php
	}
}
?>