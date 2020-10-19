	<?php
	include("inc/session.php");
	?>

	<?php 
	if (isset($_POST["add_to_cart"])) 
	{
	$av = $_POST['av'];
	$qq = $_POST["quant"];
	  if ($av > $qq) {

	  if (isset($_SESSION["cart"])) 
	{

		
	  $itemarrayid = array_column($_SESSION["cart"], "ids");
	  if (!in_array($_GET["id"], $itemarrayid)) 
	  {
		$count=count($_SESSION["cart"]);
		$itemarray = array(
		 'ids' => $_GET["id"],
		 'name' => $_POST["hiddenname"],
		 'price' => $_POST["hiddenprice"],
		 'quantity' => $_POST["quant"]);
		 $_SESSION["cart"][$count] = $itemarray;
	  }
	  else
	  {
		  echo '<script>alert("Product is Already Added")</script>';
		  echo '<script>window.location="purchase.php"</script>';
	  }  
	}
	else
	{
	  $itemarray = array(
	  'ids' => $_GET["id"], 
	  'name' => $_POST["hiddenname"],
	  'price' => $_POST["hiddenprice"],
	  'quantity' => $_POST["quant"]);
	  $_SESSION['cart'][0] = $itemarray;
	}
	}else{
	  echo '<script>alert("Unavailable Quantity")</script>';
	  echo '<script>window.location="purchase.php"</script>';
	}
	}
	if (isset($_GET["action"])) {
	  if ($_GET["action"]=='delete') {
		foreach ($_SESSION["cart"] as $keys => $values) {
		  if ($values['ids']==$_GET["id"]) {
			unset($_SESSION["cart"][$keys]);
			echo '<script>alert("Product is Remove")</script>';
				echo '<script>window.location="purchase.php"</script>';
		  }
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
                                  <div>Add Purchase</div>
                              </div>
                                </div>
                              </div>
			<!--
			========================================================
			* content
			======================================================== -->
			<div class="tab-content">
			<div class="tab-pane tabs-animation fade show active" id="tab-content-1" role="tabpanel">
			<!--<div class="main-card mb-3 card">
			<div class="card-body">-->

			
			<!--<div class="divider"></div>
				<php 
			$query = "SELECT * FROM admin";
			$result = mysqli_query($connect,$query);
			if (mysqli_num_rows($result)>0) 
			{
			 while ($row = mysqli_fetch_array($result)) 
			{ 
			?>	
			<!--<div class="position-relative row form-group"><label for="orderDate" class="col-sm-2 control-label">Order Date</label> 
				<div class="col-sm-10">
					<input type="date" class="form-control" name="del" style="width: 206px" value="2020-05-22" min="2020-05-22" max="2021-12-12" required>
					<input type="hidden"  placeholder="HH-MM-AM/PM"  id="ftime" name="ftime" value="<php echo date('y-m-d h:i:s') ?>"  />
				</div>
			</div> <!--/form-group

			<div class="position-relative row form-group form-group">
				<label for="clientName" class="col-sm-2 control-label">Name</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="clientName" name="txtAdminName" value="<php echo $row['stk_name']; ?>" readonly />
				</div>
			</div> <!--/form-group
			
			<div class="position-relative row form-group">
				<label for="clientContact" class="col-sm-2 control-label">Contact</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="clientContact" name="txtAdminContact" value="0<php echo $row['stk_phone']; ?>" readonly />
				</div>
			</div> <!--/form-group
	<php
			}
			}
			?>			
			</div>
			</div> -->
			
			<div class="main-card mb-3 card">
			<div class="card-body">
			<h5 class="card-title">Add Order</h5>
			<tr>
			<td align="right">
			<input type="text" class="form-control" id="myInput" onkeyup="myFunction()" placeholder="Search by part number" title="Type in part number"></td>
			</tr><div class="divider"></div>
			<table class="mb-0 table table-hover" id="myTable">
			  <thead>
				   <tr align="left">
					<th>Part Number</th>
					<th>Part Name</th>
					<th>Available</th>
					<th>Price (RM)</th>
					<th>Quantity</th>
					<th>Action</th>
				  </tr>
				  </thead>
							
			<tbody>			
			<?php 
			$query = "SELECT * FROM particulars GROUP BY part_code";
			$result = mysqli_query($connect,$query);
			if (mysqli_num_rows($result)>0) 
			{
			 while ($row = mysqli_fetch_array($result)) 
			{ 
			?>
			
		
			<form method="post" action="purchase.php?action=add&id=<?php echo $row["part_code"] ?>">
			<tr>
				<td class="text-info"><?php echo $row["part_code"]; ?> </td>
				<td><?php echo $row["part_name"]; ?> </td>
				<td><?php echo $row["quantity"]; ?> </td>
				<td class="text-danger">RM <?php echo $row["price"]; ?></td>
				<td><input class="form-control" type="number" min="1" placeholder="Quantity" name="quant" value="1"></td>
				<input class="form-control" type="hidden" name="av" value="<?php echo $row["quantity"]; ?>">
				<input class="form-control" type="hidden" name="hiddenname" value="<?php echo $row["part_name"]; ?>">
				<input class="form-control" type="hidden" name="hiddenprice" value="<?php echo $row["price"]; ?>">
				<td><input class="btn btn-info" type="submit" name="add_to_cart" value="Add to Cart" style="margin-top: 10px"></center></td>
			</tr>
			</form>
			
			<?php
				}
			}
			?>
			</tbody>
			</table>
			</div>
			</div>
					
			<div class="main-card mb-3 card">
			<div class="card-body">
			<h5 class="card-title">Cart(s)</h5>
			<table class="mb-0 table table-hover" id="myTable">
				<thead>
				   <tr align="left">
					<th>Product</th>
					<th>Quantity</th>
					<th>Price (RM)</th>
					<th>Total</th>
					<th>Option</th>
				  </tr>
				</thead>		
			<tbody>		
			<?php 
			if (!empty($_SESSION["cart"])) {
			$_SESSION['mtotal']=0;
			foreach($_SESSION["cart"] as $keys => $values){
			?>
			<tr>
			<td><?php echo $values["name"]; ?></td>
			<td><?php echo $values["quantity"]; ?></td>
			<td><?php echo $values["price"]; ?></td>
			<td><?php echo $values["quantity"] * $values["price"]; ?></td>
			<td><a class="btn btn-danger" type="button" href="purchase.php?action=delete&id=<?php echo $values["ids"]; ?>">Remove</a></td>
			</tr>
			<?php 
			$name= $values["name"];

			$_SESSION['mtotal'] = $_SESSION['mtotal']+($values["quantity"] * $values["price"]);
			}
			?>


			<td colspan="3" align="right">Sub Total</td>
			<td align="right"><?php echo $_SESSION['mtotal'];?></td>
			<td><a type="button" class="btn btn-success" href="purchase-add.php">Checkout</a></td>
			<?php
			}
			?>
			</tbody>
			</table>
			</div>
			</div>
			
			</div>
			</div>
			
			</div>
			</div>
			</div>

	</div>
		<script> /*search only for products*/
	function myFunction() 
	{
	var input, filter, table, tr, td, i, txtValue;
	input = document.getElementById("myInput");
	filter = input.value.toUpperCase();
	table = document.getElementById("myTable");
	tr = table.getElementsByTagName("tr");
	for (i = 0; i < tr.length; i++) {
	td = tr[i].getElementsByTagName("td")[0];
	if (td) {
	txtValue = td.textContent || td.innerText;
	if (txtValue.toUpperCase().indexOf(filter) > -1) {
	tr[i].style.display = "";
		} else {
	tr[i].style.display = "none";
			}
			}       
		}
	}
	</script>
		<script type="text/javascript" src="scripts/noright.js"></script>
	<script type="text/javascript" src="scripts/main.js"></script>
	</body>
	</html>
