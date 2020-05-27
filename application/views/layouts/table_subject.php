<div class="pull-right">
	<a href="<?php echo site_url('subject/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table id="example" class="table table-striped table-bordered" style="width:100%">
	<thead>
		<tr>
			<td>ID Subject</td>
			<td>Nama Subject</td>
			<td>Guru</td>
			<td>Action</td>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($data as $row) {
            echo '<tr>
            <td>'.$row['id_subject'].'</td>
            <td>'.$row['nama_subject'].'</td>
            <td>'.$row['first_name'].' '.$row['last_name'].'</td>
						<td>' ?>
						<a href="<?php echo site_url('subject/edit/'.$row['id_subject']); ?>" class="btn btn-info btn-xs">Edit</a> 
						<a href="<?php echo site_url('subject/remove/'.$row['id_subject']); ?>" class="btn btn-danger btn-xs">Delete</a>
						<?php '</td>
            </tr>';
        }?>
	</tbody>
	<tfoot>
		<tr>
      <th>ID Subject</th>
			<th>Nama Subject</th>
			<th>Guru</th>
			<th>Action</th>
		</tr>
	</tfoot>
</table>
