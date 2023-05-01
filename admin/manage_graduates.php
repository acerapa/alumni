<?php 
include('db_connect.php');
session_start();
$meta=[];
if(isset($_GET['id'])){
	$user = $conn->query("SELECT * FROM graduates where id =".$_GET['id']);
	foreach($user->fetch_array() as $k =>$v){
		$meta[$k] = $v;
	}
}
?>

<div class="container-fluid">
	<div id="msg"></div>
	
	<form action="" id="manage-graduates">
		<?php if (isset($meta['id'])):?>
			<input type="hidden" name="id" value="<?php echo isset($meta['id']) ? $meta['id'] : '' ?>">
		<?php endif;?>
		<div class="form-group">
			<label for="name">Batch Year</label>
			<input type="text" name="<?php echo isset($meta['batch_year']) ? '': 'batch_year' ?>" id="name" class="form-control" value="<?php echo isset($meta['batch_year']) ? $meta['batch_year'] : ''?>" <?php echo isset($meta['id']) ? 'readonly': ''?>>
		</div>
		<div class="form-group">
			<label for="username">Total Graduates</label>
			<input type="text" name="graduates" required class="form-control" value="<?php echo isset($meta['graduates']) ? $meta['graduates'] : ''?>" autocomplete="off">
		</div>
	</form>
</div>
<script>
	
	$('#manage-graduates').submit(function(e){
		e.preventDefault();
		start_load()
		$.ajax({
			url:'ajax.php?action=save_graduates',
			method:'POST',
			data:$(this).serialize(),
			success:function(resp){
				console.log(resp);
				if(resp ==1){
					alert_toast("Data successfully saved",'success')
					setTimeout(function(){
						location.reload()
					},1500)
				}else{
					if (resp.toLowerCase().includes('duplicate')) {
						$('#msg').html('<div class="alert alert-danger">Duplicate Entry!</div>');
					} else {
						$('#msg').html('<div class="alert alert-danger">Something wen\'t wrong</div>');
					}
					end_load();
				}
			}
		})
	})

</script>