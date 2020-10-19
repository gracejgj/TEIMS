	
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
			<div class="app-page-title">
			<div class="page-title-wrapper">
			<div class="page-title-heading">
			<div>Turbine Engine Inventory Management: Spare Parts
			<div class="page-title-subheading">Suppliers</div>
			</div>
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
			<h5 class="card-title">Latest Purchases</h5> 
		<tr><td>
			<input type="text" class="form-control" class="search-input" id="myInput" onkeyup="myFunction()" placeholder=" Search by Purchase No." title="Type In Purchase No">
		</td></tr>
		<div class="divider"></div>
		<table id="myTable" class="mb-0 table table-borderless">

		<thead>
		<tr>
		<th>Purchase No.#</th>
		<th>Customer</th>
		<th>Order Date</th>
		<th>Delivery Date</th>
		<th>Total Price</th>
		<th>Status</th>
		<th>Option</th> 
		</tr>
		</thead>	
		<tbody>
		<?php 
		if (isset($_GET['page_no']) && $_GET['page_no']!="") {
			$page_no = $_GET['page_no'];
			} else {
			$page_no = 1;
			}

			$total_records_per_page = 8;
			$offset = ($page_no-1) * $total_records_per_page;
			$previous_page = $page_no - 1;
			$next_page = $page_no + 1;
			$adjacents = "2"; 

			$result_count = mysqli_query($connect,"SELECT COUNT(*) As total_records FROM `particulars`");
			$total_records = mysqli_fetch_array($result_count);
			$total_records = $total_records['total_records'];
			$total_no_of_pages = ceil($total_records / $total_records_per_page);
			$second_last = $total_no_of_pages - 1; // total page minus 1
			
	$query = "SELECT * FROM purchaseline a, admin b WHERE a.`stk_id`=b.`stk_id` ORDER BY purchaseline_id DESC LIMIT $offset, $total_records_per_page ";
		$result = mysqli_query($connect, $query) or die (mysqli_error($connect));

		while ($row = mysqli_fetch_assoc($result)) {

		echo '<tr>';
		echo '<td>'. $row['purchase_code'].'</td>';                     
		echo '<td>'. $row['stk_name'].'</td>';
		echo '<td>'. $row['date'].'</td>';
		echo '<td>'. $row['delivery_date'].'</td>';
		echo '<td>'. $row['total_price'].'</td>';
		echo '<td>'. $row['status'].'</td>';
		echo '<td><a title="View list Of Purchase" type="button" class="btn-sm btn-primary" href="order-detail.php?id='.$row['purchase_code'].'" >View</a></td>';



		echo '</tr> ';
		}
		?> 
		</tbody>
</table>
	 <?php include 'page.php';?>
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
		<script type="text/javascript" src="scripts/noright.js"></script>
		<script type="text/javascript" src="scripts/main.js"></script>
	</body>
</html>
