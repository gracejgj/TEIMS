<?php

$connect = mysqli_connect("localhost", "root", "", "teims");
if (isset($_POST['submit']))
{
	$username = $_POST['username'];
	$password = $_POST['password'];

$sql = "select * from supplier where supCode = '$username' and supPwd = '$password'";
$result = mysqli_query($connect, $sql);
$rows = mysqli_fetch_array($result);
	
	if(isset($rows['supName']))
	{
	if($rows['sup_type'] == "1")
	{
		session_start();
		$_SESSION['supName'] = $rows['supName'];
		?>
		<script>
			alert("Welcome, GE ENERGY");
			window.location.href = "dashboard.php";
		</script>
		<?php
	}
	else if($rows['sup_type'] == "2")
	{
		session_start();
		$_SESSION['supName'] = $rows['supName'];
		?>
		<script>
			alert("Welcome, Teknik Sdn Bhd");
			window.location.href = "dashboard.php";
		</script>
		<?php
	}
	else if($rows['sup_type'] == "3")
	{
		session_start();
		$_SESSION['supName'] = $rows['supName'];
		?>
		<script>
			alert("Hi, Mega Sdn Bhd");
			window.location.href = "dashboard.php";
		</script>
		<?php
	}
}
else
{
	?>
	<script>
		alert("Please try again.");
		window.location.href = "index.html";
	</script>
	<?php
}
}
?>