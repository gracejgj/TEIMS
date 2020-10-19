<?php
       // The same dapat ang input name sa Add kag Update.....WHAT THE MEN! 
       include('../includes/dbconnect.php');

       		if (isset($_POST['submit'])) {
						$sm = $_POST['supplier'];
					    $contact = $_POST['contact'];
					    $email = $_POST['email'];
						$address = $_POST['address'];
				
			if ($_GET['action'] == 'add') {		
			if ($sm == "") {
              header("Location: suppliers-add.php?required=name");
            }elseif ($contact == "" || $contact < 0 ) {
              header("Location: suppliers-add.php?required=contact");    
            }elseif ($email == "" ) {
              header("Location: suppliers-add.php?required=email");  
            }elseif ($address == "") {
              header("Location: suppliers-add.php?required=address");  
            }else{	
				$query = "INSERT INTO supplier (supplier_name,supplier_email,supplier_contact,supplier_address)
				VALUES ('".$sm."','".$email."','".$contact."','".$address."')";
				mysqli_query($connect,$query)or die (mysqli_error($connect));
				?>
				<script type="text/javascript">
				alert("Successfully added.");
				window.location = "suppliers.php";
				</script>
				<?php
			}
			}
			if ($_GET['action'] == 'update') {
            	$id = $_POST['id'];
			if ($sm == "") {
              header("Location: suppliers-update.php?required=name&id=".$id."");
            }elseif ($contact == "" || $contact < 0 ) {
              header("Location: supplierupdate.php?required=contact&id=".$id."");    
            }elseif ($email == "" ) {
              header("Location: supplierupdate.php?required=email&id=".$id."");  
            }elseif ($address == "") {
              header("Location: supplierupdate.php?required=address&id=".$id."");  
            }else{	
				$query = 'UPDATE supplir set supplier_name ="'.$sm.'",contact ='.$contact.', email="'.$email.'",address ="'.$address.'" WHERE supplier_id ="'.$id.'"';
					$result = mysqli_query($connect, $query) or die(mysqli_error($connect));
				?>
				<script type="text/javascript">
				alert("Update Successful.");
				window.location = "suppliers.php";
				</script>
				<?php
			}
			}
		}
			?>
    	
