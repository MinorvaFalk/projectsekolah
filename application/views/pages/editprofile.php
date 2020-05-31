<?=$css?>
<?=$js?>
<?=$nav?>
<div class="container">
	<br>

			<div class="card">
				<div class="card-header">
					<h3>Edit Profile</h3>
				</div>
				<div class="card-body">
					<?php if(validation_errors() ) : ?>
					<div class="alert alert-danger" role="alert">
						<?= validation_errors(); ?>
					</div>
					<?php endif; ?>
						<!--FORM NAMA-->
						<!-- <div class="form-group">
							<label for="nama">Name</label>
							<input type="text" name="nama" class="form-control" id="nama" placeholder="Nama lengkap...">
						</div> -->
						<?= form_open('profile/save',array(''));?>

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
								</div><?=form_error('first_name')?>

								<div class="form-group col-md-6">
									<label for="last_name" class="control-label">Last Name</label>
									<input type="text" name="last_name" value="<?=$info['last_name']?>" class="form-control" id="last_name" />
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

				<div class="btn-group" role="group" aria-label="Basic example">
					<button type="button" class="btn btn-danger">Cancel</button>
					<button type="submit" class="btn btn-success">Save</button>
				</div>
                <?= form_close()?>


				

				<!--FORM NAMA-->
				<!--TOMBOL SUBMIT-->
				<!-- <button type="submit" name="tambah" class="btn btn-primary float-right">Tambah</button> -->
				<!--TOMBOL SUBMIT-->
				
			</div>
</div>
</div>
