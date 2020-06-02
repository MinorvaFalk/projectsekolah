<?=$css?>
<?=$js?>
<?=$nav?>
<?php
function checkRole(){
	if($_SESSION['role']=='S'){
		echo site_url('student/menu/profile');
	}else echo site_url('teacher/menu/profile');
}

function checkEdit(){
	if($_SESSION['role']=='S'){
		return 'student/save';
	}else return 'teacher/save';
}
?>
<br>
<div class="col-md-4 offset-md-4">
	<div class="card">
		<div class="card-header">
			<h3>Edit Profile</h3>
		</div>
		<div class="card-body">
			<?= form_open(checkEdit(),array(''));?>

			<?php if($_SESSION['role'] == 'S'){?>
			<div class="form-group">
				<label for="id_siswa">NIS</label>
				<input type="text" disabled name="id_siswa" placeholder="<?=$info['id_siswa']?>" class="form-control"
					id="id_siswa" />
			</div>

			<?php }else{?>
			<div class="form-group">
				<label for="id_pengajar">ID</label>
				<input type="text" disabled name="id_pengajar" placeholder="<?=$info['id_pengajar']?>" class="form-control"
					id="id_pengajar" />
			</div>
			<?php }?>

			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="first_name" class="control-label">First Name</label>
					<input type="text" name="first_name" placeholder="<?=$info['first_name']?>" class="form-control"
						id="first_name" />

				</div>

				<div class="form-group col-md-6">
					<label for="last_name" class="control-label">Last Name</label>
					<input type="text" name="last_name" placeholder="<?=$info['last_name']?>" class="form-control"
						id="last_name" />
				</div>

			</div>

			<div class="form-group">
				<label for="contact">Contact</label>
				<input type="text" name="contact" placeholder="<?=$info['contact']?>" class="form-control" id="contact" />

			</div>

			<div class="form-group">
				<label for="address">Address</label>
				<input type="text" name="address" placeholder="<?=$info['address']?>" class="form-control" id="address" />

			</div>

		</div>

		<?php if(validation_errors() ) : ?>
		<div class="alert alert-danger" role="alert">
			<?= validation_errors(); ?>
		</div>
		<?php endif; ?>

		<div class="modal-footer">
			<a href="<?php checkRole()?>" class="btn btn-danger">Cancel</a>
			<button type="submit" class="btn btn-primary">Save</button>
		</div>
		<?= form_close()?>

	</div>
</div>
