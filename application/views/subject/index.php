<div class="pull-right">
	<a href="<?php echo site_url('subject/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<th>Id Subject</th>
		<th>Nama Subject</th>
		<th>Actions</th>
    </tr>
	<?php foreach($subject as $s){ ?>
    <tr>
		<td><?php echo $s['id_subject']; ?></td>
		<td><?php echo $s['nama_subject']; ?></td>
		<td>
            <a href="<?php echo site_url('subject/edit/'.$s['id_subject']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('subject/remove/'.$s['id_subject']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
