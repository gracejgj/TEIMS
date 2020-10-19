<?php
	include("../includes/dbconnect.php");	
	
	session_start();
	if(isset($_SESSION['client_login'])) {
		if($_SESSION['client_login'] == true) {
			$id = $_SESSION['client_id'];
		}
		else {
			header('Location:../index.php');
		}
	}

?>
	
<?php 
 include ("inc/dbconnect.php");

$sql = "SELECT * FROM requestline WHERE client_id=$id";
$query = $connect->query($sql);
$countRequestline = $query->num_rows;

$partSql = "SELECT * FROM particulars";
$partQuery = $connect->query($partSql);
$countPart = $partQuery->num_rows;


$clientSql = "SELECT * FROM client";
$clientQuery = $connect->query($clientSql);
$countClient = $clientQuery->num_rows;

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
                                        <div class="page-title-subheading">Clients
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
                                            <div class="widget-numbers"><span><?php echo $countRequestline;?></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
							
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Equipment</div>
                                            <div class="widget-subheading">Total Equipment</div>
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
                                            <div class="widget-heading">Clients</div>
                                            <div class="widget-subheading">Total Clients</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers"><span><?php echo $countClient;?></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                       
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
								
                                 
									
                                    <div class="card-body">
                                        <div class="tab-content">
											 <?php include 'request-list-dash.php';?>

                                        </div>
                                    </div>
									
                                </div>
                            </div>

                        </div>
                       
                     
                    </div>
                    
                  </div>

        </div>
    </div>
<script type="text/javascript" src="scripts/main.js"></script></body>
</html>
