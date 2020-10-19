
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
                                  <div>List of Demands</div>
                              </div>
                                </div>
                              </div>
		<!--
		========================================================
		* content
		======================================================== -->
		<div class="tab-content">
			  <div class="tab-pane tabs-animation fade show active" id="tab-content-1" role="tabpanel">
				  <div class="main-card mb-3 card">
					<div class="card-body">
						<h5 class="card-title">Latest Demands</h5> <br>
							<tr>
								<td><input type="text" class="form-control" class="search-input" id="myInput" onkeyup="myFunction()" placeholder=" Search by Order No." title="Type In Order No"></td>
							</tr>
							<div class="divider"></div>
							<table id="myTable" class="mb-0 table table-borderless">
												
							<thead>
								<tr>
									<th>ID</th>
									<th>Order No.#</th>
									<th>Client</th>
									<th>Order Date</th>
									<th>Required Date</th>
									<th>Status</th>
									<th>Delivery Date</th>
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

							$total_records_per_page = 10;
							$offset = ($page_no-1) * $total_records_per_page;
							$previous_page = $page_no - 1;
							$next_page = $page_no + 1;
							$adjacents = "2"; 

							$result_count = mysqli_query($connect,"SELECT COUNT(*) As total_records FROM `requestline`");
							$total_records = mysqli_fetch_array($result_count);
							$total_records = $total_records['total_records'];
							$total_no_of_pages = ceil($total_records / $total_records_per_page);
							$second_last = $total_no_of_pages - 1; // total page minus 1

							$query = "SELECT *,concat(`client_fname`,' ',`client_lname`)as name FROM requestline a, client b WHERE a.`client_id`=b.`client_id` 
							ORDER BY requestline_id DESC LIMIT $offset, $total_records_per_page";
							$result = mysqli_query($connect, $query) or die (mysqli_error($connect));

							while ($row = mysqli_fetch_assoc($result)) {

							echo '<tr>';
							echo '<td>'. $row['requestline_id'].'</td>';   
							echo '<td>'. $row['request_code'].'</td>';                     
							echo '<td>'. $row['name'].'</td>';
							echo '<td>'. $row['date'].'</td>';
							echo '<td>'. $row['required_date'].'</td>';
							echo '<td>'. $row['status'].'</td>';
							echo '<td>'. $row['delivery_date'].'</td>';
							echo '<td><a title="View list Of Demands" type="button" class="btn-sm btn-primary" href="request-detail.php?id='.$row['request_code'].'" >View</a></td>';
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
	td = tr[i].getElementsByTagName("td")[1];
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
