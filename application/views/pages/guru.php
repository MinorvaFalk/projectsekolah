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
    <div class="table-responsive">
      <table id="students" class="table table-striped table-bordered">
        <thead>
          <tr>
            <td>NIS</td>
            <td>Nama Depan</td>
            <td>Nama Belakang</td>
            <td>Kelas</td>
            <td>Nilai</td>
            <td>Keterangan</td>
            <td>Actions</td>
          </tr>
        </thead>
        <?php
        foreach ($siswa as $row) { ?>
          <tr>
            <td><?php echo $row['id_siswa']; ?></td>
            <td><?php echo $row['first_name']; ?></td>
            <td><?php echo $row['last_name']; ?></td>
            <td><?php echo $row['id_kelas']; ?></td>
            <td><a class='btn btn-primary' href="<?php echo site_url('/nilai_siswa2/index/'.$row['id']); ?>">View</a> </td>
            <td><?php echo $row['keterangan']; ?></td>
            <td>
              <a href='<?=site_url('siswa2')?>' class='btn btn-primary'>Info</a>
            </td>
          </tr>
        <?php } ?>
      </table>
    </div>
  </div>
</body>

</html>
<script>
  $(document).ready(function() {
    $('#students').DataTable();
  });
</script>
<?= $js?>