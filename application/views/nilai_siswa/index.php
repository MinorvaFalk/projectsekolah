<div class="pull-right">
	<a href="<?php echo site_url('nilai_siswa/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
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
            <a href="<?php echo site_url('nilai_siswa/edit/'.$n['id']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('nilai_siswa/remove/'.$n['id']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
