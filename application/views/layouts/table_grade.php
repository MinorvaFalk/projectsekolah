<div style="float:right">
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">Add New Grade</button>
	<!-- <a href="<?php echo site_url('subject/add'); ?>" class="btn btn-success">Add New Subject</a> -->
</div>
<br><br>
<table id="example" class="table table-striped table-bordered" style="width:100%">
	<thead>
		<tr>
			<td>ID Subject</td>
			<td>Nama Siswa</td>
			<td>Nama Guru</td>
			<td>Nilai Tugas</td>
			<td>Nilai UTS</td>
			<td>Nilai UAS</td>
			<td>Action</td>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($data as $row) {
            echo '<tr>
            <td>'.$row['id_subject'].'</td>
            <td>'.$row['namasiswa'].'</td>
            <td>'.$row['namaguru'].'</td>
            <td>'.$row['nilai_tugas'].'</td>
            <td>'.$row['nilai_uts'].'</td>
            <td>'.$row['nilai_uas'].'</td>
            <td>' ?>
		<button type="button" class="btn btn-primary" data-toggle="modal"
			data-target="#editmodal<?=$row['id']?>">Edit</button>
		<a href="<?php echo site_url('nilai_siswa/remove/'.$row['id']); ?>" class="btn btn-danger btn-xs">Delete</a>
		<?php '</td>
            </tr>';
        }?>
	</tbody>
	<tfoot>
		<tr>
			<th>ID Subject</th>
			<th>Nama Siswa</th>
			<th>Nama Guru</th>
			<th>Nilai Tugas</th>
			<th>Nilai UTS</th>
			<th>Nilai UAS</th>
			<th>Action</th>
		</tr>
	</tfoot>
</table>

<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Edit Kelas</h5>
			</div>
			<div class="modal-body">
				<?php echo form_open('nilai_siswa/add',array("class"=>"form-horizontal")); ?>

				<div class="form-group">
					<div class="form-group">
						<label>ID Subject</label>
						<select class="form-control" name="id_subject">
							</option>
							<?php foreach($subject as $i):?>
							<option value="<?=$i['id_subject']?>"><?=$i['id_subject']?></option>
							<?php endforeach;?>
						</select>
					</div>
				</div>

				<div class="form-row">
					<div class="form-group col-md-6">
						<label>Nama Siswa</label>
						<select class="form-control" name="id_siswa">
							</option>
							<?php foreach($siswa as $i):?>
							<option value="<?=$i['id_siswa']?>"><?=$i['first_name'].' '.$i['last_name']?></option>
							<?php endforeach;?>
						</select>
					</div>

					<div class="form-group col-md-6">
						<label>Nama Guru</label>
						<select class="form-control" name="id_pengajar">
							</option>
							<?php foreach($guru as $i):?>
							<option value="<?=$i['id_pengajar']?>"><?=$i['first_name'].' '.$i['last_name']?>
							</option>
							<?php endforeach;?>
						</select>
					</div>
				</div>

				<div class="form-row">
					<div class="col-md-4 mb-3">
						<label for="nilai_tugas">Nilai Tugas</label>
						<input type="text" name="nilai_tugas" class="form-control" id="nilai_tugas" />

					</div>
					<div class="col-md-4 mb-3">
						<label for="nilai_uts">Nilai UTS</label>
						<input type="text" name="nilai_uts" class="form-control" id="nilai_uts" />

					</div>
					<div class="col-md-4 mb-3">
						<label for="nilai_uas">Nilai UAS</label>
						<input type="text" name="nilai_uas" class="form-control" id="nilai_uas" />

					</div>
				</div>

				<div class="form-group">
					<label for="komplain">Komplain</label>
					<input type="text" name="komplain" class="form-control" id="komplain" />
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
<div class="modal fade" id="editmodal<?=$row['id']?>" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Edit Kelas</h5>
			</div>
			<div class="modal-body">
				<?php echo form_open('nilai_siswa/edit/'.$row['id'],array("class"=>"form-horizontal")); ?>

				<div class="form-group">
					<label for="id_subject">ID Subject</label>
					<input type="text" disabled name="id_subject" value="<?=$row['id_subject']?>" class="form-control"
						id="id_subject" />

				</div>

				<div class="form-row">
					<div class="form-group col-md-6">
						<label>Nama Siswa</label>
						<select class="form-control" name="id_siswa">
							<option value="<?=$row['id_siswa']?>"><?=$row['namasiswa']?>
							</option>
							<?php foreach($siswa as $i):?>
							<?php if($i['id_siswa'] != $row['id_siswa']){?>
							<option value="<?=$i['id_siswa']?>"><?=$i['first_name'].' '.$i['last_name']?></option>
							<?php }?>
							<?php endforeach;?>
						</select>
					</div>

					<div class="form-group col-md-6">
						<label>Nama Guru</label>
						<select class="form-control" name="id_pengajar">
							<option value="<?=$row['id_pengajar']?>"><?=$row['namaguru']?>
							</option>
							<?php foreach($guru as $i):?>
							<?php if($i['id_pengajar'] != $row['id_pengajar']){?>
							<option value="<?=$i['id_pengajar']?>"><?=$i['first_name'].' '.$i['last_name']?>
							</option>
							<?php }?>
							<?php endforeach;?>
						</select>
					</div>
				</div>

				<div class="form-row">
					<div class="col-md-4 mb-3">
						<label for="nilai_tugas">Nilai Tugas</label>
						<input type="text" name="nilai_tugas" value="<?=$row['nilai_tugas']?>" class="form-control"
							id="nilai_tugas" />

					</div>
					<div class="col-md-4 mb-3">
						<label for="nilai_uts">Nilai UTS</label>
						<input type="text" name="nilai_uts" value="<?=$row['nilai_uts']?>" class="form-control"
							id="nilai_uts" />

					</div>
					<div class="col-md-4 mb-3">
						<label for="nilai_uas">Nilai UAS</label>
						<input type="text" name="nilai_uas" value="<?=$row['nilai_uas']?>" class="form-control"
							id="nilai_uas" />

					</div>
				</div>

				<div class="form-group">
					<label for="komplain">Komplain</label>
					<input type="text" name="komplain" value="<?=$row['komplain']?>" class="form-control"
						id="komplain" />
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
