<?php
	require ("../includes/dbconnect.php");
	session_start();
	
	$query = 'SELECT *,concat(`client_fname`," ",`client_lname`)as name, `client_contact`,`client_email`,`client_department` FROM `requestline` a inner join `client` b on a. `client_id`=b. `client_id` 
	WHERE request_code ='.$_GET['id'];
            $result = mysqli_query($connect, $query) or die(mysqli_error($connect));
              while($row = mysqli_fetch_array($result))
              {   
               $stat = $row['status'];
               $name = $row['name'];
               $contact = $row['client_contact'];
               $email = $row['client_email'];
			   $depart = $row['client_department'];
               $cd = $row['request_code'];
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
                                  <div class="page-title-icon">
                                      <i class="pe-7s-display1 icon-gradient bg-premium-dark">
                                      </i>
                                  </div>
                                  <div>Cart(s)</div>
                              </div>
                                </div>
                              </div> -->
	<!--
	========================================================
	* content
	======================================================== -->
	<div class="tab-content">
		<div class="main-card mb-3 card">
		<div class="card-body">
		
		 <?php            
		$result = mysqli_query($connect, 'SELECT current_date FROM client') or die(mysqli_error($connect));
		while($row = mysqli_fetch_array($result))
		{   
		$date = $row['current_date'];
		} 
		?>
				
		<div>
		<h6><b>Order No.# : </b>0<?php echo $cd; ?></h6>
		<h6><b>Name : </b><?php echo $name; ?></h6>
		<h6><b>Contact : </b>0<?php echo $contact; ?></h6>
		<h6><b>Address : </b> <?php echo $depart; ?></h6>
		<input type="hidden" value="<?php echo $date; ?> "> 

		<!--Date 
		<form role="form" method="post" action="request-confirm.php?action=edit & cancel=<?php echo $row['request_code']; ?> ">
		<i class="pe-7s-date"></i>
		<!--<h6><b>Date to Deliver: </b></h6>
		<input type="date" name="dates" style="width: 206px" value="2020-06-22" min="2020-09-01" max="2021-12-12" required ><br>
		</form>-->
		
		<div>
		<br>
		<table class="mb-0 table table-borderless">
		<thead>
				<tr align="left">
				<th> Product </th>
				<th> Order Date </th>
				<th> Quantity </th>
				<th> Price </th>
				<th> Total </th>
				</tr>
			</thead>
			<tbody>
			 <?php 
			 $query = "SELECT b.part_name,a.date,a.quantity,a.price,a.total FROM request a,particulars b WHERE a.part_code=b.part_code AND a.request_code='".$_GET['id']."' GROUP BY a.part_code";
                $result = mysqli_query($connect, $query) or die (mysqli_error($connect));
				while ($row = mysqli_fetch_assoc($result)) {
								 
				echo '<tr>';
				echo '<td>'. $row['part_name'].'</td>';                     
				echo '<td>'. $row['date'].'</td>';
				echo '<td>'. $row['quantity'].'</td>';
				echo '<td>RM '. $row['price'].'</td>';
				echo '<td>RM '. $row['total'].'</td>';
			   /* echo '<td>  ';
				echo '<center> <a  type="button" class="btn btn-lg btn-info fas fa-cart-plus" href="addtransacdetail.php?action=edit & id='.$row['transac_id'] . '"></a> </td></center>';*/
				echo '</tr> ';
					}
				?> 
											
				<?php 
				$query = 'SELECT * FROM requestline WHERE request_code ='.$_GET['id'];
				$result = mysqli_query($connect, $query) or die(mysqli_error($connect));
				while($row = mysqli_fetch_array($result))
				{   
				$zz = $row['totalprice'];
				?>
				
				<tr>
					<td colspan="4" align="right"><br><h6><b> Subtotal :</b></h6></td>
					<td ><br><h6>RM <?php echo $zz; ?></h6></td>
				</tr>
				<tr>
					<td colspan="4" align="right"><h6><b>  Total :</b></h6></td>
					<td ><h6>RM <?php echo $zz; ?></h6></td>
				</tr>
				</tbody>	
			</table>
			
			<?php      
	if ($row['status']=='Pending') {?>
	<a title="Cancel" type="button" class="btn btn-xs btn-danger " onclick="return confirm('Do you want to cancel transaction?')" href="request-confirm.php?action=edit & cancel=<?php echo $row['request_code']; ?> ">Cancel</a>
	<a title="Confirm" type="button" class="btn btn-xs btn-info " onclick="return confirm('Do you want to confirm transaction?')" href="request-confirm.php?action=edit & confirm=<?php echo $row['request_code']; ?>">Confirm</a>
	<a href="request-new.php" class="btn btn-xs btn-warning">Back</a>
	
	<?php
	}elseif ($row['status']=='Confirmed') {?>
	<a title="Cancel" type="button" class="btn btn-xs btn-danger " onclick="return confirm('Do you want to cancel transaction?')" href="request-confirm.php?action=edit & cancel=<?php echo $row['request_code']; ?> ">Cancel</a>
	<a href="request-new.php" class="btn btn-xs btn-warning">Back</a>
	
	<?php 
	}
		elseif 
		($row['status']=='Cancelled') 
	{
		?>
		
	<a title="Confirm" type="button" class="btn btn-xs btn-info " onclick="return confirm('Do you want to confirm transaction?')" href="request-confirm.php?action=edit & confirm=<?php echo $row['request_code']; ?>">Confirm</a>
	<a href="request-new.php" class="btn btn-xs btn-warning">Back</a>
	
				<?php 
			}   
		}  
	?>
	</div>
	</div>
	
	<?php
	$query = 'SELECT * FROM requestline WHERE request_code ='.$_GET['id'];
	$result = mysqli_query($connect, $query) or die(mysqli_error($connect));
	while($row = mysqli_fetch_array($result))
	{   
	$zz = $row['totalprice'];
	}


	?>

	</div>		
	</div>
	</div>
	</div>
	</div>
	<script type="text/javascript" src="scripts/noright.js"></script>
	<script type="text/javascript" src="scripts/main.js"></script></body>
	</html>