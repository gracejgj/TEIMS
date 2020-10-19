<?php
	include("../includes/dbconnect.php");

	session_start();
	if(isset($_SESSION['supplier_login'])) {
		if($_SESSION['supplier_login'] == true) {
			$id = $_SESSION['supplier_id'];
		}
		else {
			header('Location:../index.php');
		}
	}
	
?>


<?php
	 include ("inc/dbconnect.php");
	 
	$sql = "SELECT * FROM purchaseline";
	$query = $connect->query($sql);
	$countParticulars = $query->num_rows;

	$partSql = "SELECT * FROM particulars";
	$partQuery = $connect->query($partSql);
	$countPart = $partQuery->num_rows;
	
	$supplierTotal = "SELECT * FROM supplier";
	$supplierQuery = $connect->query($supplierTotal);
	$countSupplier = $supplierQuery->num_rows;

	$connect->close();
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
                                 
                                    <div>Turbine Engine Inventory Management: Spare Parts
                                        <div class="page-title-subheading">Suppliers
                                        </div>
                                    </div>
                                </div>                      
                                </div>
                        </div>
						<div class="row">
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Orders</div>
                                            <div class="widget-subheading">Total Orders</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers"><span><?php echo $countParticulars;?></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Equipments</div>
                                            <div class="widget-subheading">Total Equipments</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers"><span><?php echo $countPart;?></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Suppliers</div>
                                            <div class="widget-subheading">Total Suppliers</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers"><span><?php echo $countSupplier ?></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                       
                        </div>
							<div class="row">
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Total Sales</div>
                                            <div class="widget-subheading">Total sales till date</div>
                                        </div>
										<?php
										include ("inc/dbconnect.php");
										if(mysqli_connect_errno()){
										echo "Connection Fail".mysqli_connect_error();
										}
										$result = mysqli_query($connect, "select sum(purchase.quantity*particulars.price) as tt 
										from purchase join particulars on particulars.part_code=purchase.part_code");
										$row = mysqli_fetch_array($result);
										?>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers"><span><?php echo number_format($row['tt'],2);?></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
							
							<?php
							include ("inc/dbconnect.php");
							if(mysqli_connect_errno()){
							echo "Connection Fail".mysqli_connect_error();
							}
							$qury=mysqli_query($connect,"select sum(purchase.quantity*particulars.price) as tt 
							from purchase join particulars on particulars.part_code=purchase.part_code where date(purchase.date)>=(DATE(NOW()) - INTERVAL 7 DAY)");
							$row=mysqli_fetch_array($qury);
							?>
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Last 7 Days Sales</div>
                                            <div class="widget-subheading">Last 7 Days Total Sales</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers"><span><?php echo number_format($row['tt'],2);?></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
							<?php
							$qurys=mysqli_query($connect,"select sum(purchase.quantity*particulars.price) as tt 
							from purchase join particulars on particulars.part_code=purchase.part_code where date(purchase.date)=CURDATE()-1");
							$rw=mysqli_fetch_array($qurys);
							?>
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Yesterday Sales</div>
                                            <div class="widget-subheading">Yesterday Total Sales</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers"><span><?php echo number_format($rw['tt'],2);?></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                       
                        </div>
								<div class="row">
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Today's Sales</div>
                                            <div class="widget-subheading">Today's Total Sales</div>
                                        </div>
										<?php
										include ("inc/dbconnect.php");
										if(mysqli_connect_errno()){
										echo "Connection Fail".mysqli_connect_error();
										}
										$quryss = mysqli_query($connect, "select sum(purchase.quantity*particulars.price) as tt 
										from purchase join particulars on particulars.part_code=purchase.part_code where date(purchase.date)=CURDATE()");
										$rws=mysqli_fetch_array($quryss);
										?>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers"><span><?php echo number_format($rws['tt'],2);?></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
							</div>

		<div class="main-card mb-3 card">
			<div class="card-body">
				<?php include 'data3.php';?>
			</div>
		</div>
		</div>
		</div>
		</div>
		</div>
		</div>
		<script type="text/javascript" src="scripts/main.js"></script>
		</body>
		</html>
