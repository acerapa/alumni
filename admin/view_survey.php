<?php include 'db_connect.php' ?>
<?php
if(isset($_GET['id'])){
$qry = $conn->query("SELECT * from graduate_survey_form where id= ".$_GET['id']);

foreach($qry->fetch_array() as $k => $val){
	$$k=$val;
}
}

?>
<style type="text/css">
	
	.avatar {
	    display: flex;
	    border-radius: 100%;
	    width: 100px;
	    height: 100px;
	    align-items: center;
	    justify-content: center;
	    border: 3px solid;
	    padding: 5px;
	}
	.avatar img {
	    max-width: calc(100%);
	    max-height: calc(100%);
	    border-radius: 100%;
	}
	p{
		margin:unset;
	}
	#uni_modal .modal-footer{
		display: none
	}
	#uni_modal .modal-footer.display{
		display: block
	}
</style>
<div class="container-field">
	<div class="col-lg-12">
		<hr>
		<div class="row">
			<div class="col-md-6">
				<p>Name: <b><?php echo $name ?></b></p>
				<p>Address: <b><?php echo $address ?></b></p>
                <p>Email: <b><?php echo $email ?></b></p>
                <p>Contact: <b><?php echo $contact ?></b></p>
				<p>Status: <b><?php echo $civil_status ?></b></p>
				<p>Elementary: <b><?php echo $elementary ?></b></p>
				<p>Year Graduated: <b><?php echo $elementary_year ?></b></p>
				<p>Award: <b><?php echo $elementary_award ?></b></p>
				<p>Highschool: <b><?php echo $highschool ?></b></p>
				<p>Year Graduated: <b><?php echo $highschool_year ?></b></p>
				<p>Award: <b><?php echo $highschool_award ?></b></p>
                <p>College: <b><?php echo $college ?></b></p>
				<p>Year Graduated: <b><?php echo $college_year ?></b></p>
				<p>Award: <b><?php echo $college_award ?></b></p>
				<p>Advance Studies: <b><?php echo implode(",", json_decode($studies)) ?></b></p>
				<p>Year Graduated: <b><?php echo implode(",", json_decode($studies_year)) ?></b></p>
				<p>Unit Earned: <b><?php echo implode(",", json_decode($studies_earned)) ?></b></p>
                <p>Status: <b><?php echo $employment_status ?></b></p>
                <p>Occupation: <b><?php echo $present_occupation ?></b></p>
                <p>Date Hired: <b><?php echo $date_hired ?></b></p>
                <p>Company Name: <b><?php echo $present_company_name ?></b></p>
                <p>Company Address: <b><?php echo $present_company_address ?></b></p>
				<p>Previous Job: <b><?php echo implode(",", json_decode($job)) ?></b></p>
			    <p>Date Hired: <b><?php echo implode(",", json_decode($job_year)) ?></b></p>
				<p>Company Name: <b><?php echo implode(",", json_decode($job_company_name)) ?></b></p>

				<?php
					include('db_connect.php');
						//query code to pullout info
					    $sql = "SELECT image_pathname from graduate_survey_form where id= ".$_GET['id'];
						$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));			
						$record = mysqli_fetch_assoc($resultset);
						$imageURL = '.././image/'.$record["image_pathname"];
				?>
					<p>Proof of Employment: <img src="<?php echo $imageURL;?>" style="width:480px; height:180px;" alt="">
			</div>
		</div>
	</div>
</div>
<div class="modal-footer display">
	<div class="row">
		<div class="col-lg-12">
			<button class="btn float-right btn-secondary" type="button" data-dismiss="modal">Close</button>
		</div>
	</div>
</div>
<script>
	$('.update').click(function(){
		start_load()
		$.ajax({
			url:'ajax.php?action=update_alumni_acc',
			method:"POST",
			data:{id:<?php echo $id ?>,status:$(this).attr('data-status')},
			success:function(resp){
				if(resp == 1){
					alert_toast("Alumnus/Alumna account status successfully updated.")
					setTimeout(function(){
						location.reload()
					},1000)
				}
			}
		})
	})
</script>