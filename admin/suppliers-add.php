<?php
 include 'inc/session.php';
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
	<div class="main-card mb-3 card">
		<div class="card-body">
			<h5 class="card-title">Add New Supplier</h5>
		<form role="form" method="post" action="suppliers-add1.php?action=add">
                <?php
          if (isset($_GET['required'])) {
            if ($_GET["required"]=="name") {
              echo '<p class="error-msg text-danger"> Supplier name is required</p>';
            }elseif ($_GET["required"]=="contact") {
               echo '<p class="error-msg text-danger"> Contact number is required</p>';
            }elseif ($_GET["required"]=="email") {
               echo '<p class="error-msg text-danger"> Email is required</p>';
            }elseif ($_GET["required"]=="address") {
               echo '<p class="error-msg text-danger"> Address is required</p>';
            } 
            }      ?>
			<table class="table table-hover">
					 
			<tr>
				<td> First Name</td>
				<td> <input type="text" name="supplier" class="form-control" pattern="^[a-zA-Z]+$" title="Must contains only characters" required /> </td>
			</tr>
			
		
				<td> Contact</td>
				<td> <input type="TEXT" name="contact" class="form-control" pattern="\d*"  minlength = "10" maxlength = "14" title="Only numbers are allowed" required /> </td>
			</tr>
			
			<tr>
				<td> Email</td>
				<td> <input type="textarea" name="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="lemongrace@gmail.com" required /> </td>
			</tr>
			
			<tr>
			<td> Address </td>
			<td><input class="form-control" placeholder="Address" name="address"></td>
			</tr>
			
			<tr>
				<td></td>
				<td><input class="btn btn-secondary" type="submit" name="submit" />
				<a href="suppliers.php" class="btn btn-secondary">Back</a></td>
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
