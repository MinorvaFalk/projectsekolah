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
				<a href="<?=base_url()?>" class="list-group-item list-group-item-action 
                <?php if($kategori == NULL){
                  echo 'active';
                }else echo 'bg-light';?>">Dashboard</a>

				<a href="<?=base_url('index.php/admin/menu/teacher')?>" class="list-group-item list-group-item-action 
                <?php if($kategori == 'teacher'){
                  echo 'active';
                }else echo 'bg-light';?>">Teacher</a>

				<a href="<?=base_url('index.php/admin/menu/student')?>" class="list-group-item list-group-item-action 
                <?php if($kategori == 'student'){
                  echo 'active';
                }else echo 'bg-light';?>">Student</a>

				<a href="<?=base_url('index.php/admin/menu/subject')?>" class="list-group-item list-group-item-action 
                <?php if($kategori == 'subject'){
                  echo 'active';
                }else echo 'bg-light';?>">Subject</a>

				<a href="<?=base_url('index.php/admin/menu/class')?>" class="list-group-item list-group-item-action 
                <?php if($kategori == 'class'){
                  echo 'active';
                }else echo 'bg-light';?>">Class</a>

				<a href="<?=base_url('index.php/admin/menu/grade')?>" class="list-group-item list-group-item-action 
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
								<a class="dropdown-item " data-toggle="modal"
									data-target="#exampleModalLong">Notification<span id="notif"
										class="badge badge-light"> </span></a>
								<a class="dropdown-item" href="#">Another action</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="<?=base_url('index.php/admin/logout')?>">Logout</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>

			<div class="container-fluid">
				<h1 class="mt-4">
					<?php if($kategori == NULL){
									echo 'Dashboard </h1>';
									echo '<br> <h2>Approval Table</h2>'; ?> </h1>
									<table border="1" width="100%">
										<tr>
										<th>Approve Id</th>
										<th>Password</th>
										<th>Email</th>
										<th>First Name</th>
										<th>Last Name</th>
										<th>Contact</th>
										<th>Address</th>
										<th>Actions</th>
										</tr>
									<?php foreach($approval as $a){ ?>
										<tr>
										<td><?php echo $a['approve_id']; ?></td>
										<td><?php echo $a['password']; ?></td>
										<td><?php echo $a['email']; ?></td>
										<td><?php echo $a['first_name']; ?></td>
										<td><?php echo $a['last_name']; ?></td>
										<td><?php echo $a['contact']; ?></td>
										<td><?php echo $a['address']; ?></td>
										<td>
														<a class="btn btn-success btn-xs" href="<?php echo site_url('approval/edit/'.$a['approve_id']); ?>">Approve</a> | 
														<a class="btn btn-danger btn-xs" href="<?php echo site_url('approval/remove/'.$a['approve_id']); ?>">Delete</a>
												</td>
										</tr>
									<?php } ?>
								</table>
                <?php }else echo 'Manage '.ucfirst($kategori);?>
				</h1>
				<hr>
				<?php if(isset($table)) echo $table?>
			</div>
		</div>
		<!-- /#page-content-wrapper -->

	</div>
	<!-- /#wrapper -->
	
	<script>
		$("#menu-toggle").click(function (e) {
			e.preventDefault();
			$("#wrapper").toggleClass("toggled");
		});
		$(document).ready(function () {
			$('#example').DataTable({
				responsive: true
			});
			$.ajax({
				url: "<?=base_url('index.php/admin/getnotif')?>",
				method: "GET",
				success: function (data) {
					$('#notif').text(data);
				}
			})
		});

	</script>

</body>

</html>
