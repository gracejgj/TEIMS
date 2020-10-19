<?php  
if (isset($_POST['signup-submit'])) {

require '../includes/dbconnect.php';

$fname = $_POST['firstname'];
$lname = $_POST['lastname'];
$email = $_POST['mail'];
$con = $_POST['con'];
$depart = $_POST['department'];
$username = $_POST['uid'];
$pass = $_POST['pwd'];
$passcon = $_POST['pwdcon'];

if (empty($fname)||empty($lname)||empty($email)||empty($username)||empty($pass)||empty($passcon)) {
	header("Location: clients-add.php?error=emptyfields&firstname=".$fname."&lastname=".$lname.
	"&mail=".$email."&uid=".$username);
	exit();
}
elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/",$username)) {
	header("Location: clients-add.php?error=invalidmail&uid=");
	exit();
}
else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	header("Location: clients-add.php?error=invalidmail&uid=".$username);
	exit();
}
else if (!preg_match("/^[a-zA-Z0-9]*$/",$username)) {
	header("Location: clients-add.php?error=invaliduid&mail=".$email);
	exit();
}
else if ($pass !== $passcon) {
	header("Location: clients-add.php?error=passwordcheck&firstname=".$fname."&lastname=".$lname.
	"&mail=".$email."&uid=".$username);
	exit();
} 
else{
	$sql = "SELECT * FROM client WHERE username=? or client_email=?";
	$stmt = mysqli_stmt_init($connect);
	if (!mysqli_stmt_prepare($stmt,$sql)) {
	header("Location: clients-add.php?error=sqlerror");
	exit();
	} 
	else{
		mysqli_stmt_bind_param($stmt,"ss",$username,$email);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_store_result($stmt);
		$resultCheck = mysqli_stmt_num_rows($stmt);
		if ($resultCheck > 0) {
			header("Location: clients-add.php?error=usertaken&error=emailtaken");
			exit();
		}
		else{
			$sql = "INSERT INTO client(client_fname,client_lname,client_contact,client_email,client_department,username,password)
			VALUES(?,?,?,?,?,?,?)";
			mysqli_stmt_execute($stmt);
			if (!mysqli_stmt_prepare($stmt,$sql)) {
			header("Location: clients-add.php?error=sqlerror");
			exit();
		}else{
			$hashedPwd =password_hash($pass,PASSWORD_DEFAULT);

			mysqli_stmt_bind_param($stmt,"sssssss",$fname,$lname,$email,$con,$depart,$username,$hashedPwd);
			mysqli_stmt_execute($stmt);
			
			?>
			<script type="text/javascript">
				alert("Successfully Added");
				window.location = "clients.php";
			</script>
			
			
			<?php
			exit();
			}
		}
	}			
}
mysqli_stmt_close($stmt);
mysqli_close($connect);

}
else{
	header("Location: clients-add.php");
	exit();
}
?>