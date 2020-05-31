<?=$css?>
<?=$js?>
<?=$nav?>

<br>
<div class="col-md-4 offset-md-4">
	<div class="card">
		<div class="card-header">
			<h3>Edit Profile</h3>
		</div>
		<div class="card-body">
			<?= form_open('student/save',array(''));?>

			<div class="form-group">
				<label for="id_siswa">NIS</label>
				<input type="text" disabled name="id_siswa" value="<?=$info['id_siswa']?>" class="form-control"
					id="id_siswa" />
				
			</div>

			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="first_name" class="control-label">First Name</label>
					<input type="text" name="first_name" value="<?=$info['first_name']?>" class="form-control"
						id="first_name" />
					
				</div>

				<div class="form-group col-md-6">
					<label for="last_name" class="control-label">Last Name</label>
					<input type="text" name="last_name" value="<?=$info['last_name']?>" class="form-control"
						id="last_name" />
				</div>
				
			</div>

			<div class="form-group">
				<label for="contact">Contact</label>
				<input type="text" name="contact" value="<?=$info['contact']?>" class="form-control" id="contact" />
				
			</div>

			<div class="form-group">
				<label for="address">Address</label>
				<input type="text" name="address" value="<?=$info['address']?>" class="form-control" id="address" />
				
			</div>

		</div>

		<?php if(validation_errors() ) : ?>
		<div class="alert alert-danger" role="alert">
			<?= validation_errors(); ?>
		</div>
		<?php endif; ?>

		<div class="modal-footer">
			<a href="<?=site_url('student/menu/profile')?>" class="btn btn-danger">Cancel</a>
			<button type="submit" class="btn btn-primary">Save</button>
		</div>
		<?= form_close()?>

	</div>
</div>
