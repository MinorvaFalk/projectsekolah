<!DOCTYPE HTML>
<html>

<head>
	<?=$css?>;
    
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
						<td>NIS</td>
						<td>Nama Depan</td>
						<td>Nama Belakang</td>
						<td>No. Telephone</td>
						<td>Alamat</td>
						<td>Keterangan</td>
					</tr>
				</thead>
				<?php
        foreach ($infosiswa as $row) { ?>
				<tr>
					<td><?php echo $row['id_siswa']; ?></td>
					<td><?php echo $row['first_name']; ?></td>
					<td><?php echo $row['last_name']; ?></td>
					<td><?php echo $row['contact']; ?></td>
					<td><?php echo $row['address']; ?></td>
					<td><?php echo $row['keterangan']; ?></td>
				</tr>
				<?php } ?>
			</table>
		</div>
		<p><a href="main" class="btn btn-primary">Back</a></p>
	</div>
</body>

</html>
<script>
	$(document).ready(function () {
		$('#students').DataTable();
	});

</script>
<?=$js?>