<div class="pull-right">
	<a href="<?php echo site_url('kela/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table id="example" class="table table-striped table-bordered" style="width:100%">
	<thead>
		<tr>
			<td>Kode Kelas</td>
			<td>Nama Kelas</td>
			<td>Wali Kelas</td>
			<td>Action</td>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($data as $row) {
            echo '<tr>
            <td>'.$row['id_kelas'].'</td>
            <td>'.$row['nama_kelas'].'</td>
            <td>'.$row['first_name'].' '.$row['last_name'].'</td>
						<td>'?>
							<a href="<?php echo site_url('kela/edit/'.$row['id_kelas']); ?>" class="btn btn-info btn-xs">Edit</a> 
            	<a href="<?php echo site_url('kela/remove/'.$row['id_kelas']); ?>" class="btn btn-danger btn-xs">Delete</a>
						<?php '</td>
            </tr>';
        }?>
	</tbody>
	<tfoot>
		<tr>
			<th>Kode Kelas</th>
			<th>Nama Kelas</th>
			<th>Wali Kelas</th>
			<th>Action</th>
		</tr>
	</tfoot>
</table>
