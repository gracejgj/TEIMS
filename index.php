<?php
include ('includes/dbconnect.php');
$reqErr = $loginErr = "";
if ($_SERVER['REQUEST_METHOD'] == "POST")
{
    if (!empty($_POST['txtUsername']) && !empty($_POST['txtPassword']) && isset($_POST['login_type']))
    {
        session_start();
        $username = $_POST['txtUsername'];
        $password = $_POST['txtPassword'];
        $_SESSION['sessLogin_type'] = $_POST['login_type'];
        if ($_SESSION['sessLogin_type'] == "client")
        {
            //if selected type is client than check for valid client.
            $query_selectClient = "SELECT client_id,client_contact, client_email,username,password FROM client WHERE username='$username' AND password ='$password'";
            $result = mysqli_query($connect, $query_selectClient);
            $row = mysqli_fetch_array($result);
            if ($row)
            {
                $_SESSION['client_id'] = $row['client_id'];
                $_SESSION['sessUsername'] = $_POST['txtUsername'];
                $_SESSION['sessPassword'] = $POST['txtPassword'];
                $_SESSION['sessContact'] = $row['client_contact'];
                $_SESSION['sessEmail'] = $row['client_email'];
                $_SESSION['client_login'] = true;
                header('Location:clients/dashboard.php');
            }
            else
            {
                $loginErr = "* Username or Password is incorrect.";
            }
        }
        else if ($_SESSION['sessLogin_type'] == "supplier")
        {
            //if selected type is supplier than check for valid supplier.
            $query_selectSupplier = "SELECT supplier_id,supplier_code,supplier_pass FROM supplier WHERE supplier_code='$username' AND supplier_pass='$password'";
            $result = mysqli_query($connect, $query_selectSupplier);
            $row = mysqli_fetch_array($result);
            if ($row)
            {
                $_SESSION['supplier_id'] = $row['supplier_id'];
                $_SESSION['sessUsername'] = $_POST['txtUsername'];
                $_SESSION['sessPassword'] = $_POST['txtPassword'];
                $_SESSION['supplier_login'] = true;
                header('Location:supplier/dashboard.php');
            }
            else
            {
                $loginErr = "* Username or Password is incorrect.";
            }
        }
        else if ($_SESSION['sessLogin_type'] == "admin")
        {
            $query_selectAdmin = "SELECT stk_id, stk_name, stk_email, stk_phone, username, password FROM admin WHERE username='$username' AND password='$password'";
            $result = mysqli_query($connect, $query_selectAdmin);
            $row = mysqli_fetch_array($result);
            if ($row)
            {
                $_SESSION['stk_id'] = $row['stk_id'];
                $_SESSION['sessUsername'] = $_POST['txtUsername'];
                $_SESSION['sessPassword'] = $_POST['txtPassword'];
                $_SESSION['sessNamess'] = $row['stk_name'];
                $_SESSION['sessContact'] = $row['stk_phone'];
                $_SESSION['sessEmail'] = $_row['stk_email'];
                $_SESSION['admin_login'] = true;
                header('Location:admin/dashboard.php');
            }
            else
            {
                $loginErr = "* Username or Password is incorrect.";
            }
        }
    }
    else
    {
        $reqErr = "* All fields are required.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
	<title> Login </title>
	<link rel="stylesheet" href="includes/login.css" >
</head>
<body class="login-box">
	<h1>LOGIN</h1>
	    <?php
if (isset($_GET['error']))
{
    if ($_GET["error"] == "wrongpwd")
    {
        echo '<p class="signuperror"> Wrong password </p>';
    }

}

?>
	<form action="" method="POST" class="login-form">
	<ul class="form-list">
	<li>
		<div class="label-block"> <label for="inputUsername">Username</label> </div>
		<div class="input-box"> <input type="text" id="login:username" name="txtUsername" placeholder="Username" /> </div>
	</li>
	<li>
		<div class="label-block"> <label for="inputPassword">Password</label> </div>
		<div class="input-box"> <input type="password" id="inputPassword" name="txtPassword" placeholder="Password" /> </div>
	</li>
	<li>
		<div class="label-block"> <label for="loginType">Login Type</label> </div>
		<div class="input-box">
		<select name="login_type" id="login:type">
		<option value="" disabled selected>-- Select Type --</option>
		<option value="client">Client</option>
		<option value="supplier">Supplier</option>
		<option value="admin">Admin</option>
		</select>
		</div>
	</li>
	<li>
		<input type="submit" value="Login" class="submit_button" /> <span class="error_message"> <?php echo $loginErr;
echo $reqErr; ?> </span>
	</li>
	</ul>
	</form>
</body>
	<script type="text/JavaScript">
	var message="NoRightClicking";
	function defeatIE() {if (document.all) {(message);return false;}}
	function defeatNS(e) {if 
	(document.layers||(document.getElementById&&!document.all)) {
	if (e.which==2||e.which==3) {(message);return false;}}}
	if (document.layers) 
	{document.captureEvents(Event.MOUSEDOWN);document.onmousedown=defeatNS;}
	else{document.onmouseup=defeatNS;document.onconnecttextmenu=defeatIE;}
	document.onconnecttextmenu=new Function("return false")
	</script>
</html>
