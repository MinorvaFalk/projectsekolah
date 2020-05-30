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
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editmodal"
			onclick="edit_data('<?=$row['id_pengajar']?>')">Edit</button>
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

<!-- Edit Modal -->
<div class="modal fade" id="editmodal" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Edit Guru</h5>
			</div>
			<div class="modal-body">
				<form id="edit">

					<div class="form-group">
						<label for="id_pengajar">ID Guru</label>
						<input disabled type="text" name="id_pengajar" value="" class="form-control" id="id_pengajar" />
						<div class="invalid-feedback">
							Required
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="first_name">First Name</label>
							<input type="text" name="first_name" value="" class="form-control" id="first_name" />
							<div class="invalid-feedback">
								Required
							</div>
						</div>

						<div class="form-group col-md-6">
							<label for="last_name">Last Name</label>
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

					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="button" onclick="save()" class="btn btn-primary">Save</button>
					</div>

				</form>
			</div>
		</div>
	</div>
</div>
<!-- Edit Modal -->

<script>
	function edit_data(id) {
		$('#edit')[0].reset();
		save_method = 'edit';
		$('.form-control').removeClass('is-invalid');
		$('[name="id_pengajar"]').prop("disabled", true);
		$.ajax({
			url: "<?php echo site_url('guru/get_data')?>/" + id,
			type: "GET",
			dataType: "JSON",
			success: function (data) {
				$('[name="id_pengajar"]').val(data.id_pengajar);
				$('[name="first_name"]').val(data.first_name);
				$('[name="last_name"]').val(data.last_name);
				$('[name="contact"]').val(data.contact);
				$('[name="address"]').val(data.address);
				$('[name="keterangan"]').val(data.keterangan);

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
		$('[name="id_pengajar"]').prop("disabled", false);
	}

	function save() {

		if (save_method == 'edit') {
			var uri = "<?php echo site_url('guru/edit')?>/" + $('[name="id_pengajar"]').val();
		} else var uri = "<?php echo site_url('guru/add')?>";

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
