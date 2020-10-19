<?php
	include("../includes/dbconnect.php");
	session_start();
		if(isset($_SESSION['admin_login'])) {
		if($_SESSION['admin_login'] == true) {
		}
		else {
			header('Location: ../index.php');
		}
	}

?>

	<?php
	include ("inc/dbconnect.php");

	$sql = "SELECT * FROM particulars";
	$query = $connect->query($sql);
	$countParticulars = $query->num_rows;

	$requestTotal = "SELECT * FROM requestline";
	$requestQuery = $connect->query($requestTotal);
	$countRequest = $requestQuery->num_rows;
	
	$clientTotal = "SELECT * FROM client";
	$clientQuery = $connect->query($clientTotal);
	$countClient = $clientQuery->num_rows;
	
	$lowStockSql = "SELECT * FROM particulars WHERE quantity <= 5";
	$lowStockQuery = $connect->query($lowStockSql);
	$countLowStock = $lowStockQuery->num_rows;

	$supplierTotal = "SELECT * FROM supplier";
	$supplierQuery = $connect->query($supplierTotal);
	$countSupplier = $supplierQuery->num_rows;

	$purchaseTotal = "SELECT * FROM purchase";
	$purchaseQuery = $connect->query($purchaseTotal);
	$countPurchase = $purchaseQuery->num_rows;

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
                                 
                                    <div>Turbine Engine Inventory Management: Spare Parts </div>
                                </div>                    
                                </div>
                        </div>            
						<div class="row">
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content">
                                    <div class="widget-content-wrapper ">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Equipments</div>
                                            <div class="widget-subheading">Listed Equipments</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-primary"><span><?php echo $countParticulars;?></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
											
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content ">
                                    <div class="widget-content-wrapper ">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Suppliers</div>
                                            <div class="widget-subheading">Listed Suppliers</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-primary"><span><?php echo $countSupplier;?> </span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content ">
                                    <div class="widget-content-wrapper ">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Clients</div>
                                            <div class="widget-subheading">Listed  Clients</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-primary"><span><?php echo $countClient; ?> </span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                
							
                        </div>
                                 
                        <div class="row">
							<div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content" class="mb-2 mr-2 btn btn-danger">
								
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left">    
                                            <div class="widget-heading">Stocks</div>
                                            <div class="widget-subheading">Listed Low Stocks</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-danger"><span><?php echo $countLowStock;?></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
								<div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content">
                                    <div class="widget-content-wrapper ">
                                        <div class="widget-content-left">
                                            <div class="widget-heading"> Purchases</div>
                                            <div class="widget-subheading">Listed Purchases</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-success"><span><?php echo $countPurchase;?></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
								<div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content">
                                    <div class="widget-content-wrapper ">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Demands</div>
                                            <div class="widget-subheading">Listed Demands</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-success"><span><?php echo $countRequest;?> </span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
						
						<div class="main-card mb-3 card">
						 	<div class="card-body">
						<?php include 'data3.php';?></div></DIV>
						
						<br>
							
						
	<div class="tab-content">
	
	
		<div class="main-card mb-3 card">
			<div class="card-body">
		
				<div style="width:30%;hieght:20%;text-align:center">
            <h4 class="page-header">Most Requested Equipment</h4>
            <br>
            <canvas  id="chartjs_pie"></canvas> 
        </div> 
					<?php
					include("../includes/dbconnect.php");
					if (!$connect) {
					# code...
					echo "Problem in database connection! Contact administrator!" . mysqli_error();
					}else{
					$sql ="SELECT b.part_name, a.quantity FROM purchase a, particulars b WHERE a.part_code=b.part_code ORDER BY quantity DESC LIMIT 10";
					$result = mysqli_query($connect,$sql)or die(mysqli_error($connect));
					$chart_data="";
									
					while ($row = mysqli_fetch_array($result)) { 

					$productname[]  = $row['part_name']  ;
					$sales[] = $row['quantity'];
					}

					}


					?>
					<script src="//code.jquery.com/jquery-1.9.1.js"></script>
					<script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
					<script type="text/javascript">
					var ctx = document.getElementById("chartjs_pie").getContext('2d');
					var myChart = new Chart(ctx, {
					type: 'pie',
					data: {
					labels:<?php echo json_encode($productname); ?>,
					datasets: [{
					backgroundColor: [
					"#5969ff",
					"#ff407b",
					"#25d5f2",
					"#ffc750",
					"#2ec551",
					"#7040fa",
					 "#ff004e",
					"#4CD7D0",
					"#E1C340",
					"#F52EC0",
					"#40B0DF",
					"#22CAE0",
					"#C8DF52",
					"#0067B3",
					"#D0B49F"
					],
					data:<?php echo json_encode($sales); ?>,
					}]
					},
					options: {
					legend: {
					display: true,
					position: 'bottom',

					labels: {
					fontColor: '#71748d',
					fontFamily: 'Circular Std Book',
					fontSize: 8,
					}
					},


					}
					});
					</script>
                         </div></div></div>
						 
						 <div class="main-card mb-3 card">
						 	<div class="card-body">
						<?php include 'data2.php';?></div></DIV>
						
                    </div>
                  </div>
              
        </div>
    </div>
<script type="text/javascript" src="scripts/main.js"></script></body>
</html>
