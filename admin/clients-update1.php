<?php

	include 'inc/session.php';

	if(isset($_POST['submit']))
	{
	$p_id = $_GET['pid']; 	
	$namef = $_POST['fname'];  
	$namel = $_POST['lname'];  
	$cont = $_POST['contact']; 
	$mail = $_POST['email'];  	
	$name = $_POST['username'];
	$pass = $_POST['password']; 	
	
	$sql = "update client set client_fname = '$namef', client_lname = '$namel', client_contact = '$cont', client_email = '$mail', username = '$name', password = '$pass' where client_id = '$p_id'"; 
	$result = mysqli_query($connect,$sql);
	
	if($result)
	{
		?>
		<script>
			alert("Client has been updated.");
			window.location.href = "clients.php";
		</script>
		<?php
	}
	else
	{
		?>
		<script>
			alert("Failed to update or duplicate entry. Please check and try again.");
			window.location.href = "clients-update.php?pid=<?php echo $p_id; ?>";
		</script>
		<?php
	}
}
?>