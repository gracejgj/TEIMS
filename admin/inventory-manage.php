<?php
 include 'inc/session.php'
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
                                  <div class="page-title-icon">
                                      <i class="pe-7s-display1 icon-gradient bg-premium-dark">
                                      </i>
                                  </div>
                                  <div>Equipment Lists</div>
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
			<tr>
			<td><input type="text" class="form-control" class="search-input" id="myInput" onkeyup="myFunction()" placeholder=" Search by Part No." title="Type In Part No"></td>
			</tr>		
			<div class="card-body"><h5 class="card-title">Manage Inventory [PRODUCTS]</h5>
			<table id="myTable" class="mb-0 table table-hover">
			<thead>
			<tr>
			<th>Name</th>
			<th>Part Number</th>
			<th>Starting</th>
			<th>Received</th>
			<th>Shipped</th>
			<th>On-Hand</th>
			<th>Min Required</th>
			</tr>
			</thead>

			<tbody>
			<!--<php
			$sql = "select * from particulars ORDER BY part_id desc";
			$result_selectParticular = mysqli_query($connect,$sql);

			while($row_selectParticular = mysqli_fetch_array($result_selectParticular))
			{
			?>
			<tr>
			<td><php echo $row_selectParticular['part_id']; ?></td>
			<td><php echo $row_selectParticular['part_name']; ?></td>
			<td><php echo $row_selectParticular['part_code']; ?></td>
			<td> <php echo $row_selectParticular['price']; ?></td>
			<td><php echo $row_selectParticular['quantity']; ?></td>
			<td><php echo $row_selectParticular['rack']; ?> </td>

			<td> <php if($row_selectParticular['quantity'] == 0) 
			{
			echo "<div class='mb-2 mr-2 btn btn-danger'>Not Available</div>";
			} 
			else
			{ 
			echo "<div class='mb-2 mr-2 btn btn-primary'>Available</div>"; 
			}; ?>
			</td>

			<td class="dropdown d-inline-block">
			<button type="button" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown" class="mb-2 mr-2 dropdown-toggle btn btn-light">Action</button>
			<div tabindex="-2" role="menu" aria-hidden="true" class="dropdown-menu">
			<a href="inventory-update.php?pid=<php echo $row_selectParticular['part_id']; ?>" button type="button" tabindex="0" class="dropdown-item">Edit</button></a>
			<input type="submit" name="btn_del" tabindex="0" class="dropdown-item"  value="Delete" onClick="delFunction(<php echo $row_selectParticular['part_id']; ?>)" />
			</div>
			</div>
			</td>

			</tr>
			<php
			}
			?>
			</tbody>
			</table> -->
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
			<script>
			function delFunction(pro_id)
			{
			var message = confirm("Are you sure you want to delete this equipment?");
			if (message == true)
			{
				window.location.href = "inventory-delete.php?pid=" + pro_id;
			}
			else
			{
				
			}
			}
			</script>
	<script> /*search only for products*/
	function myFunction() 
	{
	var input, filter, table, tr, td, i, txtValue;
	input = document.getElementById("myInput");
	filter = input.value.toUpperCase();
	table = document.getElementById("myTable");
	tr = table.getElementsByTagName("tr");
	for (i = 0; i < tr.length; i++) {
	td = tr[i].getElementsByTagName("td")[2];
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
<script type="text/javascript" src="scripts/noright.js"></script>
<script type="text/javascript" src="scripts/main.js"></script></body>
</html>
