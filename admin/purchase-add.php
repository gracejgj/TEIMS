

<?php
	include "../includes/dbconnect.php";
	session_start();
	if (!isset($_SESSION['stk_id'])) {
	}
	else{ 
	}
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
                                  <div>Order Detail(s)</div>
                              </div>
                                </div>
                              </div>
							  
<!--
	========================================================
	* content
	======================================================== -->
	<div class="tab-content">
	<div class="row">
 	<div class="col-md-6">
	  <div class="main-card mb-3 card">
		<div class="card-body">
		  <h5 class="card-title">Order Detail(s)</h5>
		  
			<table class="mb-0 table">
			<thead>
			<tr align="left">
			<th> Product </th>
			<th> Order Date </th>
			<th> Quantity </th>
			<th> Price </th>
			<th> Total </th>
			<th></th>
			</tr>
			</thead>
			<tbody>
			<?php            
			$result = mysqli_query($connect, 'SELECT current_date FROM admin') or die(mysqli_error($connect));
			while($row = mysqli_fetch_array($result))
			{   
			$date = $row['current_date'];
			} ?>
			<?php 
			if (!empty($_SESSION["cart"])) {
			$_SESSION['mtotal']=0;
			foreach($_SESSION["cart"] as $keys => $values){
			?>
			<tr align="left" style="text-transform:uppercase">
			<td> <?php echo $values["name"]; ?></td>
			<td> <?php echo $date; ?> </td>
			<td> <?php echo $values["quantity"]; ?> </td>
			<td>RM <?php echo $values["price"]; ?></td>
			<td> <?php echo $values["quantity"] * $values["price"]; ?></td>
			</tr> 

			<?php
			$name= $values["name"];
			$_SESSION['mtotal'] = $_SESSION['mtotal'] + ($values["quantity"] * $values["price"]);
			}
			?>

			</tbody>

			<?php
			}
			?>
			</table>
			</div>
			</div>
			</div>
			<div class="col-md-6">
			<div class="card mb-3 widget-content">
			<div class="card-body">
			
			<form method="POST" style="text-transform:uppercase" action="purchase-save.php?action=adds">
			<h6><i class="pe-7s-user"> </i> <?php echo $_SESSION['sessNamess'] ?></h6><br>
			<h6><i class="pe-7s-phone"></i> 0 <?php echo $_SESSION['sessContact'] ?></h6><br>
			<h6><i class="pe-7s-mail"></i> <?php echo $_SESSION['sessEmail'] ?></h6><br>
			<h6><i class="fas fa-calendar"></i> Required Date Before: <br><input type="date" name="del" style="width: 206px" value="2020-06-15" min="2020-05-22" max="2021-12-12" required></h6><br>
			<input type="hidden"  placeholder="HH-MM-AM/PM"  id="ftime" name="ftime" value="<?php echo date('y-m-d h:i:s') ?>"  />
				  
			<h4>Order Summary</h4><br>
			<div class="row">
			<div class="col-lg-7" >
			<h6>Subtotal</h6><br>
			</div>                            
			<div align="right" class="col-lg-4">
			<h6>RM <?php echo $_SESSION['mtotal']; ?></h6><br>
			</div> 
			<div class="col-lg-7">
			<h6>Delivery Fee</h6><br>
			</div> 
			<div align="right" class="col-lg-4">
			<h6>RM 100</h6><br>
			</div>
			<div class="col-lg-7">
			<h6>Total</h6><br>
			</div> 
			<div align="right" class="col-lg-4">
			<h6>RM <?php echo $_SESSION['mtotal']+100; ?></h6><br>
			</div>                            
			</div>
			<center>
			<a href="purchase.php" button type="" onclick="return confirm('Do you want to add more order?')" class="btn btn-lg btn-success">Add more items</a></button>
			<button type="submit" onclick="return confirm('Do you want to submit order?')" class="btn btn-lg btn-success">SUBMIT ORDER</button></center>
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
			<script type="text/javascript" src="scripts/main.js"></script>
			<script type="text/javascript" src="scripts/noright.js"></script></body>
			</html>
