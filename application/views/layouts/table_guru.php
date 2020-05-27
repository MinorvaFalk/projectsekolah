<!-- <div style="float:right">
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">Add New Teacher</button>
</div> -->
<table id="example" class="table table-striped table-bordered" style="width:100%">
	<thead>
		<tr>
			<td>ID</td>
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
			if(substr($row['id_pengajar'],0,2) == 'GA') $row['id_kelas'] = 'ADMIN';
			if($row['id_kelas'] == NULL) $row['id_kelas'] = 'N/A';
            echo '<tr>
            <td>'.$row['id_pengajar'].'</td>
            <td>'.$row['first_name'].' '.$row['last_name'].'</td>
            <td>'.$row['email'].'</td>
            <td><strong>'.$row['id_kelas'].'</strong></td>
            <td>'.$row['contact'].'</td>
            <td>'.$row['address'].'</td>
            <td>'.$row['keterangan'].'</td>
			<td>' ?>
		<button type="button" class="btn btn-primary" data-toggle="modal"
			data-target="#editmodal<?=$row['id_pengajar']?>">Edit</button>
		<a href="<?php echo site_url('guru/remove/'.$row['id_pengajar']); ?>" class="btn btn-danger btn-xs">Delete</a>
		<?php	'</td>
						</tr>';
		} ?>
	</tbody>
	<tfoot>
		<tr>
			<th>NIG</th>
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
<!-- <div class="modal fade" id="addModal" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Edit Guru</h5>
			</div>
			<div class="modal-body">
				<?php echo form_open('guru/add'); ?>
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="first_name">First Name</label>
						<input type="text" name="first_name" class="form-control" id="first_name" />
					</div>

					<div class="form-group col-md-6">
						<label for="last_name">Last Name</label>
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

				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save</button>
				</div>

				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div> -->
<!-- Add Modal -->

<!-- Edit Modal -->
<?php foreach($data as $row):?>
<div class="modal fade" id="editmodal<?=$row['id_pengajar']?>" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Edit Guru</h5>
			</div>
			<div class="modal-body">
				<?php echo form_open('guru/edit/'.$row['id_pengajar'],array("class"=>"form-horizontal")); ?>

				<div class="form-group">
					<label for="id_pengajar">ID Guru</label>
					<input disabled type="text" name="id_pengajar" value="<?=$row['id_pengajar']?>" class="form-control"
						id="id_pengajar" />
				</div>
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="first_name">First Name</label>
						<input type="text" name="first_name" value="<?=$row['first_name']?>" class="form-control"
							id="first_name" />
					</div>

					<div class="form-group col-md-6">
						<label for="last_name">Last Name</label>
						<input type="text" name="last_name" value="<?=$row['last_name']?>" class="form-control"
							id="last_name" />
					</div>
				</div>

				<div class="form-group">
					<label for="contact">Contact</label>
					<input type="text" name="contact" value="<?=$row['contact']?>" class="form-control" id="contact" />
				</div>

				<div class="form-group">
					<label for="address">Address</label>
					<input type="text" name="address" value="<?=$row['address']?>" class="form-control" id="address" />
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save</button>
				</div>

				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>
<?php endforeach;?>
<!-- Edit Modal -->
