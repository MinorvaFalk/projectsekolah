<?php 
function getNilai($tugas, $uts, $uas){
	$ahkir = 0.4*$tugas + 0.3*$uts + 0.3*$uas;
	return $ahkir;
}
?>
<!DOCTYPE HTML>
<html>

<head>
	<?= $css?>
	<title>Project Sekolah</title>
</head>

<body>
	<?= $nav?>
	<div class="container">
		<h1>Manage Students</h1>
		<hr>
		<div class="row">
			<div class="col-sm-8">
				<div class="table-responsive">
					<table id="students" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>Mata Pelajaran</th>
								<th>Nama Siswa</th>
								<th>Nilai Tugas</th>
								<th>Nilai UTS</th>
								<th>Nilai UAS</th>
								<th>Nilai Ahkir</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>

							<?php foreach($nilai as $row):?>
							<tr>
								<td><?=$row['nama_subject']?></td>
								<td><?=$row['siswa']?></td>
								<td><?=$row['nilai_tugas']?></td>
								<td><?=$row['nilai_uts']?></td>
								<td><?=$row['nilai_uas']?></td>
								<td><?= getNilai($row['nilai_tugas'], $row['nilai_uts'], $row['nilai_uas'])?></td>
								<td>
									<button class="btn btn-primary btn-sm" onclick="edit_data('<?=$row['id']?>')"
										data-toggle="modal" data-target="#editmodal">Edit Nilai</button>
								</td>
							</tr>
							<?php endforeach;?>

						</tbody>
						<tfoot>
							<tr>
								<th>Mata Pelajaran</th>
								<th>Nama Siswa</th>
								<th>Nilai Tugas</th>
								<th>Nilai UTS</th>
								<th>Nilai UAS</th>
								<th>Nilai Ahkir</th>
								<th>Action</th>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>

			<div class="col-sm-4">
				<div class="shadow-sm bg-white rounded">
					<div class="list-group">
						<a class="list-group-item list-group-item-action list-group-item-warning">
							<div class="d-flex w-100 justify-content-between">
								<h5 class="mb-1">Notification
									<span id="notif" class="badge badge-warning badge-pill"></span></h5>
							</div>
						</a>
						<div style="max-height: 300px; overflow-y:scroll">
							<?php foreach($notif as $i):?>
							<a data-toggle="modal" data-target="#komplainmodal" onclick="get_komplain('<?=$i['id']?>')"
								class="list-group-item list-group-item-action">
								<p class="mb-1"><?=$i['first_name'].' '.$i['last_name']?>
								</p>
								<small class="text-muted">
									<?=$i['nama_subject']?>
								</small>
							</a>
							<?php endforeach?>
						</div>
					</div>
				</div>
			</div>

</body>

<!-- Komplain -->
<div class="modal fade" id="komplainmodal" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Komplain Nilai</h5>
			</div>
			<div class="modal-body">
				<form id="komplain">
					<input type="text" name="id" value="" class="form-control" id="id" style="display: none;" />

					<div class="form-row">
						<div class="form-group col-md-6">

							<label for="nama_subject">Nama Subject</label>
							<input type="text" name="nama_subject" disabled value="" class="form-control"
								id="nama_subject" />
						</div>

						<div class="form-group col-md-6">
							<label for="siswa">Nama Siswa</label>
							<input type="text" name="siswa" disabled value="" class="form-control" id="siswa" />
						</div>
					</div>

					<div class="form-group">
						<label for="komplain">Info Komplain</label>
						<textarea type="text" disabled name="komplain" value="" class="form-control" id="komplain"
							rows="3"></textarea>
						<div class="invalid-feedback"></div>

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="button" onclick="resolve()" class="btn btn-success">Resolve</button>
					</div>

				</form>
			</div>
		</div>
	</div>
</div>
<!-- Komplain -->

<!-- Edit Modal -->
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
						<label for="id_subject">Nama Subject</label>
						<input type="text" disabled name="nama_subject" value="" class="form-control"
							id="nama_subject" />
						<div class="invalid-feedback">
							Required
						</div>
					</div>

					<div class="form-group">
						<label>Nama Siswa</label>
						<input type="text" disabled name="siswa" value="" class="form-control" id="siswa" />
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
<!-- Edit Modal -->

</html>
<?= $js?>
<script>
	$(document).ready(function () {
		$('#students').DataTable({
			scrollY: '270px',
			scrollCollapse: true,
			paging: false
		});
		$.ajax({
			url: "<?=site_url('/teacher/getnotif')?>",
			method: "GET",
			success: function (data) {
				$('#notif').text(data);
			}
		});
	});

	function edit_data(id) {
		$('.form-control').removeClass('is-invalid');
		$('[name="id_subject"]').prop("disabled", true);
		$.ajax({
			url: "<?php echo site_url('teacher/get_grade')?>/" + id,
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
				$('[name="nama_subject"]').val(data.nama_subject);
				$('[name="siswa"]').val(data.siswa);
				$('[name="nilai_tugas"]').val(data.nilai_tugas);
				$('[name="nilai_uts"]').val(data.nilai_uts);
				$('[name="nilai_uas"]').val(data.nilai_uas);

			},
			error: function (jqXHR, textStatus, errorThrown) {
				alert('Error get data from ajax');
			}
		});
	}

	function resolve(){
		var uri = "<?php echo site_url('teacher/resolve')?>/" + $('[name="id"]').val();

		$.ajax({
			url: uri,
			type: "POST",
			data: $('#komplain').serialize(),
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

	function get_komplain(id) {
		save_method = 'edit';
		$('.form-control').removeClass('is-invalid');
		$.ajax({
			url: "<?php echo site_url('teacher/get_grade')?>/" + id,
			type: "GET",
			dataType: "JSON",
			success: function (data) {
				$('[name="id"]').val(data.id);
				$('[name="komplain"]').val(data.komplain);
				$('[name="nama_subject"]').val(data.nama_subject);
				$('[name="siswa"]').val(data.siswa);

			},
			error: function (jqXHR, textStatus, errorThrown) {
				alert('Error get data from ajax');
			}
		});
	}

	function save() {
		var uri = "<?php echo site_url('teacher/edit')?>/" + $('[name="id"]').val();

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
