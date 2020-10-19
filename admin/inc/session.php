<?php
	include '../includes/dbconnect.php';
	session_start();
	if (!isset($_SESSION['admin_login']))
	{
		?>
        <script>
			alert("You have not login yet");
			window.location.href = "../index.php";
		</script>
        <?php
	}
?>
