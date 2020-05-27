<!-- <div style="float:right">
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addmodal">Add New Student</button>
</div>
<br><br> -->
<table id="example" class="table table-striped table-bordered" style="width:100%">
	<thead>
		<tr>
			<td>NIS</td>
			<td>Nama</td>
			<td>Email</td>
			<td>Kelas</td>
			<td>No. HP</td>
			<td>Alamat</td>
			<td>Keterangan</td>
			<td>Action</td>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($data as $row) {
            echo '<tr>
            <td>'.$row['id_siswa'].'</td>
            <td>'.$row['first_name'].' '.$row['last_name'].'</td>
			<td>'.$row['email'].'</td>
			<td>'.$row['id_kelas'].'</td>
            <td>'.$row['contact'].'</td>
            <td>'.$row['address'].'</td>
            <td>'.$row['keterangan'].'</td>
						<td>' ?>
		<button type="button" class="btn btn-primary" data-toggle="modal"
			data-target="#editmodal<?=$row['id_siswa']?>">Edit</button>
		<!-- <a href="<?php echo site_url('siswa/edit/'.$row['id_siswa']); ?>" class="btn btn-info btn-xs">Edit</a>  -->
		<a href="<?php echo site_url('siswa/remove/'.$row['id_siswa']); ?>" class="btn btn-danger btn-xs">Delete</a>
		<?php '</td>
            </tr>';
        }?>
	</tbody>
	<tfoot>
		<tr>
			<th>NIS</th>
			<th>Nama</th>
			<th>Email</th>
			<th>Kelas</th>
			<th>No. Telephone</th>
			<th>Alamat</th>
			<th>Keterangan</th>
			<th>Action</th>
		</tr>
	</tfoot>
</table>

<!-- Add Modal -->
<!-- <div class="modal fade" id="addmodal" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Add Siswa</h5>
			</div>
			<div class="modal-body">
				<?php echo form_open('siswa/add'); ?>

				<div class="form-group">
					<label for="user_id">NIS</label>
					<input type="text" name="id_siswa" class="form-control" id="user_id" />
				</div>

				<div class="form-group">
					<div class="form-group">
						<label for="id_kelas">ID Kelas</label>
						<select class="form-control" name="id_kelas">
							<?php foreach($kelas as $i):?>
							<option><?=$i['id_kelas']?></option>
							<?php endforeach;?>
						</select>
					</div>
				</div>

				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="first_name" class="control-label">First Name</label>
						<input type="text" name="first_name" class="form-control" id="first_name" />
					</div>

					<div class="form-group col-md-6">
						<label for="last_name" class="control-label">Last Name</label>
						<input type="text" name="last_name" class="form-control" id="last_name" />
					</div>
				</div>

				<div class="form-group">
					<label for="contact">Contact</label>
					<input type="text" name="contact" class="form-control" id="contact" />
				</div>

				<div class="form-group">
					<label for="address">Address</label>
					<input type="text" name="address" class="form-control" id="address" />
				</div>

				<div class="form-group">
					<label for="keterangan">Keterangan</label>
					<input type="text" name="keterangan" class="form-control" id="keterangan" />
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save</button>
			</div>

			<?php echo form_close(); ?>
		</div>
	</div>
</div> -->
<!-- Add Modal -->

<!-- Edit Modal -->
<?php foreach($data as $row):?>
<div class="modal fade" id="editmodal<?=$row['id_siswa']?>" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Edit Siswa</h5>
			</div>
			<div class="modal-body">
				<?php echo form_open('siswa/edit/'.$row['id_siswa'],array("class"=>"form-horizontal")); ?>

				<div class="form-group">
					<label for="user_id">NIS</label>
					<input type="text" disabled name="user_id" value="<?=$row['id_siswa']?>" class="form-control"
						id="user_id" />
				</div>

				<div class="form-group">
					<div class="form-group">
						<label for="id_kelas">ID Kelas</label>
						<select class="form-control" name="id_kelas">
							<option selected><?=$row['id_kelas']?></option>
							<?php foreach($kelas as $i):?>
							<?php if($i['id_kelas'] != $row['id_kelas']){?>
							<option><?=$i['id_kelas']?></option>
							<?php }?>
							<?php endforeach;?>
						</select>
					</div>
				</div>

				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="first_name" class="control-label">First Name</label>
						<input type="text" name="first_name" value="<?=$row['first_name'] ?>" class="form-control"
							id="first_name" />
					</div>

					<div class="form-group col-md-6">
						<label for="last_name" class="control-label">Last Name</label>
						<input type="text" name="last_name" value="<?=$row['last_name'] ?>" class="form-control"
							id="last_name" />
					</div>
				</div>

				<div class="form-group">
					<label for="contact">Contact</label>
					<input type="text" name="contact" value="<?=$row['contact'] ?>" class="form-control" id="contact" />
				</div>

				<div class="form-group">
					<label for="address">Address</label>
					<input type="text" name="address" value="<?=$row['address'] ?>" class="form-control" id="address" />
				</div>

				<div class="form-group">
					<label for="keterangan">Keterangan</label>
					<input type="text" name="keterangan" value="<?=$row['keterangan'] ?>" class="form-control"
						id="keterangan" />
				</div>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save</button>
			</div>

			<?php echo form_close(); ?>
		</div>
	</div>
</div>
<?php endforeach;?>
<!-- Edit Modal -->
