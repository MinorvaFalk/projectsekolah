<div class="pull-right">
	<a href="<?php echo site_url('siswa/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<th>Id Siswa</th>
		<th>User Id</th>
		<th>Id Kelas</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Contact</th>
		<th>Address</th>
		<th>Keterangan</th>
		<th>Actions</th>
    </tr>
	<?php foreach($siswa as $s){ ?>
    <tr>
		<td><?php echo $s['id_siswa']; ?></td>
		<td><?php echo $s['user_id']; ?></td>
		<td><?php echo $s['id_kelas']; ?></td>
		<td><?php echo $s['first_name']; ?></td>
		<td><?php echo $s['last_name']; ?></td>
		<td><?php echo $s['contact']; ?></td>
		<td><?php echo $s['address']; ?></td>
		<td><?php echo $s['keterangan']; ?></td>
		<td>
            <a href="<?php echo site_url('siswa/edit/'.$s['id_siswa']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('siswa/remove/'.$s['id_siswa']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
<p><a href="<?php echo site_url('main');?>" class="btn btn-primary">Back</a></p>
