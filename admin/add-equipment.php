<?php
session_start();
//error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{
// Add product Code
if(isset($_POST['submit']))
{
//Getting Post Values
$pname=$_POST['partName']; 
$partno=$_POST['partNo'];   
$pprice=$_POST['partPrice'];
$pquantity=$_POST['partQuantity'];
$query=mysqli_query($con,"insert into particulars(partName,partNo,partPrice,partQuantity) values('$pname','$partno','$pprice','$pquantity')"); 
if($query){
echo "<script>alert('Product added successfully.');</script>";   
echo "<script>window.location.href='add-equipment.php'</script>";
} else{
echo "<script>alert('Something went wrong. Please try again.');</script>";   
echo "<script>window.location.href='add-equipment.php'</script>";    
}
}

    ?>
<!doctype html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>JFM Turbine Inventory Management: Spare Parts</title>
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
                                  <div>Purchase Order</div>
                              </div>
                                </div>
                              </div>
                        <!--
                        ========================================================
                        * content
                        ======================================================== -->
                        <div class="tab-content">

                              <div class="main-card mb-3 card">

                                <div class="card-body"><button class="mb-2 mr-2 btn btn-light" align="right">Add Order
                                </button>
                                </div>

                                  <div class="card-body"><h5 class="card-title">Manage Order</h5>

                                  </div>
                              </div>

                            </div>

                        </div>

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
<?php } ?>       


      

<form class="needs-validation" method="post" novalidate>
                                       
<div class="form-row">
<div class="col-md-6 mb-10">
<label for="validationCustom03">Category</label>
 <select class="form-control custom-select" name="category" required>
<option value="">Select category</option>
<?php
$ret=mysqli_query($con,"select CategoryName from tblcategory");
while($row=mysqli_fetch_array($ret))
{?>
<option value="<?php echo $row['CategoryName'];?>"><?php echo $row['CategoryName'];?></option>
<?php } ?>
</select>
<div class="invalid-feedback">Please select a category.</div>
</div>
</div>

<div class="form-row">
<div class="col-md-6 mb-10">
<label for="validationCustom03">Company</label>
 <select class="form-control custom-select" name="company" required>
<option value="">Select Company</option>
<?php
$ret=mysqli_query($con,"select CompanyName from tblcompany");
while($row=mysqli_fetch_array($ret))
{?>
<option value="<?php echo $row['CompanyName'];?>"><?php echo $row['CompanyName'];?></option>
<?php } ?>
</select>
<div class="invalid-feedback">Please select a company.</div>
</div>
</div>
 <div class="form-row">
<div class="col-md-6 mb-10">
<label for="validationCustom03">Product Name</label>
<input type="text" class="form-control" id="validationCustom03" placeholder="Product Name" name="productname" required>
<div class="invalid-feedback">Please provide a valid product name.</div>
</div>
</div>   

<div class="form-row">
<div class="col-md-6 mb-10">
<label for="validationCustom03">Product Price</label>
<input type="text" class="form-control" id="validationCustom03" placeholder="Product Price" name="productprice" required>
<div class="invalid-feedback">Please provide a valid product price.</div>
</div>
</div>

<button class="btn btn-primary" type="submit" name="submit">Submit</button>
</form>

