<!DOCTYPE HTML>
<html>

<head>
    <?php
    echo $js;
    echo $css;
    echo 'admin';
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
                        <td>Nama Depan</td>
                        <td>Nama Belakang</td>
                        <td>Tanggal Lahir</td>
                        <td>No. Telephone Orang Tua</td>
                        <td>Kelas</td>
                        <td>Nilai Tugas</td>
                        <td>Nilai UTS</td>
                        <td>Nilai UAS</td>
                        <td>Nilai Akhir</td>
                        <td>Keterangan</td>
                        <td>Actions</td>
                    </tr>
                </thead>
                <?php
                foreach ($datasiswa as $row) { ?>
                    <tr>
                        <td><?php echo $row['nis']; ?></td>
                        <td><?php echo $row['namadepan']; ?></td>
                        <td><?php echo $row['namablkg']; ?></td>
                        <td><?php echo $row['tgllahir']; ?></td>
                        <td><?php echo $row['telportu']; ?></td>
                        <td><?php echo $row['kelas']; ?></td>
                        <td><?php echo $row['nilaitugas']; ?></td>
                        <td><?php echo $row['nilaiuts']; ?></td>
                        <td><?php echo $row['nilaiuas']; ?></td>
                        <td><?php echo $row['nilaiakhir']; ?></td>
                        <td><?php echo $row['keterangan']; ?></td>
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