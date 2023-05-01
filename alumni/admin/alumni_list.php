<?php include('db_connect.php');?>

<style>
	.on-print{
		display: none;
	}
</style>
<noscript>
	<style>
		.text-center{
			text-align:center;
		}
		.text-right{
			text-align:right;
		}
		table{
			width: 100%;
			border-collapse: collapse
		}
		tr,td,th{
			border:1px solid black;
		}
	</style>
</noscript>
						<div class="row" id="prnt">
							<div class="col-md-12 mb-2">
							<button class="btn btn-sm btn-block btn-success col-md-2 ml-1 float-right" type="button" id="print"><i class="fa fa-print"></i> Print</button>
							</div>
						</div>
					<div id="report">
						<div class="on-print">
							 <p><center>Alumni Graduates Report</center></p>
						</div>
						<div class="card-body">
						<table class="table table-condensed table-bordered table-hover">
							<!-- <colgroup>
								<col width="5%">
								<col width="10%">
								<col width="15%">
								<col width="15%">
								<col width="30%">
								<col width="15%">
							</colgroup> -->
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="">Name</th>
                                    <th class="">Address</th>
                                    <th class="">Email</th>
                                    <th class="">Contact</th>
									<th class="">Batch</th>
									<th class="">Status</th>
									<th class="" id="row1">Action</th>
									
								</tr>
							</thead>
							<tbody>
								<?php 
								$i = 1;
								$alumni = $conn->query("SELECT * FROM survey");
								while($row=$alumni->fetch_assoc()):
									
								?>
								<tr>
									<td class="text-center"><?php echo $i++ ?></td>
									<td class="">
										 <p><?php echo ucwords($row['name']) ?></p>
									</td>
                                    <td class="">
										 <p><?php echo ucwords($row['address']) ?></p>
									</td>
                                    <td class="">
										 <p><?php echo ucwords($row['email']) ?></p>
									</td>
                                    <td class="">
										 <p><?php echo ucwords($row['contact']) ?></p>
									</td>
									<td class="">
										 <p><?php echo ucwords($row['cgraduated']) ?></p>
									</td>
									<td>
										<p><?php echo ucwords($row['employment_status']) ?></p>
									</td>
									</div>
									<td class="text-center" id="row2">
                                    <button  class="btn btn-sm btn-outline-success view_survey" type="button" data-id="<?php echo $row['id'] ?>">View</button>
									<button  class="btn btn-sm btn-outline-danger delete_alumni" type="button" data-id="<?php echo $row['id'] ?>">Delete</button>
									</td>
								</tr>
								<?php endwhile; ?>
							</tbody>
						</table>
					</div>


<style>
	td{
		vertical-align: middle !important;
	}
	td p{
		margin: unset
	}
	img{
		max-width:100px;
		max-height:150px;
	}
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
</style>

<script>
	$('#print').click(function(){
		var row = document.getElementById("row1");
		var row2 = document.getElementById("row2");
		var row3 = document.getElementById("row2");
   		
   		row.style.display = "none";
		row2.style.display = "none";
		row3.style.display = "none";
		
		var _style = $('noscript').clone()
		var _content = $('#report').clone()
		var nw = window.open("","_blank","width=800,height=700");
		nw.document.write(_style.html())
		nw.document.write(_content.html())
		nw.document.close()
		nw.print()
		setTimeout(function(){
		nw.close()
		},500)
	})
</script>

<script>
	$(document).ready(function(){
		$('table').dataTable()
	})
	
	$('.view_survey').click(function(){
		uni_modal("Alumni Survey Form","view_survey.php?id="+$(this).attr('data-id'),'mid-large')
		
	})
	$('.delete_alumni').click(function(){
		_conf("Are you sure to delete this alumni?","delete_alumni",[$(this).attr('data-id')])
	})
	
	function delete_alumni($id){
		$.ajax({
			url:'ajax.php?action=delete_alumni',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				start_load()
				if(resp==1){
					alert_toast("Data successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1590)

				}
			}
		})
	}
</script>