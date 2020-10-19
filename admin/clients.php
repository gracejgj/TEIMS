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
                                  <div>Clients List</div>
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
			<a button class="mb-2 mr-2 btn btn-light" align="right" href="clients-add.php">Add Clients</button></a>
			
			</div>
									

			<div class="card-body"><h5 class="card-title">Manage Clients</h5>
			<tr>
				<td><input type="text" class="form-control" class="search-input" id="myInput" onkeyup="myFunction()" placeholder=" Search by Name" title="Type In CLient Name"></td>
			</tr>	
				<table id="myTable" class="mb-0 table table-hover">
			<thead>
			<tr>

			<th>Client Name</th>
			<th>Contact</th>
			<th>Email</th>
			<th>Username</th>
			<th>Password</th>
			<th>Action</th>
			</tr>
			</thead>

                                          <tbody>
                                            <?php
                                            $sql = 'select *, concat (`client_fname`," ",`client_lname`) as name from client ORDER BY client_id DESC';
                                            $result = mysqli_query($connect,$sql);

                                              while($row_selectClient = mysqli_fetch_array($result))
                                              {
                                                ?>
                                                  <tr>
													
                                                    <td><?php echo $row_selectClient['name']; ?></td>
													<td>+60 <?php echo $row_selectClient['client_contact']; ?></td>
													<td><?php echo $row_selectClient['client_email']; ?></td>
                                                    <td><?php echo $row_selectClient['username']; ?></td>
                                                    <td> <?php echo $row_selectClient['password']; ?></td>
                                                    <td>
                                                      <div class="dropdown d-inline-block">
                                                          <button type="button" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown" class="mb-2 mr-2 dropdown-toggle btn btn-light">Action</button>
                                                          <div tabindex="-2" role="menu" aria-hidden="true" class="dropdown-menu">
                                                              <a href="clients-update.php?pid=<?php echo $row_selectClient['client_id']; ?>" button type="button" tabindex="0" class="dropdown-item">Edit</button></a>
                                                             <input type="submit" name="btn_del" tabindex="0" class="dropdown-item"  value="Delete" onClick="delFunction(<?php echo $row_selectClient['client_id']; ?>)" />
                                                          </div>
                                                      </div>
                                                    </td>

                                                  </tr>
                                                      <?php
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
                    </div>

                  </div>
          
        </div>
    </div>
	<script>
	function delFunction(pro_id)
	{
		var message = confirm("Are you sure you want to delete this client?");
		if (message == true)
		{
			window.location.href = "clients-delete.php?pid=" + pro_id;
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
<script type="text/javascript" src="scripts/main.js"></script></body>
</html>
