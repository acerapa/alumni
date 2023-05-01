<?php include 'db_connect.php' ?>
<?php
if(isset($_GET['id'])){
$qry = $conn->query("SELECT *, id, course, Concat(lastname,', ',firstname,' ',middlename) as name from alumnus_bio where id= ".$_GET['id']);
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
			<form action="sendmail.php" method="post">
				<p>ID: <b><?php echo $id ?></b></p>
				<p>Name: <b><?php echo $name ?></b></p>
				<p>Batch: <b><?php echo $course ?></b></p>
				<p>Email: <b><?php echo $email ?></b></p>
				<input type="hidden" name="email" value="<?php echo $email?>">
				<input type="hidden" name="subject" value="Verified Account">
				</form>
			</div>
			<div class="col-md-6">
				<p>Account Status: <b><?php echo $status == 1 ? '<span class="badge badge-primary">Verified</span>' : '<span class="badge badge-secondary">Unverified</span>' ?></b></p>
			</div>
		</div>
	</div>
</div>

	<div class="row">
		<div class="col-lg-12">
			<button class="btn float-right btn-secondary" type="button" data-dismiss="modal">Close</button>
			<?php if($status == 1): ?>
			<button class="btn float-right btn-primary update mr-2" data-status = '0' type="button" data-dismiss="modal">Dectivate</button>
			<?php else: ?>
				<button type="submit" name="send" class="btn float-right btn-primary update mr-2" data-status = '1' data-dismiss="modal">Activate</button>
			<?php endif; ?>
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
						document.getElementById("button1").click();
					},1000)
				}
			}
		})
	})
</script>
