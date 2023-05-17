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
							<div class="filer-cont">
								<label for="">Batch: </label>
								<select name="batch-filter" id="batch-filter">
									<option value="">Select Batch</option>
									<?php
										$index = 1;
										$batches = $conn->query("SELECT DISTINCT(users.course) FROM `graduate_survey_form` JOIN users ON graduate_survey_form.user_id = users.id");
										while ($batch=$batches->fetch_assoc()):
									?>
										<option value="<?php echo $batch['course']; ?>"><?php echo $batch['course']; ?></option>
									<?php 
										$index++;
										endwhile;
									?>
								</select>
								<label for="">Employement Status: </label>
								<select name="employement-status-filter" id="employement-status-filter">
									<option value="">Select Employement Status</option>
									<option value="employed">Employed</option>
									<option value="unemployed">Unemployed</option>
								</select>
								<label for="">Search: </label>
								<input type="text" id="general-search">
							</div>
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
									<th class="">Employment Status</th>
									<th class="" id="row1">Action</th>
									
								</tr>
							</thead>
							<tbody>
								
								<?php 
								$i = 1;
								$alumni = $conn->query("SELECT * FROM graduate_survey_form ORDER BY id DESC");
								while($row=$alumni->fetch_assoc()):
									$user_id = $row['user_id'];
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
										<?php
											$sql = "SELECT * FROM users WHERE id= '$user_id'"; 
											$result = mysqli_query($conn, $sql);
											$row1 = mysqli_fetch_assoc($result);
										?>
										 <p><?php echo ucwords($row1['course']) ?></p>
									</td>
									<td>
										<p><?php echo ucwords($row['employment_status']) ?></p>
									</td>
									</div>
									<td class="text-center" id="row2">
                                    <button  class="btn btn-sm btn-outline-success view_survey" type="button" data-id="<?php echo $row['id'] ?>">View</button>
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
	th {
		background: white;
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
	#employement-status-filter, #general-search {
		height: 30px;
		width: 191px;
		z-index: 1;
	}
	.card-body {
		position: relative;
	}
	.filer-cont {
		right: 20px;
		position: absolute;
		z-index: 1;
	}
	#DataTables_Table_0_filter {
		display: none;
	}
	#prnt {
		margin-right: 0px;
	}

	@media print {
		#sidebar, tr :nth-child(8), #prnt,
		#DataTables_Table_0_length, #DataTables_Table_0_filter,
		#DataTables_Table_0_info, #DataTables_Table_0_paginate {
			display: none;
		}

		body {
			background-color: white !important;
		}

		.sorting_asc, .sort_desc, .sorting {
			background-image: none !important;
		}

		table {
			display: table;
			vertical-align: middle;
			border: solid 1px;
		}

		#view-panel {
			margin-left: unset !important;
			width: auto !important;
			margin-top: 3.5rem !important;
			padding: 0.5em !important;
		}

		.on-print {
			font-weight: bold;
			display: block;
		}

		.filter-cont, #DataTables_Table_0_filter {
			display: none !important;
			opacity: 0 !important;
		}

		#batch-filter, label, #general-search, #employement-status-filter {
			display: none !important;
		}

		table, th, tr, td {
			border: solid 1px !important;
		}
	} 
</style>

<script>
	let tableConfig = {
		columns: [
			{ data: 'id', title: '#' },
			{ data: 'name', title: 'Name' },
			{ data: 'address', title: 'Address' },
			{ data: 'email', title: 'Email' },
			{ data: 'contact', title: 'Contact' },
			{ data: 'batch', title: 'Batch' },
			{ data: 'employement_status', title: 'Employement Status' },
			{ data: 'action', title: 'Action' },
		],
		columnDefs: [
    		{ 
				"searchable": false, 
				"targets": [6,7] 
			}
  		]
	};

	$('#print').click(function(){
		// var row = document.getElementById("row1");
		// var row2 = document.getElementById("row2");
		// var row3 = document.getElementById("row2");
   		
   		// row.style.display = "none";
		// row2.style.display = "none";
		// row3.style.display = "none";
		
		// var _style = $('noscript').clone()
		// var _content = $('#report').clone()
		// var nw = window.open("","_blank","width=800,height=700");
		// nw.document.write(_style.html())
		// nw.document.write(_content.html())
		// nw.document.close()
		// nw.print();
		// setTimeout(function () {
		// 	nw.close();
		// }, 500);

		// display all the data in datatables
		table.destroy();
		table = $('table').DataTable({
			pageLength: -1,
		});

		window.print();
	});

	window.addEventListener('afterprint', function () {
		table.destroy();
		table = $('table').DataTable(tableConfig);
	});

	var mediaQueryList = window.matchMedia('print');
		mediaQueryList.addListener(function(mql) {
		if (!mql.matches) {
			table.destroy();
			table = $('table').DataTable(tableConfig);
		}
	});

	var table = null;
	$(document).ready(function(){
		table = $('table').DataTable(tableConfig);
		localStorage.setItem('table_data', JSON.stringify(extractData(table.data())));
	})
	
	$('#general-search').on('input', function () {
		table.search(this.value).draw();
	});

	$('#employement-status-filter').on('change', function () {
		let dataToSearch = JSON.parse(localStorage.getItem('table_data'));
		let filteredData = dataToSearch.filter(data => {
			let prepareComp = data.employement_status.replace('<p>', '').replace('</p>', '').toLowerCase();
			if (!this.value) return data;
			if (prepareComp == this.value) {
				return data;
			}
		});

		// filter for batch
		let batchValue = $('#batch-filter').val();
		if (batchValue) {
			filteredData = filteredData.filter(data => {
				let prepareComp = data.batch.replace('<p>', '').replace('</p>', '');
				if (batchValue == prepareComp) {
					return data;
				}
			});
		}

		table.clear();
		table.rows.add(filteredData).draw();

		let searchInput = $('#general-search').val();
		if (searchInput) {
			table.search(searchInput).draw();
		}
	});

	$('#batch-filter').on('change', function () {
		let dataToSearch = JSON.parse(localStorage.getItem('table_data'));
		let filteredData = dataToSearch.filter(data => {
			let prepareComp = data.batch.replace('<p>', '').replace('</p>', '');
			if (!this.value) return data;
			if (this.value == prepareComp) {
				return data;
			}
		});

		// filter for employee status
		let employementStatusValue = $('#employement-status-value').val();
		if (employementStatusValue) {
			filteredData = filteredData.filter(data => {
				let prepareComp = data.employement_status.replace('<p>', '').replace('</p>', '').toLowerCase();
				if (prepareComp == this.value) {
					return data;
				}
			});
		}

		table.clear();
		table.rows.add(filteredData).draw();

		let searchInput = $('#general-search').val();
		if (searchInput) {
			table.search(searchInput).draw();
		}
	});

	$('.view_survey').click(function(){
		uni_modal("Alumni Survey Form","view_survey.php?id="+$(this).attr('data-id'),'mid-large')
		
	})
	$('.delete_alumni').click(function(){
		_conf("Are you sure to delete this alumni?","delete_alumni",[$(this).attr('data-id')])
	})

	function extractData(data) {
		return Object.values(data).filter(data => {
			if (typeof data === 'object') {
				if (!Array.isArray(data)) {
					if (data.id) {
						return data;
					}
				}
			}
		});
	}
	
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