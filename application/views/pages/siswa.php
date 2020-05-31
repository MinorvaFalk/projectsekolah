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
						<td></td>
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
</body>
<script>
	$(document).ready(function () {
		$('#students').DataTable();
	});

</script>

</html>
