<?php 
$con  = mysqli_connect("localhost","root","","alumni_db");
if (!$con) {
   echo "Problem in database connection! Contact administrator!";
}else{
        $sql ="SELECT COUNT(employment_status) AS total_employed, batch_year FROM graduates inner join graduate_survey_form WHERE batch_year = college_year and employment_status = 'employed' GROUP BY batch_year";
        $result = mysqli_query($con,$sql);
        $chart_data="";
        while ($row = mysqli_fetch_array($result)) { 
           $batch[]  = $row['batch_year']  ;
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
                <h2 class="page-header" style="text-align:center;color:white;color:black;">Graphical Reports of Employed Graduates</h2>
                    <div style="text-align:center;color:white; color:black;">Employed Data</div>
                    <div class="card mt-3" style="width:90%; margin-left:5%;">
                    <div style="margin-left:5%; width:50%;text-align:center; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; align-items:center;" >
                    <br>
                    <br>
                        <canvas id="myChart"></canvas> 
                    </div>
                    </div> 
                    <p style="text-align:center;color:darkgrey;">This data is based on the information pull out from database to check the reports of graduates every year.</p>
				</div>
                <a href="index.php?page=employed">Employed</a> |
            <a href="index.php?page=unemployed">Unemployed</a> |
            <a href="index.php?page=untrack">Not Tracked</a>
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

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-datalabels/2.2.0/chartjs-plugin-datalabels.min.js" integrity="sha512-JPcRR8yFa8mmCsfrw4TNte1ZvF1e3+1SdGMslZvmrzDYxS69J7J49vkFL8u6u8PlPJK+H3voElBtUCzaXj+6ig==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
  const ctx = document.getElementById('myChart');
  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: <?php echo json_encode($batch); ?>,
      datasets: [{
        label: 'Total Employed',
        data: <?php echo json_encode($total); ?>,
        borderWidth: 1,
        datalabels: {
            color: 'green',
            anchor: 'end',
           align: 'top'
        }
      }]
    },
    plugins: [ChartDataLabels],
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>
 
 