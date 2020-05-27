<div style="float:right">
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">Add New Subject</button>
	<!-- <a href="<?php echo site_url('subject/add'); ?>" class="btn btn-success">Add New Subject</a> -->
</div>
<br><br>
<table id="example" class="table table-striped table-bordered" style="width:100%">
	<thead>
		<tr>
			<td>ID Subject</td>
			<td>Nama Subject</td>
			<td>Action</td>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($data as $row) {
            echo '<tr>
            <td>'.$row['id_subject'].'</td>
            <td>'.$row['nama_subject'].'</td>
						<td>' ?>
		<button type="button" class="btn btn-primary" data-toggle="modal"
			data-target="#editmodal<?=$row['id_subject']?>">Edit</button>
		<a href="<?php echo site_url('subject/remove/'.$row['id_subject']); ?>" class="btn btn-danger btn-xs">Delete</a>
		<?php '</td>
            </tr>';
        }?>
	</tbody>
	<tfoot>
		<tr>
			<th>ID Subject</th>
			<th>Nama Subject</th>
			<th>Action</th>
		</tr>
	</tfoot>
</table>

<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add Subject</h5>
			</div>
			<div class="modal-body">
				<?php echo form_open('subject/add'); ?>

				<div class="form-group">
					<label class="col-md-4 control-label">ID subject</label>
					<input type="text" name="id_subject" class="form-control" />
				</div>

				<div class="form-group">
					<label for="nama_subject" class="col-md-4 control-label">Nama Subject</label>
					<input type="text" name="nama_subject" class="form-control" id="nama_subject" />
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
<!-- Add Modal -->

<!-- Edit Modal -->
<?php foreach($data as $row):?>
<div class="modal fade" id="editmodal<?=$row['id_subject']?>" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Edit Subject</h5>
			</div>
			<div class="modal-body">
				<?php echo form_open('subject/edit/'.$row['id_subject']); ?>

				<div class="form-group">
					<label for="id_subject">ID Subject</label>
					<input type="text" disabled name="id_subject" value="<?=$row['id_subject']?>" class="form-control"
						id="id_subject" />
				</div>
				<div class="form-group">
					<label for="nama_subject" >Nama Subject</label>
					<input type="text" name="nama_subject" value="<?=$row['nama_subject']?>" class="form-control"
						id="nama_subject" />
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
