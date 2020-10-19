<?php
	include("inc/dbconnect.php");
	session_start();
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
                                        <div class="page-title-subheading">Supplier [Update Profile]
                                        </div>
                                    </div>
                                </div>                      
                                </div>
                        </div>
						
                        <div class="row">
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
								<div class="card-body">
									<?php
									$supplier_id = $_SESSION['supplier_id'];
									$sql = "select * from supplier where supplier_id ='".$supplier_id."' ";
									$result = mysqli_query($connect,$sql);

									while($row_selectSupplier = mysqli_fetch_array($result))
									{
									?>

										<div class="tab-content">
			
											<div class="position-relative row form-group">
												<label for="supplier:name" class="col-sm-2 col-form-label">Name</label>
												<div class="col-sm-10"><input name="txtSupplierName" id="supplier:name" placeholder="Name" type="text" class="form-control" value="<?php echo $row_selectSupplier['supplier_name']; ?>" readonly /></div>
												
											</div>
											
											<div class="position-relative row form-group">
												<label for="supplier:email" class="col-sm-2 col-form-label">Email</label>
												<div class="col-sm-10"><input name="txtSupplierEmail" id="supplier:email" placeholder="Email" type="text" class="form-control" value="<?php echo $row_selectSupplier['supplier_email']; ?>" readonly /></div>
											</div>
											
											<div class="position-relative row form-group">
												<label for="supplier:phone" class="col-sm-2 col-form-label">Contact</label>
												<div class="col-sm-10"><input name="txtSupplierPhone" id="supplier:phone" placeholder="Phone" type="text" class="form-control" value="<?php echo $row_selectSupplier['supplier_contact']; ?>"  readonly /></div>
											</div>
											
											<div class="position-relative row form-group">
												<label for="supplier:phone" class="col-sm-2 col-form-label">Address</label>
												<div class="col-sm-10"><input name="txtSupplierPhone" id="supplier:phone" placeholder="Address" type="text" class="form-control" value="<?php echo $row_selectSupplier['supplier_address']; ?>"  readonly /></div>
											</div>
											
											<a href="dashboard.php"><input type="button" class="btn btn-secondary" value="Back" class="submit_button" /> </a>
											<!--<a href="change_password.php"><input type="button" class="btn btn-secondary" value="Change Password" class="submit_button" /> </a>-->
										
											<a href="userprofile-update.php?pid=<?php echo $row_selectSupplier['supplier_id']; ?>">
											<input class="btn btn-secondary" type="submit" value="UPDATE" name="submit" /> </a>
											
											     
                                        </div>
										 <?php
                                                    }
                                                ?>
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
