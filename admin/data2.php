<?php
$con  = mysqli_connect("localhost","root","Jgracej9306__","teims");
 if (!$con) {
     # code...
    echo "Problem in database connection! Contact administrator!" . mysqli_error();
 }else{
              $sql ="SELECT * from particulars, request, requestline WHERE particulars.part_code=request.part_code AND
		request.request_code=requestline.request_code ORDER BY totalprice DESC LIMIT 10"; 
         $result = mysqli_query($con,$sql);
         $chart_data="";
         while ($row = mysqli_fetch_array($result)) { 
 
            $productname[]=$row['part_name'];
            $sales[] = $row['totalprice'];
        }
 
 
 }
?>
<!DOCTYPE html>
<html lang="en"> 
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Graph</title> 
    </head>
    <body>
        <div style="width:40%;hieght:20%;text-align:center">
          <h4 class="page-header">Total sales for each equipment</h4>
            <br>
            <canvas
            <canvas id="chartjs_doughnut"></canvas> 
        </div>    
    </body>
  <script src="//code.jquery.com/jquery-1.9.1.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <script type="text/javascript">
      var ctx = document.getElementById("chartjs_doughnut").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'doughnut',
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
                                "#ff004e",
								"#4CD7D0",
								"#E1C340",
								"#F52EC0",
								"#40B0DF",
								"#22CAE0",
								"#C8DF52",
								"#0067B3",
								"#D0B49F"
								
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
                            fontSize: 8,
                        }
                    },
 
 
                }
                });
    </script>
</html>