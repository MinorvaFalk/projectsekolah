<div style="float:right">
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editmodal" onclick="add_data()">Add
		New
		Grade</button>
	<!-- <a href="<?php echo site_url('subject/add'); ?>" class="btn btn-success">Add New Subject</a> -->
</div>
<br><br>
<table id="example" class="table table-striped table-bordered" style="width:100%">
	<thead>
		<tr>
			<td>ID Subject</td>
			<td>Nama Siswa</td>
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
            <td>'.$row['nilai_tugas'].'</td>
            <td>'.$row['nilai_uts'].'</td>
			<td>'.$row['nilai_uas'].'</td>
            <td>' ?>
		<button type="button" class="btn btn-primary" onclick="edit_data('<?=$row['id']?>')" data-toggle="modal"
			data-target="#editmodal">Edit</button>
		<a href="<?php echo site_url('nilai_siswa/remove/'.$row['id']); ?>" class="btn btn-danger btn-xs">Delete</a>
		<?php '</td>
            </tr>';
        }?>
	</tbody>
	<tfoot>
		<tr>
			<th>ID Subject</th>
			<th>Nama Siswa</th>
			<th>Nilai Tugas</th>
			<th>Nilai UTS</th>
			<th>Nilai UAS</th>
			<th>Action</th>
		</tr>
	</tfoot>
</table>

<!-- Edit/Add Modal -->
<div class="modal fade" id="editmodal" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Edit Kelas</h5>
			</div>
			<div class="modal-body">
				<form id="edit">
					<input type="text" name="id" value="" class="form-control" id="id" style="display: none;" />
					<div class="form-group">
						<label for="id_subject">ID Subject</label>
						<!-- <input type="text" disabled name="id_subject" value="" class="form-control" id="id_subject" /> -->
						<select class="form-control" name="id_subject">

							<?php foreach($subject as $i):?>
							<option value="<?=$i['id_subject']?>"><?=$i['id_subject']?></option>
							<?php endforeach;?>
						</select>
						<div class="invalid-feedback">
							Required
						</div>
					</div>


					<div class="form-group">
						<label>Nama Siswa</label>
						<select class="form-control" name="id_siswa">

							<?php foreach($siswa as $i):?>
							<option value="<?=$i['id_siswa']?>"><?=$i['first_name'].' '.$i['last_name']?></option>
							<?php endforeach;?>
						</select>
						<div class="invalid-feedback">
							Required
						</div>
					</div>

					<div class="form-row">
						<div class="col-md-4 mb-3">
							<label for="nilai_tugas">Nilai Tugas</label>
							<input type="text" name="nilai_tugas" value="" class="form-control" id="nilai_tugas" />
							<div class="invalid-feedback">
								Required
							</div>
						</div>
						<div class="col-md-4 mb-3">
							<label for="nilai_uts">Nilai UTS</label>
							<input type="text" name="nilai_uts" value="" class="form-control" id="nilai_uts" />
							<div class="invalid-feedback">
								Required
							</div>

						</div>
						<div class="col-md-4 mb-3">
							<label for="nilai_uas">Nilai UAS</label>
							<input type="text" name="nilai_uas" value="" class="form-control" id="nilai_uas" />
							<div class="invalid-feedback">
								Required
							</div>

						</div>
					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="button" onclick="save()" class="btn btn-primary">Save</button>
					</div>

				</form>
			</div>
		</div>
	</div>
</div>
<!-- Edit/Add Modal -->

<script>
	function edit_data(id) {
		save_method = 'edit';
		$('.form-control').removeClass('is-invalid');
		$('[name="id_subject"]').prop("disabled", true);
		$.ajax({
			url: "<?php echo site_url('nilai_siswa/get_grade')?>/" + id,
			type: "GET",
			dataType: "JSON",
			success: function (data) {
				$('[name="id_siswa"] option').each(function () {
					if ($(this).val() == data.id_siswa) {
						$(this).attr('selected', 'selected');
					}
				});
				$('[name="id_subject"] option').each(function () {
					$(this).show();
					if ($(this).val() == data.id_subject) {
						$(this).attr('selected', 'selected');
					}
				});
				$('[name="id"]').val(data.id);
				$('[name="nilai_tugas"]').val(data.nilai_tugas);
				$('[name="nilai_uts"]').val(data.nilai_uts);
				$('[name="nilai_uas"]').val(data.nilai_uas);

			},
			error: function (jqXHR, textStatus, errorThrown) {
				alert('Error get data from ajax');
			}
		});
	}

	function add_data() {
		save_method = 'add';
		$('#edit')[0].reset();
		$('.form-control').removeClass('is-invalid');
		$('[name="id_subject"]').prop("disabled", false);
	}

	function save() {

		if (save_method == 'edit') {
			var uri = "<?php echo site_url('nilai_siswa/edit')?>/" + $('[name="id"]').val();
		} else var uri = "<?php echo site_url('nilai_siswa/add')?>";

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
