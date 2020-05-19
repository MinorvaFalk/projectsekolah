<!DOCTYPE HTML>
<html>

<head>
    <?php
    echo $js;
    echo $css;
    echo 'Welcome,<br>' . $_SESSION['uid'] . '<br>Role : Admin';
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
        <h1>Manage Students</h1>
        <div class="table-responsive">
            <table id="students" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <td>NIS</td>
                        <td>Nama Siswa</td>
                        <td>Mata Pelajaran</td>
                        <td>Nilai Tugas</td>
                        <td>Nilai UTS</td>
                        <td>Nilai UAS</td>
                        <td>Keterangan</td>
                        <td>Actions</td>
                    </tr>
                </thead>
                <?php
                foreach ($siswa as $row) { ?>
                    <tr>
                        <td><?php echo $row['id_siswa']; ?></td>
                        <td><?php echo $row['first_name']; ?></td>
                        <td><?php echo $nilai_siswa['nama_subject']; ?></td>
                        <td><?php echo $nilai_siswa['nilai_tugas']; ?></td>
                        <td><?php echo $nilai_siswa['nilai_uts']; ?></td>
                        <td><?php echo $nilai_siswa['nilai_uas']; ?></td>
                        <td>
                            <?php
                            echo "<a href='update.php?id=" . $row['id_siswa'] . "' class='btn btn-info'>Komplain</a>"; 
                            echo "<a href='update.php?id=" . $row['id_siswa'] . "' class='btn btn-info'>Update</a>";
                            echo "<a href='delete.php?id=" . $row['id_siswa'] . "' class='btn btn-danger'>Delete</a>";
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