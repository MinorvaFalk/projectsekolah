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
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editmodal"
			onclick="edit_data('<?=$row['id_siswa']?>')">Edit</button>
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

<!-- Edit Modal -->
<div class="modal fade" id="editmodal" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Edit Siswa</h5>
			</div>
			<div class="modal-body">
				<form id="edit">

					<div class="form-group">
						<label for="id_siswa">NIS</label>
						<input type="text" disabled name="id_siswa" value="" class="form-control" id="id_siswa" />
						<div class="invalid-feedback">
							Required
						</div>
					</div>

					<div class="form-group">
						<div class="form-group">
							<label for="id_kelas">ID Kelas</label>
							<select class="form-control" name="id_kelas">
								<?php foreach($kelas as $i):?>
								<option><?=$i['id_kelas']?></option>
								<?php endforeach;?>
							</select>
							<div class="invalid-feedback">
								Required
							</div>
						</div>
					</div>

					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="first_name" class="control-label">First Name</label>
							<input type="text" name="first_name" value="" class="form-control" id="first_name" />
							<div class="invalid-feedback">
								Required
							</div>		
						</div>

						<div class="form-group col-md-6">
							<label for="last_name" class="control-label">Last Name</label>
							<input type="text" name="last_name" value="" class="form-control" id="last_name" />
							<div class="invalid-feedback">
								Required
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="contact">Contact</label>
						<input type="text" name="contact" value="" class="form-control" id="contact" />
						<div class="invalid-feedback">
							Required
						</div>
					</div>

					<div class="form-group">
						<label for="address">Address</label>
						<input type="text" name="address" value="" class="form-control" id="address" />
						<div class="invalid-feedback">
							Required
						</div>
					</div>

					<div class="form-group">
						<label for="keterangan">Keterangan</label>
						<input type="text" name="keterangan" value="" class="form-control" id="keterangan" />

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
<!-- Edit Modal -->

<script>
	function edit_data(id) {
		$('#edit')[0].reset();
		save_method = 'edit';
		$('.form-control').removeClass('is-invalid');
		$('[name="id_siswa"]').prop("disabled", true);
		$.ajax({
			url: "<?php echo site_url('siswa/get_siswa')?>/" + id,
			type: "GET",
			dataType: "JSON",
			success: function (data) {
				$('[name="id_siswa"]').val(data.id_siswa);
				$('[name="first_name"]').val(data.first_name);
				$('[name="last_name"]').val(data.last_name);
				$('[name="contact"]').val(data.contact);
				$('[name="address"]').val(data.address);
				$('[name="id_kelas"] option').each(function () {
					if ($(this).val() == data.id_kelas) {
						$(this).attr('selected', 'selected');
					}
				});

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
		$('[name="id_siswa"]').prop("disabled", false);
	}

	function save() {

		if (save_method == 'edit') {
			var uri = "<?php echo site_url('siswa/edit')?>/" + $('[name="id_siswa"]').val();
		} else var uri = "<?php echo site_url('siswa/add')?>";

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
				$('#btnSave').text('save'); //change button text
				$('#btnSave').attr('disabled', false); //set button enable 

			}
		});
	}

</script>
