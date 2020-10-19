<?php
include 'inc/dbconnect.php';

if(isset($_POST['submit']))
{
	$username = $_POST['username'];
	$password =$_POST['password'];

$sql = "select * from staff where stkCode = '$username' and stkPwd = '$password'";
$result = mysqli_query($connect, $sql);
$rows = mysqli_fetch_array($result);

	if (isset($rows['stkName']))

	{
	session_start();
	$_SESSION['stkName'] = $rows ['stkName'];

			?>
			<script>
			alert('Welcome back, Storekeeper');
			window.location.href = "dashboard.php";
			</script>
			<?php
}

	else
	{
	?>
			<script>
			alert('Failed to login');
			window.location.href = "index.html";
			</script>
			<?php
	}
}
?>
