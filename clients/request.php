<?php
include "../includes/dbconnect.php";
session_start();
if (isset($_POST["add_to_cart"]))
{
    $av = $_POST['av'];
    $qq = $_POST["quant"];
    if ($av > 0)
    {

        if ($av > $qq || $av == $qq)
        {

            if (isset($_SESSION["cart"]))
            {
                $itemarrayid = array_column($_SESSION["cart"], "ids");
                if (!in_array($_GET["id"], $itemarrayid))
                {

                    $count = count($_SESSION["cart"]);
                    $itemarray = array(
                        'ids' => $_GET["id"],
                        'name' => $_POST["hiddenname"],
                        'price' => $_POST["hiddenprice"],
                        'quantity' => $_POST["quant"]
                    );
                    $_SESSION["cart"][$count] = $itemarray;
                    echo "<script>alert('Product is added to your cart!')</script>";
                    echo "<script>window.location = 'request-cart.php'</script>";
                }
                else
                {
                    echo "<script>alert('Item Already Added')</script>";
                    echo "<script>window.location = 'request-cart.php'</script>";
                }
            }
            else
            {
                $itemarray = array(
                    'ids' => $_GET["id"],
                    'name' => $_POST["hiddenname"],
                    'price' => $_POST["hiddenprice"],
                    'quantity' => $_POST["quant"]
                );
                $_SESSION['cart'][0] = $itemarray;
            }
        }
        else
        {
            echo '<script>alert("Invalid Quantity")</script>';
            echo '<script>window.location="request.php"</script>';

        }
    }
    else
    {
        echo '<script>alert("Out of Stocks")</script>';
        echo '<script>window.location="request.php"</script>';
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
    <title>Turbine Engine Inventory Management: Spare Parts</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
  
<link href="css/main.css" rel="stylesheet"></head>
<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
	 <?php include 'aa-header.php'; ?>

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

                    	 <?php include 'aa-sidebar.php'; ?>

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
                                  <div>Create Request Equipment</div>
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
		  <h5 class="card-title">Create Request Equipment</h5>
<tr>
<td align="right">
<input type="text" class="form-control" id="myInput" onkeyup="myFunction()" placeholder="Search by part number" title="Type in part number"></td>
</tr> <br>
	
			  <table class="table table-bordered table-hover" id="myTable">
				  <thead>
				   <tr align="left">
					<th>Part Number</th>
					<th>Part Name</th>
					<th>Available</th>
					<th>Price (RM)</th>
					<th>Quantity</th>
					<th>Action</th>
				  </tr>
				  </thead>
							
			<tbody>
			<?php
$query = "SELECT * FROM particulars WHERE quantity != 0 GROUP BY part_code";
$result = mysqli_query($connect, $query);
if (mysqli_num_rows($result) > 0)
{
    while ($row = mysqli_fetch_array($result))
    {
        $_SESSION['zero'] = $row["quantity"];
        $_SESSION['one'] = $row["part_code"];
        if ($_SESSION['zero'] == 1)
        {
            $sqls = "UPDATE particulars SET status = 'Unavailable' WHERE part_code='" . $_SESSION['one'] . "'";
            mysqli_query($connect, $sqls) or die(mysqli_error($connect));
        }
?>
			
	
		<form action="request.php?action=add&id=<?php echo $row["part_code"]; ?>" method="POST">
		
			<tr align="left" style="text-transform:uppercase">
				
				<td class="text-info"> <?php echo $row["part_code"]; ?> </td>
				
				<td> <?php echo $row["part_name"]; ?></td>
				
				<td> <?php echo $row["quantity"]; ?> </td>
				
				<td class="text-danger"><?php echo $row["price"]; ?></td>
				
				<td><input class="form-control" type="number" min="0" placeholder="Quantity" name="quant" value="1"></td>
				
				<input class="form-control" type="hidden" name="av" value="<?php echo $row["quantity"]; ?>">
				
				<input class="form-control" type="hidden" name="hiddenname" value="<?php echo $row["part_name"]; ?>">
				
				<input class="form-control" type="hidden" name="hiddenprice" value="<?php echo $row["price"]; ?>">
				
				<td> <input class="btn btn-success" type="submit" name="add_to_cart" value="Add to Cart" style="margin-top: 10px"></center></td>
			
			</tr> 

			</form>
			<?php
    }
}
?>
		</tbody>
	</table>
		</div>
			</div>
		</div>
	</div>
</div>

    
    </div>
	</div>
	<script> /*search only for products*/
	function myFunction() 
	{
	var input, filter, table, tr, td, i, txtValue;
	input = document.getElementById("myInput");
	filter = input.value.toUpperCase();
	table = document.getElementById("myTable");
	tr = table.getElementsByTagName("tr");
	for (i = 0; i < tr.length; i++) {
	td = tr[i].getElementsByTagName("td")[0];
	if (td) {
	txtValue = td.textContent || td.innerText;
	if (txtValue.toUpperCase().indexOf(filter) > -1) {
	tr[i].style.display = "";
		} else {
	tr[i].style.display = "none";
			}
			}       
		}
	}
	</script>
<script type="text/javascript" src="scripts/main.js"></script>
<script type="text/javascript" src="scripts/noright.js"></script></body>
</html>
