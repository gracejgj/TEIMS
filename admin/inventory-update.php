	
	<?php
	include 'inc/session.php';
	
	$p_id = $_GET['pid'];
	$sql = "select * from particulars WHERE part_id = '$p_id'";
	$result = mysqli_query($connect,$sql);
	$rows = mysqli_fetch_array($result);
	
	$query_rack = 'SELECT * FROM rack';
	$result_rack = mysqli_query($connect,$query_rack) or die(mysqli_error($connect));
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
                                  <div>Inventory List</div>
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
				<h5 class="card-title">Manage Equipment: Spare Parts</h5>
				<form action="inventory-update1.php?pid=<?php echo $p_id; ?>" method="post">	
					<table class="mb-0 table table-hover">
					 
					<tr>
						<td> Name</td>
						<td> <input type="text" name="name" value="<?php echo $rows['part_name']; ?>" class="form-control" pattern ="["^[a-zA-Z0-9!@#$&()\\-`.+,/\"]*$"] "  required/> </td>
					</tr>
					
					<tr>
						<td> Part No</td>
						<td> <input type="text" name="code" value="<?php echo $rows['part_code']; ?>" class="form-control" pattern="[A-Za-z0-9]+" required /> </td>
					</tr>
					
					<tr>
						<td> Rate (RM)</td>
						<td> <input type="text" name="price" value="<?php echo $rows['price']; ?>" class="form-control" readonly /> </td>
					</tr>
				   
					<tr>
						<td> Quantity</td>
						<td> <input type="text" name="qty" value="<?php echo $rows['quantity']; ?>" class="form-control" pattern="[0-9]+" title="Please enter number only"  required /> </td>
					</tr>
					
					<tr>
						<td> Rack</td>
						<td><select name="rack" class="form-control" required>
						<option value="" disabled selected>--- Select Rack ---</option>
						<?php while ($row_selectRack = mysqli_fetch_array($result_rack)) { ?>
						<option value="<?php echo $row_selectRack ["rack_id"]; ?>"> 
						<?php echo $row_selectRack["rack_name"]." (".$row_selectRack["rack_details"].")"; ?></option>
						<?php } ?> </select>
						</td>
					</tr>
					
					<tr>
						<td> Status</td>
						<td> <select name="pstatus" value="<?php echo $rows['status']; ?>" class="form-control" required /> 
							 <option value="Available">Available</option>
							 <!--<option value="Lowstock">Low Stock</option>-->
							 <option value="Notavailable">Not Available</option>
							 </select>
						</td>
					</tr>
					
					<tr>
						<td></td>
						<td>
						<a href="inventory.php" class="btn btn-secondary">Back</a>
							<input class="btn btn-secondary" type="submit" value="Save Changes" name="submit" />
							
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
	<script type="text/JavaScript">
	//Script courtesy of BoogieJack.com
	var message="NoRightClicking";
	function defeatIE() {if (document.all) {(message);return false;}}
	function defeatNS(e) {if 
	(document.layers||(document.getElementById&&!document.all)) {
	if (e.which==2||e.which==3) {(message);return false;}}}
	if (document.layers) 
	{document.captureEvents(Event.MOUSEDOWN);document.onmousedown=defeatNS;}
	else{document.onmouseup=defeatNS;document.oncontextmenu=defeatIE;}
	document.oncontextmenu=new Function("return false")
	</script>
    
    </div>
<script type="text/javascript" src="scripts/main.js"></script></body>
</html>
