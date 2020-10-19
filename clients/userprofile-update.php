	
	<?php
	include 'inc/session.php';
	
	$p_id = $_GET['pid'];
	$sql = "select * from client WHERE client_id = '$p_id'";
	$result = mysqli_query($connect,$sql);
	$rows = mysqli_fetch_array($result);
	?>


<!doctype html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Turbine Engine Inventory Management: Spare Parts</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">

<link href="css/main.css" rel="stylesheet"></head>
<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
	 <?php include 'aa-header.php';?>

           <div class="app-main">
                <div class="app-sidebar sidebar-shadow">
                    <div class="app-header__logo">
                        <div class="logo-src"></div>
                        <div class="header__pane ml-auto">
                            <div>
                                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                    <span class="hamburger-box">
                                        <span class="hamburger-inner"></span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="app-header__mobile-menu">
                        <div>
                            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                    <div class="app-header__menu">
                        <span>
                            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                                <span class="btn-icon-wrapper">
                                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                                </span>
                            </button>
                        </span>
                    </div>
                  	 <?php include 'aa-sidebar.php';?>
                </div>

                  <div class="app-main__outer">
                    <div class="app-main__inner">
                      <div class="app-page-title">
                          <div class="page-title-wrapper">
                              <div class="page-title-heading">
                                  <div class="page-title-icon">
                                      <i class="pe-7s-display1 icon-gradient bg-premium-dark">
                                      </i>
                                  </div>
                                  <div>Client [Updating]</div>
                              </div>
                                </div>
                              </div>
	<!--
	========================================================
	* content
	======================================================== -->
	<div class="tab-content">
		<div class="main-card mb-3 card">
			<div class="card-body">
				<h5 class="card-title">Updating Client</h5>
				<form action="userprofile-update1.php?pid=<?php echo $p_id; ?>" method="post">	
				          <?php 
          if (isset($_GET['error'])) {
            if ($_GET["error"]=="emptyfields") {
              echo '<p class="text-danger error-msg">Fill in all fields</p>';
            }
            } 
             
         
           ?>
					<table class="mb-0 table table-hover">
					 
					<tr>
						<td> First Name</td>
						<td> <input type="text" name="fname" value="<?php echo $rows['client_fname']; ?>" class="form-control" pattern="^[a-zA-Z]+$" title="Must contains only characters" required /> </td>
					</tr>
					
					<tr>
						<td>Last Name</td>
						<td> <input type="text" name="lname" value="<?php echo $rows['client_lname']; ?>" class="form-control" pattern="^[a-zA-Z]+$" title="Must contains only characters" required /> </td>
					</tr>
					
					<tr>
						<td> Contact No</td>
						<td> <input type="text" name="contact" value=" <?php echo $rows['client_contact']; ?>" class="form-control" pattern="[0-9]+" minlength ="10" maxlength = "14" title="Please enter number only" required /> </td>
					</tr>
				   
					<tr>
						<td> Email</td>
						<td> <input type="text" name="email" value="<?php echo $rows['client_email']; ?>" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="lemongrace@gmail.com" required /> </td>
					</tr>
					
					<tr>
						<td> Username</td>
						<td> <input type="text" name="username" value="<?php echo $rows['username']; ?>" class="form-control" pattern="[A-Za-z0-9]+" readonly /> </td>
					</tr>
					
					<tr>
						<td> Password</td>
						<td> <input type="text" name="password" value="<?php echo $rows['password']; ?>" class="form-control" pattern="[A-Za-z0-9]+" readonly /> </td>
					</tr>
					
					<tr>
						<td></td>
						<td>
							<input class="btn btn-secondary" type="submit" value="Save Changes" name="submit" />
							<a href="userprofile.php" class="btn btn-secondary">Back</a>
						</td>
					</tr>
				</table>
			</form>
	</div>
	</div>
	</div>
	</div>
	</div>
	</div>
	</div>
	</div>
	</div>
	
    
    </div>
<script type="text/javascript" src="scripts/noright.js"></script>
<script type="text/javascript" src="scripts/main.js"></script>
</body>
</html>
