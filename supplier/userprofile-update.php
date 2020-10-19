	
	<?php
	include 'inc/session.php';
	
	$p_id = $_GET['pid'];
	$sql = "select * from supplier WHERE supplier_id = '$p_id'";
	$result = mysqli_query($connect,$sql);
	$row_selectSupplier = mysqli_fetch_array($result);
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

                </div>    <div class="app-main__outer">
                    <div class="app-main__inner">
                      <div class="app-page-title">
                          <div class="page-title-wrapper">
                              <div class="page-title-heading">
                                  <div class="page-title-icon">
                                      <i class="pe-7s-display1 icon-gradient bg-premium-dark">
                                      </i>
                                  </div>
                                  <div>Storekeeper Profile</div>
                              </div>
                                </div>
                              </div>
                        <!--
                        ========================================================
                        * content
                        ======================================================== -->
                        <div class="tab-content">
                            <div class="tab-pane tabs-animation fade show active" id="tab-content-1" role="tabpanel">
                              <div class="tab-pane tabs-animation fade show active" id="tab-content-1" role="tabpanel">
                                  <div class="main-card mb-3 card">
                                      <div class="card-body">
									  
									  
										<!-- FORM -->
										<form action="userprofile-update1.php?pid=<?php echo $p_id; ?>" method="post">	
												  <?php 
										if (isset($_GET['error'])) {
										if ($_GET["error"]=="emptyfields") {
										echo '<p class="text-danger error-msg">Fill in all fields</p>';
										}
										} 


										?>
									    <table class="mb-0 table table-borderless">
                                       
													<tr>
														<td> Name </td>
														<td> <input type="text" name="sname" value="<?php echo $row_selectSupplier['supplier_name']; ?>" class="form-control" pattern="[a-zA-Z0-9\s]+" title="Must contains only characters" required /> </td>
													</tr>
												
													<tr>
														<td align="left"> Email </td>
														<td> <input type="text" name="email" value="<?php echo $row_selectSupplier['supplier_email']; ?>" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="lowercases@only.com" required /></td>
													</tr>
													
													<tr>
														<td> Contact </td>
														<td> <input type="text" name="contact" value="<?php echo $row_selectSupplier['supplier_contact']; ?>" class="form-control" pattern="[0-9]+" minlength ="9" maxlength = "14" title="Please enter number only" required /> </td>
													</tr>
													
													
													<tr>
														<td> Address </td>
														<td> <input type="text" name="address" value="<?php echo $row_selectSupplier['supplier_address']; ?>" class="form-control" pattern ="[^[a-zA-Z0-9!@#$&()\\-`.+,/\]"*$]" required /> </td>
													</tr>
													
													
													<tr>
														<td colspan="1">&nbsp;</td>
													</tr>
													
													<tr>
														<td></td>
														<td>
															<input class="btn btn-secondary" type="submit" value="Save Changes" name="submit" />
															<a href="userprofile.php" class="btn btn-secondary">Back</a>
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
					<script type="text/JavaScript">
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
                             
<script type="text/javascript" src="scripts/main.js"></script>
</body>
</html>
										