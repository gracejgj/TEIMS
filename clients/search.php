	<?php
		if($_SERVER['REQUEST_METHOD'] == "POST") {
				if(isset($_POST['cmbFilter'])) {
					if(!empty($_POST['txtId'])) {
						$result = validate_number($_POST['txtId']);
						if($result == 1) {
							$request_id = $_POST['txtId'];
							$query_selectOrder = "SELECT * FROM request,client WHERE request.client_id=client.client_id AND request_id='$request_id' AND request.client_id='$client_id'";
							$result_selectOrder = mysqli_query($con,$query_selectOrder);
							$row_selectOrder = mysqli_fetch_array($result_selectOrder);
							if(empty($row_selectOrder)){
							   $error = "* No order was found with this ID";
							}
							else {
								mysqli_data_seek($result_selectOrder,0);
							}
						}
						else {
							$error = "* Invalid ID";
						}
					}
					else if(!empty($_POST['txtDate'])) {
						$date = $_POST['txtDate'];
						$query_selectOrder = "SELECT * FROM request,client WHERE request.client_id=client.client_id AND date='$date' AND request.client_id='$client_id'";
						$result_selectOrder = mysqli_query($con,$query_selectOrder);
						$row_selectOrder = mysqli_fetch_array($result_selectOrder);
						if(empty($row_selectOrder)){
						   $error = "* No order was found with the selected Date";
						}
						else {
							mysqli_data_seek($result_selectOrder,0);
						}
						
					}
					else if(!empty($_POST['cmbStatus'])) {
						if($_POST['cmbStatus'] == "zero") {
							$status = 0;
						}
						else {
							$status = $_POST['cmbStatus'];
						}
						$query_selectOrder = "SELECT * FROM request,client WHERE request.client_id=client.client_id AND status='$status' AND request.client_id='$client_id' ORDER BY approved,request_id DESC";
						$result_selectOrder = mysqli_query($con,$query_selectOrder);
						$row_selectOrder = mysqli_fetch_array($result_selectOrder);
						if(empty($row_selectOrder)){
						   $error = "* No order was found";
						}
						else {
							mysqli_data_seek($result_selectOrder,0);
						}
					}
					else if(!empty($_POST['cmbApproved'])) {
						if($_POST['cmbApproved'] == "zero") {
							$approved = 0;
						}
						else {
							$approved = $_POST['cmbApproved'];
						}
						$query_selectOrder = "SELECT * FROM request,client WHERE request.client_id=client.client_id AND client.area_id=area.area_id AND approved='$approved' AND request.client_id='$client_id' ORDER BY request_id DESC";
						$result_selectOrder = mysqli_query($con,$query_selectOrder);
						$row_selectOrder = mysqli_fetch_array($result_selectOrder);
						if(empty($row_selectOrder)){
						   $error = "* No order was found";
						}
						else {
							mysqli_data_seek($result_selectOrder,0);
						}
					}
					else {
						$error = "* Please enter the data to search for.";
					}
				}
				else {
					$error = "Please choose an option to search for.";
				}
			}
?>
	
		<script>
  $(function() {
    $( "#datepicker" ).datepicker({
     changeMonth:true,
     changeYear:true,
     yearRange:"-100:+0",
     dateFormat:"yy-mm-dd"
  });
  });
  </script>
  
	<section>
		<h1>My request</h1>
		<form action="" method="POST" class="form">
			Search By: 
			<div class="input-box">
			<select name="cmbFilter" id="cmbFilter">
			<option value="" disabled selected>-- Search By --</option>
			<option value="id"> Id </option>
			<option value="date"> Date </option>
			<option value="status"> Status </option>
			<option value="approved"> Approval </option>
			</select>
			</div>
			
			<div class="input-box"> <input type="text" name="txtId" id="txtId" style="display:none;" /> </div>
			<div class="input-box"> <input type="text" id="datepicker" name="txtDate" style="display:none;"/> </div>
			<div class="input-box">
			<select name="cmbApproved" id="cmbApproved" style="display:none;">
				<option value="" disabled selected>-- Select Option --</option>
				<option value="zero"> Not Approved </option>
				<option value="1"> Approved </option>
			</select>
			</div>
			
			<input type="submit" class="submit_button" value="Search" /> <span class="error_message"> <?php echo $error; ?> </span>
		</form>
		
		<form action="" method="POST" class="form">
		<table class="table_displayData" style="margin-top:20px;">
			<tr>
				<th> Order ID </th>
				<th> Date </th>
				<th> Request No.# </th>
				<th> Status </th>
				<th> Details </th>
			</tr>
			<?php $i=1; while($row_selectOrder = mysqli_fetch_array($result_selectOrder)) { ?>
			<tr>
			
				<td> <?php echo $row_selectOrder['request_id']; ?> </td>
				
				<td> <?php echo date("d-m-Y",strtotime($row_selectOrder['date'])); ?> </td>
			
				<td>
					<?php
						if($row_selectOrder['status'] == 0) {
							echo "Pending";
						}
						else {
							echo "Completed";
						}
					?>
				</td>
				<td> <a href="view_order_items.php?id=<?php echo $row_selectOrder['request_id']; ?>">Details</a> </td>
			</tr>
			<?php $i++; } ?>
		</table>
		</form>
	</section>
	
	<script type="text/javascript">
		$('#cmbFilter').change(function() {
			var selected = $(this).val();
			if(selected == "id"){
				$('#txtId').show();
				$('#datepicker').hide();
				$('#cmbStatus').hide();
				$('#cmbApproved').hide();
			}
			else if (selected == "date"){
				$('#txtId').hide();
				$('#datepicker').show();
				$('#cmbStatus').hide();
				$('#cmbApproved').hide();
			}
			else if (selected == "status"){
				$('#txtId').hide();
				$('#datepicker').hide();
				$('#cmbStatus').show();
				$('#cmbApproved').hide();
			}
			else if (selected == "approved"){
				$('#txtId').hide();
				$('#datepicker').hide();
				$('#cmbStatus').hide();
				$('#cmbApproved').show();
			}
		});
	</script>