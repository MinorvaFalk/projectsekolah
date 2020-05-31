<!DOCTYPE HTML>
<html>

<head>
	<?= $css;?>
	<title>Project Sekolah</title>
</head>

<body>
	<?=$nav?>
	<div class="container">
		<h1>Student Info</h1>
		<div class="table-responsive">
			<table id="students" class="table table-striped table-bordered">
				<thead>
					<tr>
						<th>NIS</th>
						<th>Nama Depan</th>
						<th>Nama Belakang</th>
						<th>Kelas</th>
						<th>Nilai</th>
						<th>Keterangan</th>
						<th>Actions</th>
					</tr>
				</thead>

				<tbody>
					<?php
        foreach ($siswa as $row) { ?>
					<tr>
						<td><?php echo $row['id_siswa']; ?></td>
						<td><?php echo $row['first_name']; ?></td>
						<td><?php echo $row['last_name']; ?></td>
						<td><?php echo $row['id_kelas']; ?></td>
						<td><?php echo "<a href='nilaisiswa' class='btn btn-info'>View</a>";?></td>
						<td><?php echo $row['keterangan']; ?></td>
						<td>
							<?php 
              echo "<a href='infosiswa' class='btn btn-primary'>Info</a>";
              ?>
						</td>
					</tr>
					<?php } ?>
				</tbody>

			</table>
		</div>
	</div>
</body>
<?=$js?>

<script>
	$(document).ready(function () {
		$('#students').DataTable();
	});

</script>
</html>
