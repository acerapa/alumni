
<style>
	.collapse a{
		text-indent:10px;
	}
	nav#sidebar{
		background-color: darkgray;
	}
</style>

<nav id="sidebar" class='mx-lt-5 bg-dark' >
		
		<div class="sidebar-list">
				<a href="index.php?page=home" class="nav-item nav-home"><span class='icon-field'><i class="fa fa-home"></i></span> Home</a>
				<a href="index.php?page=alumni_list" class="nav-item nav-courses"><span class='icon-field'><i class="fa fa-list"></i></span> Alumni List</a>
				<a href="index.php?page=graduates" class="nav-item nav-graduates"><span class='icon-field'><i class="fa fa-users"></i></span>Graduates By Year</a>
				<a href="index.php?page=alumni" class="nav-item nav-alumni"><span class='icon-field'><i class="fa fa-users"></i></span> Request List</a>
				<a href="index.php?page=reports" class="nav-item nav-reports"><span class='icon-field'><i class="fa fa-circle"></i></span> Graphical Reports</a>
				<a href="index.php?page=forums" hidden class="nav-item nav-forum"><span class='icon-field'><i class="fa fa-bullhorn"></i></span> Forum</a>
				<a href="index.php?page=send_sms" class="nav-item nav-send_sms"><span class='icon-field'><i class="fa fa-sms"></i></span> SMS Announcement</a>
				<?php if($_SESSION['login_type'] == 1): ?>
				<a href="index.php?page=users" class="nav-item nav-users"><span class='icon-field'><i class="fa fa-users"></i></span> Users</a>
				<a href="index.php?page=site_settings" class="nav-item nav-site_settings"><span class='icon-field'><i class="fa fa-cogs"></i></span> System Settings</a>
			<?php endif; ?>
		</div>

</nav>
<script>
	$('.nav_collapse').click(function(){
		console.log($(this).attr('href'))
		$($(this).attr('href')).collapse()
	})
	$('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')
</script>
