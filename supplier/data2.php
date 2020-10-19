
	<script>
	function myFunction() {
		var graf = document.getElementById("graph").value;
		window.location.href = "index.php?type=" + graf;
	}

	window.onload = function () {
	var graph_type = "<?php echo $graph ?>";
	var chart = new CanvasJS.Chart("chartContainer", {
		animationEnabled: true,
		exportEnabled: true,
		theme: "light1", // "light1", "light2", "dark1", "dark2"
		title:{
			text: "Total Units Sold"
		},
		data: [{
			type: graph_type, //change type to bar, line, area, pie, etc
			//indexLabel: "{y}", //Shows y value on all Data Points
			indexLabelFontColor: "#5A5757",
			indexLabelPlacement: "outside",   
			dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
		}]
	});
	chart.render();

	}
	</script>

	
	<?php 
//index.php
$connect = mysqli_connect("localhost", "root", "", "teims");
$query = "SELECT b.part_name, sum (a.quantity) FROM purchase a, particulars b WHERE a.part_code=b.part_code ORDER BY quantity DESC LIMIT 10";
$result = mysqli_query($connect, $query)or die(mysqli_error($con));
$chart_data = '';
while($rows = mysqli_fetch_array($result)) 
{
 $chart_data .= "{ name:'".$rows["b.part_name"]."', quantity:".$rows["sum(a.quantity)"]."}, ";
}
$chart_data = substr($chart_data, 0, -2);
?>
<!DOCTYPE html>
<html>
 <head>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
  
 </head>
 <body>
  <br /><br />
  <div class="container" style="width:900px;">
  </br>
   <h2 align="center">Total quantity requested by month</h2>  
   <br /><br />
   <div id="chart"></div>
  </div>
 </body>
</html>

		
	 <script>
Morris.Bar({
 element : 'chart',
 data:[<?php echo $chart_data; ?>],
 xkey:'date',
 ykeys:['quantity'],
 labels:['Total Unit Sold'],
 hideHover:'auto',
 stacked:true
});
</script>
	