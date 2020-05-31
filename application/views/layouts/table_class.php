<div style="float:right">
	<button type="button" class="btn btn-primary" data-toggle="modal" onclick="add_data()" data-target="#editmodal">Add
		New Class</button>
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
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editmodal"
			onclick="edit_data('<?=$row['id_kelas']?>')">Edit</button>
		<a href="<?php echo site_url('kelas/remove/'.$row['id_kelas']); ?>" class="btn btn-danger btn-xs">Delete</a>
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

<!-- Edit/Add Modal -->

<div class="modal fade" id="editmodal" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Edit Kelas</h5>
			</div>
			<div class="modal-body">
				<form id="edit">

					<div class="form-group">
						<label>Kode Kelas</label>
						<input type="text" disabled name="id_kelas" value="" class="form-control is-invalid"
							id="id_kelas" />
						<div class="invalid-feedback">
							Required
						</div>
					</div>

					<div class="form-group">
						<label>Nama Kelas</label>
						<input type="text" name="nama_kelas" value="" class="form-control is-invalid" id="nama_kelas" />
						<div class="invalid-feedback">
							Required
						</div>
					</div>
					<div class="form-group">
						<div class="form-group">
							<label>Wali Kelas</label>
							<select class="form-control" name="id_pengajar">
								<option selected value=""></option>
								<?php foreach($guru as $i):?>
								<option value="<?=$i['id_pengajar']?>"><?=$i['first_name'].' '.$i['last_name']?>
								</option>
								<?php endforeach;?>
							</select>
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

<script>
	function edit_data(id) {
		save_method = 'edit';
		$('[name="id_pengajar"] option:selected').show();
		$('.form-control').removeClass('is-invalid');
		$('[name="id_kelas"]').prop("disabled", true);
		$.ajax({
			url: "<?php echo site_url('kelas/get_kelas')?>/" + id,
			type: "GET",
			dataType: "JSON",
			success: function (data) {
				$('[name="id_kelas"]').val(data.id_kelas);
				$('[name="nama_kelas"]').val(data.nama_kelas);
				$('[name="id_pengajar"] option:selected').text(data.first_name + " " + data.last_name).val(data
					.id_pengajar);

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
		$('[name="id_kelas"]').prop("disabled", false);
		$('[name="id_pengajar"] option:selected').hide();
		$('[name="id_pengajar"] option:selected').val('').text('');
		
	}

	function save() {

		if (save_method == 'edit') {
			var uri = "<?php echo site_url('kelas/edit')?>/" + $('[name="id_kelas"]').val();
		} else var uri = "<?php echo site_url('kelas/add')?>";

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
