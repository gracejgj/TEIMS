<?php
	session_start();
	require("../includes/dbconnect.php");
	 if (isset($_GET["action"])) {
  if ($_GET["action"]=='delete') {
    foreach ($_SESSION["cart"] as $keys => $values) {
      if ($values['ids']==$_GET["id"]) {
        unset($_SESSION["cart"][$keys]);
        echo '<script>alert("Product is Remove")</script>';
        echo '<script>window.location="request-cart.php"</script>';
      }
    }
  }
} 
if (isset($_POST['action']) && $_POST['action']=="change"){
  foreach($_SESSION["cart"] as &$value){
    if($value['ids'] === $_POST["code"]){
        $value['quantity'] = $_POST["quantity"];
        break; // Stop the loop after found the product
    }
}

    
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
                                  <div>Cart(s)</div>
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
		  <h5 class="card-title">Cart(s)</h5>
		  
			  <table class="mb-0 table">
				  <thead>
				   <tr align="left">
					<th>Part Name</th>
					<th>Quantity</th>
					<th>Price (RM)</th>
					<th>Total</th>
					<th>Action</th>
					<th></th>
				  </tr>
				  </thead>
							
			<tbody>
			<?php
				if (!empty($_SESSION["cart"])) {
				$_SESSION['mm']=0;
				foreach($_SESSION["cart"] as $keys => $values){
			?>
			
			<tr align="left" style="text-transform:uppercase">
				
				<td> <?php echo $values["name"]; ?></td>
				
				<td> <?php echo $values["quantity"]; ?> </td>
				
				<td> RM <?php echo $values["price"]; ?></td>
				
				<td  class="card-title"> RM <?php echo $values["quantity"] * $values["price"]; ?></td>
				
                                                          
				<td>
				<a class="btn btn-danger" type="button" onclick="return confirm('Are you sure?')" href="request-cart.php?action=delete&id=<?php echo $values["ids"]; ?>">Remove</a></td>
			
			</tr> 
		
			<?php
			$name= $values["name"];
			$_SESSION['mm'] = $_SESSION['mm'] + ($values["quantity"] * $values["price"]);
			}
			?>
											
		</tbody>
			<tr>
				<!--<td><a type="button" class="btn btn-success" href="request.php" >Continue Browse</a></td>-->
				<td></td>
				<td colspan="2" align="right" class="card-title">Total Price</td>
				<td align="left"  class="card-title">RM <?php echo $_SESSION['mm']; ?></td>
				<td><a type="button" class="btn btn-success" href="request-add.php" >Proceed and Checkout</a></td>
			</tr>
			<?php
			}
			?>
					</table>
					<br>
			<tr>
			<td><a type="button" class="btn btn-success" href="request.php" >Continue Browse</a></td>
			</tr>
				</div>
			</div>
		</div>
	</div>
</div>
    </div>
</div>
<script type="text/javascript" src="scripts/main.js"></script>
<script type="text/javascript" src="scripts/noright.js"></script>
</body>
</html>