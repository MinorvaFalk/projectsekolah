<div class="pull-right">
	<a href="<?php echo site_url('guru/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<th>Id Pengajar</th>
		<th>User Id</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Contact</th>
		<th>Address</th>
		<th>Actions</th>
    </tr>
	<?php foreach($guru as $g){ ?>
    <tr>
		<td><?php echo $g['id_pengajar']; ?></td>
		<td><?php echo $g['user_id']; ?></td>
		<td><?php echo $g['first_name']; ?></td>
		<td><?php echo $g['last_name']; ?></td>
		<td><?php echo $g['contact']; ?></td>
		<td><?php echo $g['address']; ?></td>
		<td>
            <a href="<?php echo site_url('guru/edit/'.$g['id_pengajar']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('guru/remove/'.$g['id_pengajar']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
