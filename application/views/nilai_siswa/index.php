<!DOCTYPE HTML>
<html>

<head>
    <?php
    echo $js;
    echo $css;
    echo 'Welcome,<br>' . $_SESSION['uid'];
    echo form_open('main/logout') . '<form><button name="ret">Logout</button></form>';
    ?>
    <title>Project Sekolah</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
<div class="pull-right">
	<a href="<?php echo site_url('nilai_siswa2/add'); ?>" class="btn btn-success">Add</a> 
</div>
  <div class="container">
    <h1>Grade Info</h1>
    <div class="table-responsive">
    <table id="students" class="table table-striped table-bordered">
    <tr>
		<th>ID</th>
		<th>Id Subject</th>
		<th>Id Siswa</th>
		<th>Id Pengajar</th>
		<th>Nilai Tugas</th>
		<th>Nilai Uts</th>
		<th>Nilai Uas</th>
		<th>Komplain</th>
		<th>Actions</th>
    </tr>
	<?php foreach($nilai_siswa as $n){ ?>
    <tr>
		<td><?php echo $n['id']; ?></td>
		<td><?php echo $n['id_subject']; ?></td>
		<td><?php echo $n['id_siswa']; ?></td>
		<td><?php echo $n['id_pengajar']; ?></td>
		<td><?php echo $n['nilai_tugas']; ?></td>
		<td><?php echo $n['nilai_uts']; ?></td>
		<td><?php echo $n['nilai_uas']; ?></td>
		<td><?php echo $n['komplain']; ?></td>
		<td>
            <a href="<?php echo site_url('nilai_siswa2/edit/'.$n['id']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('nilai_siswa2/remove/'.$n['id']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
<p><a href="<?php echo site_url('/main/index/'); ?>" class="btn btn-primary">Back</a></p>
</body>
</html>

<script>
  $(document).ready(function() {
    $('#students').DataTable();
  });
</script>
