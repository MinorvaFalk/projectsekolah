<!DOCTYPE HTML>
<html>

<head>
	<?=$css?>
	<title>Project Sekolah</title>
</head>

<body>
	<?= $nav?>
	<br>
	<div class="row">
		<div class="col">
			<div ></div>
		</div>
		<div class="shadow card bg-light mb-3" style="max-width: 18rem; max-height:100%">
			<div class="card-header">Select Menu</div>
			<div class="card-body">
				<h5 class="card-title">Light card title</h5>
				<p class="card-text">Some quick example text to build on the card title and make up the bulk of the
					card's content.</p>
			</div>
		</div>
	</div>
	<div class="shadow p-3 mb-5 bg-white rounded">Regular shadow</div>
	<!-- <select onchange="manage(this)" class="custom-select custom-select-lg mb-3">
			<option selected>Manage Menu</option>
			<option value="1">Approval</option>
			<option value="2">Class</option>
			<option value="3">Teacher</option>
			<option value="4">Student</option>
			<option value="5">Subject</option>
			<option value="6">Nilai</option>
		</select>
		<div id="result"></div> -->
</body>

</html>
<?=$js?>
<script>
	$(document).ready(function () {
		$('#example').DataTable({
			responsive: true,
		});
	});

	function manage(a) {
		var menu = (a.value || a.options[a.selectedIndex].value);
		$.ajax({
			url: "<?=base_url('index.php/tables')?>",
			method: "POST",
			data: {
				"menu": menu
			},
			success: function (data) {
				$('#result').html(data);
			}
		})
	}

	// function tampil_data_barang() {
	// 	$.ajax({
	// 		type: 'ajax',
	// 		url: '<?php echo base_url()?>index.php/barang/data_barang',
	// 		async: false,
	// 		dataType: 'json',
	// 		success: function (data) {
	// 			var html = '';
	// 			var i;
	// 			for (i = 0; i < data.length; i++) {
	// 				html += '<tr>' +
	// 					'<td>' + data[i].barang_kode + '</td>' +
	// 					'<td>' + data[i].barang_nama + '</td>' +
	// 					'<td>' + data[i].barang_harga + '</td>' +
	// 					'</tr>';
	// 			}
	// 			$('#show_data').html(html);
	// 		}

	// 	});
	// }

</script>
