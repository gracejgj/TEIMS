	
	<?php
		require ("../includes/dbconnect.php");
		session_start();
		$query = 'SELECT stk_name,delivery_date,stk_phone, stk_email, purchase_code FROM purchaseline a inner join admin b on a. `stk_id`=b. `stk_id`
		WHERE purchase_code ='.$_GET['id'];
				$result = mysqli_query($connect, $query) or die(mysqli_error($connect));
				  while($row = mysqli_fetch_array($result))
				  {   
				   $stat = $row['status'];
				   $name = $row['stk_name'];
				   $del = $row['delivery_date'];
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
         
		<!--
		========================================================
		* content
		======================================================== -->
		<div class="tab-content">
		<span id="divToPrint">
		<div class="main-card mb-3 card">	
		<div class="card-body">
							 
		  <?php if ($stat == 'Confirmed') {
                ?>
				
			<ul>
			<div>
			<h6>Purchase No.# : 0<?php echo $cd; ?></h6>
            <h6>Name : <?php echo $name; ?></h6>
            <h6>Contact : 0<?php echo $contact; ?></h6>
            <h6>Email : <?php echo $email; ?></h6>
            <h6>Date to Deliver : <?php echo $del; ?></h6>
			</div>
			 <?php  
			 } 
			 else
			 {
             ?>
			 
              <h6>Your order is on process. Please check your list of purchase for notification of confirmation.</h6>
			  <br>
			<?php } ?>

		

			<table class="mb-0 table table-borderless">
			<thead>
			<tr>
			<th>Product</th>
			<th>Purchase Date</th>
			<th>Quantity</th>
			<th>Price</th> 
			<th>Total</th> 
			</tr>
			</thead>
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
			echo '<td>  ';
			/*echo '<center> <a  type="button" class="btn btn-lg btn-info fas fa-cart-plus" href="addtransacdetail.php?action=edit & id='.$row['transac_id'] . '"></a> </td></center>';*/
			echo '</tr> ';
			}
			?> 
			</tbody>
			
			<?php 
			$query = 'SELECT * FROM purchaseline WHERE purchase_code ='.$_GET['id'];
			$result = mysqli_query($connect, $query) or die(mysqli_error($connect));
			while($row = mysqli_fetch_array($result))
			{   
			$zz = $row['total_price'];
			}

			?>

			<tr>
				<td colspan="4" align="right"><br><h6> Subtotal :</h6></td>
				<td ><br><h6> RM <?php echo $zz-100; ?></h6></td>
			</tr>
			   <tr>
			<td colspan="4" align="right"><h6> Delivery Fee :</h6></td>
			<td ><h6> RM 100</h6></td>
			</tr>
			<tr>
			<td colspan="4" align="right"><h6> Total :</h6></td>
			<td ><h6> RM <?php echo $zz; ?></h6></td>
			</tr>


			</tbody>
			</table>
				
			<?php
			$result = mysqli_query($connect, "SELECT * FROM purchaseline 
			WHERE purchase_code =".$_GET['id']) or die(mysqli_error($connect));
			while($row = mysqli_fetch_array($result))
			{   
			$stats = $row['status'];
			}

			if ($stats=='Confirmed') {
			?>
			<h6>Please print this as a proof of purchase</h6>
			<p>  Have a nice day!</p>

			<p> Sincerely,</p>

			<h5>Yours Supplier</h5>
			<?php 
			} 
			else
				{
			} 
			?>
			</div>							   
	</div>
	</ul>
	</span>
	
	<a href="purchase-list.php" class="btn btn-xs btn-info" ">Back</a>
	
	<?php 
	if ($stats=='Confirmed') {
		
	?>
	<a href="#" class="btn btn-xs btn-info" value="print" onclick="PrintDiv();">Print</a>
	<?php }
	?>


	<script type="text/javascript">     
	function PrintDiv() {    
	var divToPrint = document.getElementById('divToPrint');
	var popupWin = window.open('', '_blank', 'width=800,height=800');
	popupWin.document.open();
	popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
	popupWin.document.close();
	}
	</script>
	</div>
	</div>
	</div>
	</div>
	</div>
	<script type="text/javascript" src="scripts/noright.js"></script>
	<script type="text/javascript" src="scripts/main.js"></script>
	</body>
	</html>
