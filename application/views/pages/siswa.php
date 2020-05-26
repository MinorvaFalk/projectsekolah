<!DOCTYPE HTML>
<html>

<head>
  <?php
  echo $js;
  echo $css;
  echo 'Welcome,<br>' . $_SESSION['uid'] . '<br>Role : Siswa';
  echo form_open('main/logout') . '<form><button name="ret">Logout</button></form>';
  ?>
  <title>Project Sekolah</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
</head>

<body>
  <div class="container">
    <h1>Student Info</h1>
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
            <td><?php echo "<a href='nilaisiswa' class='btn btn-info'>View</a>";?></td>
            <td><?php echo $row['keterangan']; ?></td>
            <td>
              <?php 
              echo "<a href='infosiswa' class='btn btn-primary'>Info</a>";
              ?>
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