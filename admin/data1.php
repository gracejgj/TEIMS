<?php
$con  = mysqli_connect("localhost","root","","teims");
 if (!$con) {
     # code...
    echo "Problem in database connection! Contact administrator!" . mysqli_error();
 }else{	
        $sql ="SELECT * from particulars, request, requestline WHERE particulars.part_code=request.part_code AND
		request.request_code=requestline.request_code ORDER BY part_id LIMIT 5"; 
		$result = mysqli_query($con,$sql)or die(mysqli_error($con));
        $chart_data="";
        while ($row = mysqli_fetch_array($result)) { 
 
            $productname[]  = $row['part_name']  ;
            $sales[] = $row['totalprice'];
        }
 
 
 }
 
 
?>

    <body>
        <div style="width:60%;hieght:20%;text-align:center">
            <h2 class="page-header" >Analytics Reports </h2>
            <div>Product </div>
            <canvas  id="chartjs_bar"></canvas> 
        </div>    
    </body>
  <script src="//code.jquery.com/jquery-1.9.1.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script type="text/javascript">
      var ctx = document.getElementById("chartjs_bar").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels:<?php echo json_encode($productname); ?>,
                        datasets: [{
                            backgroundColor: [
                               "#5969ff",
                                "#ff407b",
                                "#25d5f2",
                                "#ffc750",
                                "#2ec551",
                                "#7040fa",
                                "#ff004e"
                            ],
                            data:<?php echo json_encode($sales); ?>,
                        }]
                    },
                    options: {
                           legend: {
                        display: true,
                        position: 'bottom',
 
                        labels: {
                            fontColor: '#71748d',
                            fontFamily: 'Circular Std Book',
                            fontSize: 14,
                        }
                    },
 
 
                }
                });
    </script>
</html>