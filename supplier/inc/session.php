<?php
	include 'dbconnect.php';
	session_start();
	if (!isset($_SESSION['supplier_login']))
	{
		?>
        <script>
			alert("You have not login yet");
			window.location.href = "../index.php";
		</script>
        <?php
	}
?>
