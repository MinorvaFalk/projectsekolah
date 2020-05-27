<div class="pull-right">
	<a href="<?php echo site_url('guru/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table id="example" class="table table-striped table-bordered" style="width:100%">
	<thead>
		<tr>
			<td>NIG</td>
			<td>Nama</td>
      <td>Email</td>
      <td>Kelas</td>
			<td>No. Telephone</td>
			<td>Alamat</td>
			<td>Keterangan</td>
			<td>Action</td>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($data as $row) {
            echo '<tr>
            <td>'.$row['id_pengajar'].'</td>
            <td>'.$row['first_name'].' '.$row['last_name'].'</td>
            <td>'.$row['email'].'</td>
            <td>'.$row['id_kelas'].'</td>
            <td>'.$row['contact'].'</td>
            <td>'.$row['address'].'</td>
            <td>'.$row['keterangan'].'</td>
						<td>' ?> 
							<a href="<?php echo site_url('guru/edit/'.$row['id_pengajar']); ?>" class="btn btn-info btn-xs">Edit</a> 
            	<a href="<?php echo site_url('guru/remove/'.$row['id_pengajar']); ?>" class="btn btn-danger btn-xs">Delete</a>
						<?php	'</td>
						</tr>';
		} ?>
	</tbody>
	<tfoot>
		<tr>
			<th>NIG</th>
			<th>Nama</th>
			<th>Email</th>
			<th>Kelas</th>
			<th>No. Telephone</th>
			<th>Alamat</th>
			<th>Keterangan</th>
			<th>Action</th>
		</tr>
	</tfoot>
</table>
