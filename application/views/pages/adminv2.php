<?php 
$kategori = $this->uri->segment(3);

function checkType($id){
	if(substr($id,0,1) == 'E'){
		echo 'Profile';
	}else echo 'Approval';
}

function checkRole($email){
	if(strpos($email,'admin')){
		echo 'Admin';
	}elseif(strpos($email,'teacher')){
		echo 'Teacher';
	}else echo 'Student';
}

?>

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
				echo 'Dashboard </h1>';?> </h1>
				<?php }else echo 'Manage '.ucfirst($kategori);?>
				</h1>
				<hr>
				<?php if(isset($table)){
					echo $table;
				}else { ?>
				<div class="row">
					<div class="col-sm-8">

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
								<div style="max-height: 300px; overflow-y:scroll">
									<?php foreach($notif as $i):?>
									<a data-toggle="modal" data-target="#approval"
										onclick="view('<?=$i['approve_id']?>')"
										class="list-group-item list-group-item-action">
										<p class="mb-1">
											<?php checkType($i['approve_id']);?> #<?=strtoupper($i['approve_id'])?></p>
										<small class="text-muted">
											<?php checkRole($i['email'])?>
										</small>
									</a>
									<?php endforeach?>
								</div>
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

	<!-- Edit Modal -->
	<div class="modal fade" id="approval" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Approval</h5>
				</div>
				<div class="modal-body">
					<form id="edit">

						<div class="form-group">
							<label for="approve_id">ID Approval</label>
							<input type="text" readonly name="approve_id" value="" class="form-control"
								id="approve_id" />
						</div>

						<div name="hide">
							<div class="form-group">
								<label for="email">Email</label>
								<input type="text" readonly name="email" value="" class="form-control" id="email" />
							</div>
						</div>

						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="first_name" class="control-label">First Name</label>
								<input type="text" readonly name="first_name" value="" class="form-control"
									id="first_name" />
							</div>

							<div class="form-group col-md-6">
								<label for="last_name" class="control-label">Last Name</label>
								<input type="text" readonly name="last_name" value="" class="form-control"
									id="last_name" />

							</div>
						</div>

						<div class="form-group">
							<label for="contact">Contact</label>
							<input type="text" readonly name="contact" value="" class="form-control" id="contact" />

						</div>

						<div class="form-group">
							<label for="address">Address</label>
							<input type="text" readonly name="address" value="" class="form-control" id="address" />

						</div>

				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" onclick="approve()" class="btn btn-primary">Approve</button>
				</div>

				</form>
			</div>
		</div>
	</div>
	<!-- Edit Modal -->

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
			});
		});

		function view(id) {
			$('#edit')[0].reset();
			$('.form-control').removeClass('is-invalid');
			$.ajax({
				url: "<?php echo site_url('admin/get_approval')?>/" + id,
				type: "GET",
				dataType: "JSON",
				success: function (data) {
					data.approve_id.substring(1, 0)
					$('[name="approve_id"]').val(data.approve_id);
					$('[name="first_name"]').val(data.first_name);
					$('[name="last_name"]').val(data.last_name);
					$('[name="contact"]').val(data.contact);
					$('[name="address"]').val(data.address);
					if (data.approve == null) {
						$('[name="hide"]').show();
						$('[name="email"]').val(data.email);
					} else $('[name="hide"]').hide();

				},
				error: function (jqXHR, textStatus, errorThrown) {
					alert('Error get data from ajax');
				}
			});
		}

		function approve() {

			var uri = "<?php echo site_url('admin/approve')?>/" + $('[name="approve_id"]').val();

			$.ajax({
				url: uri,
				type: "POST",
				data: $('#edit').serialize(),
				dataType: "JSON",
				success: function (data) {

					if (data.status) {
						window.location.href = data.redirect;
					} else {
						for (var i = 0; i < data.inputerror.length; i++) {
							$('[name="' + data.inputerror[i] + '"]').addClass(
								'is-invalid');
							$('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]);
						}
					}
				},
				error: function (jqXHR, textStatus, errorThrown) {
					alert('Error adding / update data');

				}
			});
		}

	</script>

</body>

</html>
