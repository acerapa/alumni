<?php 

?>

<div class="container-fluid">
	
	<div class="row">
	<div class="col-lg-12">
			<button class="btn btn-primary float-right btn-sm" id="new_graduate"><i class="fa fa-plus"></i> Add</button>
	</div>
	</div>
	<br>
	<div class="row">
		<div class="card col-lg-12">
			<div class="card-body">
				<table class="table-striped table-bordered col-md-12">
			<thead>
				<tr>
					<th class="text-center">Batch</th>
					<th class="text-center"># Graduates</th>
					<th class="text-center">Employed</th>
					<th class="text-center">Unemployed</th>
					<th class="text-center">Not Tracked</th>
					<th class="text-center">Date and Time Added</th>
					<th class="text-center">Action</th>
				</tr>
			</thead>
				 	
			<tbody>
				<?php
 					include 'db_connect.php';
 					$type = array("","Admin","Staff","Alumnus/Alumna");
 					$graduates = $conn->query("SELECT * FROM graduates order by batch_year asc");
 					$i = 1;
 					while($row= $graduates->fetch_assoc()):
						$employed_numbers = $conn->query("SELECT COUNT(*) as employed FROM graduate_survey_form JOIN users ON users.id = graduate_survey_form.user_id WHERE graduate_survey_form.employment_status = 'employed' AND users.course = '". $row['batch_year'] ."';")->fetch_assoc();
						$unemployed_numbers = $conn->query("SELECT COUNT(*) as unemployed FROM graduate_survey_form JOIN users ON users.id = graduate_survey_form.user_id WHERE graduate_survey_form.employment_status = 'unemployed' AND users.course = '". $row['batch_year'] ."';")->fetch_assoc();
				 ?>
				 <tr>
				 	<td>
				 		<?php echo $row['batch_year'] ?>
				 	</td>
					 <td>
					 	<?php echo $row['graduates'] ?>
				 	</td>
				 	<td>
				 		<?php echo $employed_numbers['employed'] ?>
				 	</td>
					 <td>
				 		<?php echo $unemployed_numbers['unemployed'] ?>
				 	</td>
					 <td>
				 		<?php echo $row['graduates'] - ($employed_numbers['employed'] + $unemployed_numbers['unemployed']) ?>
				 	</td>
				 	<td>
				 		<?php echo $row['date_added'] ?>
				 	</td>
				 	<td>
				 		<center>
							<div class="btn-group">
								<button type="button" class="btn btn-primary">Action</button>
								<button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="sr-only">Toggle Dropdown</span>
								</button>
								<div class="dropdown-menu">
								<a class="dropdown-item edit_graduates" href="javascript:void(0)" data-id = '<?php echo $row['id'] ?>'>Edit</a>
								<a class="dropdown-item delete_graduates" href="javascript:void(0)" data-id = '<?php echo $row['id'] ?>'>delete</a>
								</div>
							</div>
						</center>
				 	</td>
				 </tr>
				<?php endwhile; ?>
			</tbody>
		</table>
			</div>
		</div>
	</div>

</div>
				 
<script>
	$('table').dataTable();
$('#new_graduate').click(function(){
	uni_modal('New Graduates','manage_graduates.php')
})
$('.edit_graduates').click(function(){
	uni_modal('Edit Graduates','manage_graduates.php?id='+$(this).attr('data-id'))
})

// delete_graduate
$('.delete_graduates').click(function(){
	_conf("Are you sure to delete this batch graduates?","delete_graduate",[$(this).attr('data-id')])
});

function delete_graduate(id) {
	start_load()
	$.ajax({
		url:'ajax.php?action=delete_graduate',
		method:'POST',
		data:{id:id},
		success:function(resp){
			if(resp==1){
				alert_toast("Data successfully deleted",'success')
				setTimeout(function(){
					location.reload()
				},1500);
			}
		}
	})
}
</script>