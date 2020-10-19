<?php
	session_start(); 
	if (isset($_SESSION['client_id']))
	{
		$_SESSION = array();
		session_destroy(); 
		header("location: ../index.php");
	}
	else
	{
		?>
		<script>
			alert("You have not open session");
		</script>
		<?php
	}
?>