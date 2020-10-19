<?php
 include 'inc/session.php';
	
	$query_rack = 'SELECT * FROM rack';
	$result_rack = mysqli_query($connect,$query_rack) or die(mysqli_error($connect));
	
	$query2 = 'SELECT current_date FROM client';
	$result2 = mysqli_query($connect, $query2) or die(mysqli_error($connect));
	while($row2 = mysqli_fetch_array($result2)){   
	$date = $row2['current_date'];
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
                                  <div>Add New</div>
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
			<h5 class="card-title">Add New Equipment: Spare Parts</h5>
		<form role="form" method="post" action="inventory-add1.php?action=add">
    <?php
          if (isset($_GET['required'])) {
            if ($_GET["required"]=="product") {
              echo '<p class="error-msg text-danger">Product name is required</p>';
            }elseif ($_GET["required"]=="quantity") {
               echo '<p class="error-msg text-danger">Invalid quantity</p>';
            }elseif ($_GET["required"]=="price") {
               echo '<p class="error-msg text-danger">Invalid price</p>';
            }elseif ($_GET["required"]=="producttaken") {
               echo '<p class="error-msg text-danger">Product Code is already taken. Please try again.</p>';
            }
            }      ?>
			<table class="table table-hover">
					 
			<tr>
				<td> Part Code</td>
				<td> <input type="text" name="product" placeholder="Product Code" class="form-control" pattern="[A-Za-z0-9]+" title="No special characters are allow" required /> </td>
			</tr>
			
			<tr>
				<td>Part Name</td>
				<td>  <input type="textarea"  value="<?php echo $row2['part_name']; ?>" name="partname" class="form-control"  pattern ="[a-zA-Z0-9!@#$&()\\-`.+,/\" required /> </td>
			</tr>
			
			<tr>
				<td> Rate (RM)</td>
				<td> <input type="number" name="price"  class="form-control" pattern="[0-9]+(\\.[0-9][0-9]?)?" required /> </td>
		   
			<tr>
				<td> Quantity</td>
				<td> <input type="number" name="quantity" class="form-control" pattern="[0-9]+" title="Only numbers are allowed" required /> </td>
			</tr>
			
			<!--
			<tr>
			<td align="left"> Department </td>
			<td>
			<select name="department" class="form-control" required>
			<option value="Male">Mechanical Department</option>
			<option value="Male">Electrical Department</option>
			<option value="Female">Control and Instrumental Department</option>
			</select>
			</td>
			</tr>
			*<input type="text" name="rack" class="form-control" pattern="[A-Za-z0-9]+" title="No special characters are allow" required /> 
			-->
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
			<input class="form-control" type="hidden" name="user" value="<?php echo $_SESSION['stk_id']; ?>">
			</tr>
			
			<tr>
				<td> Date</td>
				<td> <input class="form-control" readonly type="text" placeholder="Date In" name="date" value="<?php echo $date ?>">
				</td>
			<tr>
				<td></td>
				<td>
					<input class="btn btn-secondary" type="submit" name="submit" />
					<a href="inventory.php" class="btn btn-secondary">Back</a>
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
<script type="text/javascript" src="scripts/noright.js"></script>
<script type="text/javascript" src="scripts/main.js"></script></body>
</html>
