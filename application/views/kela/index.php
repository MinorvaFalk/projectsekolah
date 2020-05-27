<div class="pull-right">
	<a href="<?php echo site_url('kela/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<th>Id Kelas</th>
		<th>Nama Kelas</th>
		<th>Id Pengajar</th>
		<th>Actions</th>
    </tr>
	<?php foreach($kelas as $k){ ?>
    <tr>
		<td><?php echo $k['id_kelas']; ?></td>
		<td><?php echo $k['nama_kelas']; ?></td>
		<td><?php echo $k['id_pengajar']; ?></td>
		<td>
            <a href="<?php echo site_url('kela/edit/'.$k['id_kelas']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('kela/remove/'.$k['id_kelas']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
