	
	<?php
	require ("../includes/dbconnect.php");
	session_start();
	
	$query = 'SELECT `stk_name`, `stk_phone`,`stk_email`, `purchase_code` FROM `purchaseline` a inner join `admin` b on a. `stk_id`=b. `stk_id` 
	WHERE purchase_code ='.$_GET['id'];
            $result = mysqli_query($connect, $query) or die(mysqli_error($connect));
              while($row = mysqli_fetch_array($result))
              {   
               $stat = $row['status'];
               $name = $row['stk_name'];
               $contact = $row['stk_phone'];
               $email = $row['stk_email'];
               $cd = $row['purchase_code'];
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
			<!--<div class="app-page-title">
			<div class="page-title-wrapper">
			<div class="page-title-heading">
			<div>Turbine Engine Inventory Management: Spare Parts
			<div class="page-title-subheading">Suppliers</div>
			</div>
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
		
		<div>
			<h6>Order No.# : 0<?php echo $cd; ?></h6>
            <h6>Name : <?php echo $name; ?></h6>
            <h6>Contact : 0<?php echo $contact; ?></h6>
            <h6>Email : <?php echo $email; ?></h6>
		</div>

		<table class="mb-0 table table-borderless">
		<thead>
		<tr>
		<th> Product </th>
		<th> Order Date </th>
		<th> Quantity </th>
		<th> Price </th>
		<th> Total </th>
		</tr>
		</thead>
		<tbody>
		
		<?php 
		$query = "SELECT b.part_name,a.date,a.quantity,a.price,a.total FROM purchase a,particulars b WHERE a.part_code=b.part_code AND a.purchase_code='".$_GET['id']."' GROUP BY a.part_code";
		$result = mysqli_query($connect, $query) or die (mysqli_error($connect));
		while ($row = mysqli_fetch_assoc($result)) {
							 
			echo '<tr>';
			echo '<td>'. $row['part_name'].'</td>';                     
			echo '<td>'. $row['date'].'</td>';
			echo '<td>'. $row['quantity'].'</td>';
			echo '<td>RM '. $row['price'].'</td>';
			echo '<td>RM '. $row['total'].'</td>';
			echo '</tr> ';
			}
		?> 
		
		<?php 
		$query = 'SELECT * FROM purchaseline WHERE purchase_code ='.$_GET['id'];
		$result = mysqli_query($connect, $query) or die(mysqli_error($connect));
		while($row = mysqli_fetch_array($result))
		{   
		$zz = $row['total_price'];
		?>
				
		<tr>
			<td colspan="4" align="right"><br><h6> Subtotal :</h6></td>
			<td ><br><h6>RM <?php echo $zz; ?></h6></td>
		</tr>
		<tr>
			<td colspan="4" align="right"><h6> Total :</h6></td>
			<td ><h6>RM <?php echo $zz; ?></h6></td>
		</tr>		
		</tbody>
		</table>
		
		<?php      
		if ($row['status']=='Pending') {?>
		<a title="Cancel" type="button" class="btn btn-xs btn-danger " onclick="return confirm('Do you want to cancel transaction?')" href="order-confirm.php?action=edit & cancel=<?php echo $row['purchase_code']; ?> ">Cancel</a>
		<a title="Confirm" type="button" class="btn btn-xs btn-info " onclick="return confirm('Do you want to confirm transaction?')" href="order-confirm.php?action=edit & confirm=<?php echo $row['purchase_code']; ?>">Confirm</a>
		<a href="order.php" class="btn btn-xs btn-warning">Back</a>
		
		<?php
		}elseif ($row['status']=='Confirmed') {?>
		<a title="Cancel" type="button" class="btn btn-xs btn-danger " onclick="return confirm('Do you want to cancel transaction?')" href="order-confirm.php?action=edit & cancel=<?php echo $row['purchase_code']; ?> ">Cancel</a>
		<a href="order.php" class="btn btn-xs btn-warning">Back</a>
		
		<?php 
		}
			elseif 
			($row['status']=='Cancelled') 
		{
			?>
			
		<a title="Confirm" type="button" class="btn btn-xs btn-info " onclick="return confirm('Do you want to confirm transaction?')" href="order-confirm.php?action=edit & confirm=<?php echo $row['purchase_code']; ?>">Confirm</a>
		<a href="order.php" class="btn btn-xs btn-warning">Back</a>
		
					<?php 
				}   
			}  
		?>
		</div>
		</div>
		
		<?php
		$query = 'SELECT * FROM purchaseline WHERE purchase_code ='.$_GET['id'];
		$result = mysqli_query($connect, $query) or die(mysqli_error($connect));
		while($row = mysqli_fetch_array($result))
		{   
		$zz = $row['total_price'];
		}


		?>

		</div>
		</div>
		</div>
		</div>
		</div>
		<script type="text/javascript" src="scripts/noright.js"></script>
		<script type="text/javascript" src="scripts/main.js"></script>
	</body>
</html>
