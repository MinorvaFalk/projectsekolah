<div style="float:right">
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">Add New Class</button>
	<!-- <a href="<?php echo site_url('subject/add'); ?>" class="btn btn-success">Add New Subject</a> -->
</div>
<br><br>
<table id="example" class="table table-striped table-bordered" style="width:100%">
	<thead>
		<tr>
			<td>Kode Kelas</td>
			<td>Nama Kelas</td>
			<td>Wali Kelas</td>
			<td>Action</td>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($data as $row) {
            echo '<tr>
            <td>'.$row['id_kelas'].'</td>
            <td>'.$row['nama_kelas'].'</td>
            <td>'.$row['first_name'].' '.$row['last_name'].'</td>
						<td>'?>
		<button type="button" class="btn btn-primary" data-toggle="modal"
			data-target="#editmodal<?=$row['id_kelas']?>">Edit</button>
		<a href="<?php echo site_url('kela/remove/'.$row['id_kelas']); ?>" class="btn btn-danger btn-xs">Delete</a>
		<?php '</td>
            </tr>';
        }?>
	</tbody>
	<tfoot>
		<tr>
			<th>Kode Kelas</th>
			<th>Nama Kelas</th>
			<th>Wali Kelas</th>
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
				<?php echo form_open('kela/add',array("class"=>"form-horizontal")); ?>
				<div class="form-group">
					<label>Kode Kelas</label>
					<input type="text" name="id_kelas" class="form-control" id="id_kelas" />
				</div>
				<div class="form-group">
					<label>Nama Kelas</label>
					<input type="text" name="nama_kelas" class="form-control" id="nama_kelas" />
				</div>
				<div class="form-group">
					<div class="form-group">
						<label>Wali Kelas</label>
						<select class="form-control" name="id_pengajar">
							</option>
							<?php foreach($guru as $i):?>
							<?php if($i['id_pengajar'] != $row['id_pengajar']){?>
							<option value="<?=$i['id_pengajar']?>"><?=$i['first_name'].' '.$i['last_name']?></option>
							<?php }?>
							<?php endforeach;?>
						</select>
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
</div>
<!-- Add Modal -->


<!-- Edit Modal -->
<?php foreach($data as $row):?>
<div class="modal fade" id="editmodal<?=$row['id_kelas']?>" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Edit Kelas</h5>
			</div>
			<div class="modal-body">
				<?php echo form_open('kela/edit/'.$row['id_kelas'],array("class"=>"form-horizontal")); ?>

				<div class="form-group">
					<label>Kode Kelas</label>
					<input type="text" disabled name="id_kelas" value="<?=$row['id_kelas']?>" class="form-control"
						id="id_kelas" />
				</div>

				<div class="form-group">
					<label>Nama Kelas</label>
					<input type="text" name="nama_kelas" value="<?=$row['nama_kelas']?>" class="form-control"
						id="nama_kelas" />
				</div>
				<div class="form-group">
					<div class="form-group">
						<label>Wali Kelas</label>
						<select class="form-control" name="id_pengajar">
							<option value="<?=$row['id_pengajar']?>"><?=$row['first_name'].' '.$row['last_name']?>
							</option>
							<?php foreach($guru as $i):?>
							<?php if($i['id_pengajar'] != $row['id_pengajar']){?>
							<option value="<?=$i['id_pengajar']?>"><?=$i['first_name'].' '.$i['last_name']?></option>
							<?php }?>
							<?php endforeach;?>
						</select>
					</div>
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
