<?php

	include 'inc/session.php';

	if(isset($_POST['submit']))
	{
	$p_id = $_GET['pid']; 	
	$name = $_POST['sname'];  
	$con = $_POST['contact']; 
	$mail = $_POST['email'];  	
	$add = $_POST['address'];
	$cod = $_POST['code'];
	$pas = $_POST['pass']; 	
	
	$sql = "update supplier set supplier_name = '$name', supplier_contact = '$con', supplier_email = '$mail', supplier_address = '$add', supplier_code = '$cod', supplier_pass = '$pas' where supplier_id = '$p_id'"; 
	$result = mysqli_query($connect,$sql);
	
	if($result)
	{
		?>
		<script>
			alert("Supplier has been updated.");
			window.location.href = "suppliers.php";
		</script>
		<?php
	}
	else
	{
		?>
		<script>
			alert("Fail to update.");
			window.location.href = "suppliers-update.php?pid=<?php echo $p_id; ?>";
		</script>
		<?php
	}
}
?>