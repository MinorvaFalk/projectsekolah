<?php 
function getNilai($tugas, $uts, $uas){
	$ahkir = 0.4*$tugas + 0.3*$uts + 0.3*$uas;
	return $ahkir;
}
?>
<!DOCTYPE HTML>
<html>

<head>
	<?= $css;?>
	<?=$js?>
	<title>Project Sekolah</title>
</head>

<body>
	<?=$nav?>

	<div class="container">
		<h1>Grades</h1>
		<hr>
		<div class="row">
			<div class="col-8">
				<div class="table-responsive">
					<table id="students" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>Mata Pelajaran</th>
								<th>Nama Guru</th>
								<th>Nilai Tugas</th>
								<th>Nilai UTS</th>
								<th>Nilai UAS</th>
								<th>Nilai Ahkir</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>

							<?php foreach($siswa as $row):?>
							<tr>
								<td><?=$row['nama_subject']?></td>
								<td><?=$row['guru']?></td>
								<td><?=$row['nilai_tugas']?></td>
								<td><?=$row['nilai_uts']?></td>
								<td><?=$row['nilai_uas']?></td>
								<td><?= getNilai($row['nilai_tugas'], $row['nilai_uts'], $row['nilai_uas'])?></td>
								<td>
									<?php if($row['komplain'] == NULL){?>
									<button type="button" onclick="get_komplain('<?=$row['id']?>')"
										class='btn btn-danger' data-toggle="modal"
										data-target="#komplainmodal">Komplain</button>
									<?php }else { ?>
									<button type="button" onclick="get_komplain('<?=$row['id']?>')"
										class='btn btn-primary' data-toggle="modal"
										data-target="#komplainmodal">View</button>
									<?php } ?>
								</td>
							</tr>
							<?php endforeach;?>

						</tbody>
						<tfoot>
							<tr>
								<th>Mata Pelajaran</th>
								<th>Nama Guru</th>
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
			<div class="col-4">
				<h2>Kelas A <?=$guru['guru']?></h2>
				<div class="table-responsive">
					<table id="list" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>Nama Siswa</th>
							</tr>
						</thead>
						<tbody>

							<?php foreach($kelas as $row):?>
							<tr>
								<td><?=$row['siswa']?></td>

							</tr>
							<?php endforeach;?>

						</tbody>
						<tfoot>
							<tr>
								<th>Nama Siswa</th>
							</tr>
						</tfoot>
					</table>
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
				<form id="edit">
					<input type="text" name="id" value="" class="form-control" id="id" style="display: none;" />
					<div class="form-group">
						<label for="nama_subject">Nama Subject</label>
						<input type="text" name="nama_subject" disabled value="" class="form-control"
							id="nama_subject" />
						<div class="invalid-feedback">
							Required
						</div>
					</div>

					<div class="form-group">
						<label for="komplain">Komplain</label>
						<textarea type="text" name="komplain" value="" class="form-control" id="komplain"
							rows="3"></textarea>
						<div class="invalid-feedback"></div>

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="button" onclick="save()" name="save" class="btn btn-primary">Save</button>
					</div>

				</form>
			</div>
		</div>
	</div>
</div>
<!-- Komplain -->

<script>
	$(document).ready(function () {
		$('#students').DataTable();
		$('#list').DataTable({
			"lengthChange": false,
			"searching": false,
			"scrollY": "200px",
			"scrollCollapse": true,
			"paging": false
		});
	});

	function get_komplain(id) {
		save_method = 'edit';
		$('.form-control').removeClass('is-invalid');
		$.ajax({
			url: "<?php echo site_url('student/get_nilai')?>/" + id,
			type: "GET",
			dataType: "JSON",
			success: function (data) {
				$('[name="id"]').val(data.id);
				$('[name="komplain"]').val(data.komplain);
				$('[name="nama_subject"]').val(data.nama_subject);
				if ($('[name="komplain"]').val() != '') {
					$('[name="save"]').prop('disabled', true);
				}

			},
			error: function (jqXHR, textStatus, errorThrown) {
				alert('Error get data from ajax');
			}
		});
	}

	function save() {
		var uri = "<?php echo site_url('student/komplain')?>/" + $('[name="id"]').val();

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

</html>
