<div style="float:right">
	<button type="button" class="btn btn-primary" data-toggle="modal" onclick="add_data()" data-target="#editmodal">Add
		New Subject</button>
	<!-- <a href="<?php echo site_url('subject/add'); ?>" class="btn btn-success">Add New Subject</a> -->
</div>
<br><br>
<table id="example" class="table table-striped table-bordered" style="width:100%">
	<thead>
		<tr>
			<td>ID Subject</td>
			<td>Nama Subject</td>
			<td>Nama Guru</td>
			<td>Action</td>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($data as $row) {
            echo '<tr>
            <td>'.$row['id_subject'].'</td>
			<td>'.$row['nama_subject'].'</td>
			<td>'.$row['guru'].'</td>
						<td>' ?>
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editmodal"
			onclick="edit_data('<?=$row['id_subject']?>')">Edit</button>
		<a href="<?php echo site_url('subject/remove/'.$row['id_subject']); ?>" class="btn btn-danger btn-xs">Delete</a>
		<?php '</td>
            </tr>';
        }?>
	</tbody>
	<tfoot>
		<tr>
			<th>ID Subject</th>
			<th>Nama Subject</th>
			<th>Nama Guru</th>
			<th>Action</th>
		</tr>
	</tfoot>
</table>

<!-- Edit/Add Modal -->
<div class="modal fade" id="editmodal" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Edit Subject</h5>
			</div>
			<div class="modal-body">
				<form id="edit">
					<div class="form-group">
						<label for="id_subject">ID Subject</label>
						<input type="text" disabled name="id_subject" value="" class="form-control" id="id_subject" />
						<div class="invalid-feedback">
							Required
						</div>
					</div>
					<div class="form-group">
						<label for="nama_subject">Nama Subject</label>
						<input type="text" name="nama_subject" value="" class="form-control" id="nama_subject" />
						<div class="invalid-feedback">
							Required
						</div>
					</div>
					<div class="form-group">
						<label>Nama Guru</label>
						<select class="form-control" name="id_pengajar">
							<?php foreach($guru as $i):?>
							<option value="<?=$i['id_pengajar']?>"><?=$i['first_name'].' '.$i['last_name']?></option>
							<?php endforeach;?>
						</select>
						<div class="invalid-feedback">
							Required
						</div>
					</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" onclick="save()">Save</button>
			</div>

			</form>
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
			url: "<?php echo site_url('subject/get_subject')?>/" + id,
			type: "GET",
			dataType: "JSON",
			success: function (data) {
				$('[name="id_subject"]').val(data.id_subject);
				$('[name="nama_subject"]').val(data.nama_subject);
				$('[name="id_pengajar"] option').each(function () {
					if ($(this).val() == data.id_pengajar) {
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
		$('[name="id_subject"]').prop("disabled", false);
	}

	function save() {

		if (save_method == 'edit') {
			var uri = "<?php echo site_url('subject/edit')?>/" + $('[name="id_subject"]').val();
		} else var uri = "<?php echo site_url('subject/add')?>";

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
