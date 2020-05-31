<?php $kategori = $this->uri->segment(3);?>
<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Admin Dashboard</title>
	<?=$css?>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/css/simple-sidebar.css') ?>">
	<?=$js?>

</head>

<body>

	<div class="d-flex" id="wrapper">

		<!-- Sidebar -->
		<div class="bg-light border-right" id="sidebar-wrapper">
			<div class="sidebar-heading">Welcome, Admin</div>

			<div class="list-group list-group-flush">
				<a href="<?=site_url()?>" class="list-group-item list-group-item-action 
                <?php if($kategori == NULL){
                  echo 'active';
                }else echo 'bg-light';?>">Dashboard</a>

				<a href="<?=site_url('/admin/menu/teacher')?>" class="list-group-item list-group-item-action 
                <?php if($kategori == 'teacher'){
                  echo 'active';
                }else echo 'bg-light';?>">Teacher</a>

				<a href="<?=site_url('/admin/menu/student')?>" class="list-group-item list-group-item-action 
                <?php if($kategori == 'student'){
                  echo 'active';
                }else echo 'bg-light';?>">Student</a>

				<a href="<?=site_url('/admin/menu/subject')?>" class="list-group-item list-group-item-action 
                <?php if($kategori == 'subject'){
                  echo 'active';
                }else echo 'bg-light';?>">Subject</a>

				<a href="<?=site_url('/admin/menu/class')?>" class="list-group-item list-group-item-action 
                <?php if($kategori == 'class'){
                  echo 'active';
                }else echo 'bg-light';?>">Class</a>

				<a href="<?=site_url('/admin/menu/grade')?>" class="list-group-item list-group-item-action 
                <?php if($kategori == 'grade'){
                  echo 'active';
                }else echo 'bg-light';?>">Grade</a>
			</div>
		</div>
		<!-- /#sidebar-wrapper -->

		<!-- Page Content -->
		<div id="page-content-wrapper">

			<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
				<button class="btn btn-primary" id="menu-toggle">Toggle Menu</button>

				<button class="navbar-toggler" type="button" data-toggle="collapse"
					data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
					aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto mt-2 mt-lg-0">
						<li class="nav-item active">
							<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Link</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
								data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<?= ucfirst(strtok($_SESSION['uid'],'.'))?>
							</a>
							<div class="dropdown-menu dropdown-menu-right">
								<a class="dropdown-item" href="#">Another action</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="<?=site_url('/admin/logout')?>">Logout</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>

			<div class="container-fluid">
				<h1 class="mt-4">
					<?php if($kategori == NULL){
                  echo 'Dashboard';
                }else echo 'Manage '.ucfirst($kategori);?>
				</h1>
				<hr>
				<?php if(isset($table)){
					echo $table;
				}else { ?>
				<div class="row">
					<div class="col-sm-8">
						<!-- <div class="shadow-sm bg-white rounded">
							<div class="card text-center">
								<div class="card-header">
									<ul class="nav nav-pills card-header-pills">
										<li class="nav-item">
											<a class="nav-link active" href="#">Active</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="#">Link</a>
										</li>
										<li class="nav-item">
											<a class="nav-link disabled" href="#" tabindex="-1"
												aria-disabled="true">Disabled</a>
										</li>
									</ul>
								</div>
								<div class="card-body">
									<h5 class="card-title">Special title treatment</h5>
									<p class="card-text">With supporting text below as a natural lead-in to additional
										content.
									</p>
									<a href="#" class="btn btn-primary">Go somewhere</a>
								</div>
							</div>
						</div> -->
					</div>
					<div class="col-sm-4">
						<div class="shadow-sm bg-white rounded">
							<div class="list-group">
								<a href="" class="list-group-item list-group-item-action active">
									<div class="d-flex w-100 justify-content-between">
										<h5 class="mb-1">Notification
											<span id="notif" class="badge badge-warning badge-pill"></span></h5>
									</div>
								</a>
								<?php foreach($notif as $i):?>
								<a href="#" class="list-group-item list-group-item-action">
									<p class="mb-1">
									<?php if(substr($i['approve_id'],0,1) == 'E'){
										echo 'Profile';
									}else echo 'Approval'?>	
									#<?=strtoupper($i['approve_id'])?></p>
									<small class="text-muted">
										<?php if(strpos($i['email'],'admin')){
											echo 'Admin';
										}elseif(strpos($i['email'],'teacher')){
											echo 'Teacher';
										}else echo 'Student';?>
									</small>
								</a>
								<?php endforeach?>
							</div>
						</div>
					</div>
				</div>
				<?php }?>
			</div>
		</div>
		<!-- /#page-content-wrapper -->

	</div>
	<!-- /#wrapper -->

	<script>
		$('.collapse').collapse('hide')
		$("#menu-toggle").click(function (e) {
			e.preventDefault();
			$("#wrapper").toggleClass("toggled");
		});
		$(document).ready(function () {
			$('#example').DataTable({
				responsive: true
			});
			$.ajax({
				url: "<?=site_url('/admin/getnotif')?>",
				method: "GET",
				success: function (data) {
					$('#notif').text(data);
				}
			})
		});

	</script>

</body>

</html>
