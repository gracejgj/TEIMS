<?php
$con  = mysqli_connect("localhost","root","","teims");
 if (!$con) {
     # code...
    echo "Problem in database connection! Contact administrator!" . mysqli_error();
 }else{
        $sql ="SELECT * from particulars, request, requestline WHERE particulars.part_code=request.part_code AND
		request.request_code=requestline.request_code "; 
         $result = mysqli_query($con,$sql);
         $chart_data="";
         while ($row = mysqli_fetch_array($result)) { 
 
            $productname=$row['part_name'];
            $month[]  = date_format(date_create( $row['date']),"M d, Y")  ;
            $sales[] = $row['totalprice'];
        }
 
 
 }
 
 
?>
<!-- Line graph is one of the most commonly used chart types and is very useful especially in the fields of statistics. It is composed of vertical y-axis and a horizontal x-axis which displays series information of data points connected by lines. Each of this axes is named with a data type, this will help you in monitoring your sales and determine the result accurately. Take a look at the procedure below on how to make Line graph program.
-->
<!DOCTYPE html>
<html lang="en"> 
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Graph</title> 
    </head>
    <body>
        <div style="width:50%;hieght:20%;text-align:center">
            <h2 class="page-header" >Analytics Sales Report </h2>
            <div><?php echo $productname; ?> </div>
            <canvas  id="chartjs_line"></canvas> 
        </div>    
    </body>
  <script src="//code.jquery.com/jquery-1.9.1.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <script type="text/javascript">
      var ctx = document.getElementById("chartjs_line").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels:<?php echo json_encode($month); ?>,
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