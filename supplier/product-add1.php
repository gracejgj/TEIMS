<?php
    // The same dapat ang input name sa Add kag Update.....WHAT THE MEN!!! 
     include('../includes/dbconnect.php');
     if (isset($_POST['submit'])) {

		if ($_GET['action'] == 'add') {	
		$product = $_POST['product'];
		$partname = $_POST['partname'];
		$quantity = $_POST['quantity'];
		$price = $_POST['price'];
		$rack = $_POST['rack'];
			$result = mysqli_query($connect, "SELECT * FROM particulars WHERE part_code = '".$product."'");
			$checkprod = mysqli_num_rows($result);
			if ($checkprod > 0) {
              header("Location: product-add.php?required=producttaken");    
            }elseif ($product == "") {
              header("Location: product-add.php?required=product");
            }elseif ($quantity == "" || $quantity < 0 ) {
              header("Location: product-add.php?required=quantity");    
            }elseif ($price == "" || $price < 0 ) {
              header("Location: product-add.php?required=price");  
            }elseif ($partname == "" || $partname < 0 ) {
              header("Location: product-add.php?required=partname");  
            }else{
				$date = $_POST['date'];
				$user = $_POST['user'];
            	$query = "INSERT INTO `particulars`(`part_name`, `part_code`, `price`, `quantity`,`rack`,`stk_id`, `status`, `date_in`)
				VALUES ('".$partname."','".$product."','".$price."','".$quantity."','".$rack."','".$user."','".$date."','Available')";
				mysqli_query($connect,$query)or die (mysqli_error($connect));
				?>
				<script type="text/javascript">
				alert("Successfully added.");
				window.location = "product.php";
				</script>
				<?php
		}			
		}if ($_GET['action'] == 'update') {
		$product = $_POST['product'];
		$price = $_POST['price'];
		$markup = $_POST['markup'];
		$category = $_POST['category'];
		$supplier = $_POST['supplier'];
			$id = $_POST['id'];
			if ($product == "") {
              header("Location: productupdate.php?required=product&id=".$id."");
            }elseif ($price == "" || $price < 0 ) {
              header("Location: productupdate.php?required=price&id=".$id."");  
            }elseif ($markup == "" || $markup < 0 ) {
              header("Location: productupdate.php?required=markup&id=".$id."");  
            }elseif ($category == "") {
              header("Location: productupdate.php?required=category&id=".$id."");  
            }elseif ($supplier == "") {
              header("Location: productupdate.php?required=supplier&id=".$id."");  
            }else{
            	$query = 'UPDATE particulars set product_name ="'.$product.'", price="'.$price.'",
					profit ="'.$markup.'",`category_id`="'.$category.'",`supplier_id`="'.$supplier.'" WHERE product_code ="'.$id.'"';
				mysqli_query($connect, $query) or die(mysqli_error($connect));
				
					?>
				<script type="text/javascript">
				alert("Update successfully.");
				window.location = "product.php";
				</script>
				<?php
		}		
		}if ($_GET['action'] == 'updatequantity') {
		$quantity = $_POST['quantity'];
			$id = $_POST['id'];
			if (empty($quantity) || $quantity < 0) {
				header("Location: updatequantity.php?required=quant&id=".$id."");  
			}else{
				$sql = 'UPDATE particulars set quantity = quantity + "'.$quantity.'" WHERE product_code ="'.$id.'"';
				mysqli_query($connect, $sql) or die(mysqli_error($connect));
				?>
				<script type="text/javascript">
				alert("Update successfully.");
				window.location = "product.php";
				</script>
				<?php
			}
		}			
		}
				?>
    	