<!DOCTYPE HTML>
<html>

<head>
	<?=$css?>
	<title>Project Sekolah</title>
</head>

<body>
	<?= $nav?>
	<div class="container">
		<select onchange="manage(this)" class="custom-select custom-select-lg mb-3">
			<option selected>Manage Menu</option>
			<option value="1">Approval</option>
			<option value="2">Class</option>
			<option value="3">Teacher</option>
			<option value="4">Student</option>
			<option value="5">Subject</option>
			<option value="6">Nilai</option>
		</select>

		<div class="table-responsive">
			<div id="result"></div>
		</div>
	</div>
</body>

</html>
<script>
	$(document).ready(function () {
		$('#example').DataTable();
	});

	function manage(a) {
		var menu = (a.value || a.options[a.selectedIndex].value);
		$.ajax({
			url: "<?=base_url('index.php/main/tables')?>",
			method: "POST",
			data: {"menu" : menu},
			success: function (data) {
				$('#result').html(data);
			}
		})

	}

</script>
<?=$js?>
