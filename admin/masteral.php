<?php 
$con  = mysqli_connect("localhost","root","","alumni_db");
if (!$con) {
   echo "Problem in database connection! Contact administrator!";
}else{
        $sql ="SELECT COUNT(employment_status) AS total_employed, cgraduated FROM survey WHERE employment_status = 'Advance Studies-Masters & Doctorate' GROUP BY cgraduated";
        $result = mysqli_query($con,$sql);
        $chart_data="";
        while ($row = mysqli_fetch_array($result)) { 
           $batch[]  = $row['cgraduated']  ;
           $total[] = $row['total_employed'];
       }
}
?>

<div class="container-fluid">
	
	<div class="col-lg-12">
		<div class="row">
			<!-- FORM Panel -->
			<div class="col-md-4">
				<div class="card" style="width:1050px; height:500px;">
                <br>
                <br>
                <h2 class="page-header" style="text-align:center;color:white;color:black;">Graphical Reports of Take Advance Studies Master & Doctorate</h2>
                    <div style="text-align:center;color:white; color:black;">Advance Studies Master & Doctorate Data</div>
                    <div class="card mt-3" style="width:90%; margin-left:5%;">
                    <div style="margin-left:5%; width:50%;text-align:center; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; align-items:center;" >
                    <br>
                    <br>
                        <canvas id="chartjs_bar"></canvas> 
                    </div>
                    </div> 
                    <p style="text-align:center;color:darkgrey;">This data is based on the information pull out from database to check the reports of graduates every year.</p>
				</div>
                <a href="index.php?page=employed">Employed</a> |
            <a href="index.php?page=unemployed">Unemployed</a> |
            <a href="">Advance Studies/Masteral</a> |
            <a href="index.php?page=untrack">Untrack</a>
			</div>
                
          
			<!-- FORM Panel -->
		</div>
        <br>
	</div>	

</div>
<style>
	
	td{
		vertical-align: middle !important;
	}
</style>
<script src="//code.jquery.com/jquery-1.9.1.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script type="text/javascript">
      var ctx = document.getElementById("chartjs_bar").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels:<?php echo json_encode($batch); ?>,
                        datasets: [{
                            label: 'Total Advance Studies-Masters & Doctorate',
                            backgroundColor : [
          "red", "green", "blue", "purple", "magenta"
        ],
                            data: <?php echo json_encode($total);?>,
                        }]
                    },
                    options: {
                        
                        legend: {
                        display: false,
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