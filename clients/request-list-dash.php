	  <h5 class="card-title">List of Demands</h5>
		  
			  <table class="mb-0 table">
				  <thead>
				   <tr align="left">
					<th>ID</th>
					<th>Request No.#</th>
					<th>Order Date</th>
					<th>Required Date</th>
					<th>Status</th>
					<th>Delivery Date</th>
					<th>Remarks</th>
					<th>Details</th>
					<th></th>
				  </tr>
				  </thead>
							
			<tbody>
			<?php
			
			include ("inc/dbconnect.php");
			if (isset($_GET['page_no']) && $_GET['page_no']!="") {
			$page_no = $_GET['page_no'];
			} else {
			$page_no = 1;
			}

			$total_records_per_page = 5;
			$offset = ($page_no-1) * $total_records_per_page;
			$previous_page = $page_no - 1;
			$next_page = $page_no + 1;
			$adjacents = "2"; 

			$result_count = mysqli_query($connect,"SELECT COUNT(*) As total_records FROM `requestline`");
			$total_records = mysqli_fetch_array($result_count);
			$total_records = $total_records['total_records'];
			$total_no_of_pages = ceil($total_records / $total_records_per_page);
			$second_last = $total_no_of_pages - 1; // total page minus 1

			$query = "SELECT * FROM requestline WHERE client_id='".$_SESSION['client_id']."' ORDER BY requestline_id DESC LIMIT $offset, $total_records_per_page";
			$result = mysqli_query($connect, $query) or die (mysqli_error($connect));

			while ($row = mysqli_fetch_assoc($result)) {
		
			echo '<tr>';
				echo '<td>'. $row['requestline_id'].'</td>';
				echo '<td>'. $row['request_code'].'</td>';                     
				echo '<td>'. $row['date'].'</td>';
				echo '<td>'. $row['required_date'].'</td>';
				echo '<td>'. $row['status'].'</td>';
				echo '<td>'. $row['delivery_date'].'</td>';
				echo '<td>'. $row['remarks'].'</td>';
				echo '<td>  ';
				echo '<center> <a class="btn btn-info" title="View list Of Ordered" href="request-detail.php?id='.$row['request_code'].'">View detail</a> </center></td>';
				echo '</tr> ';
				}
			?> 
                                       
		
											
		</tbody>
		
		
					</table>