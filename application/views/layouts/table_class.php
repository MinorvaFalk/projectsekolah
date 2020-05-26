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
            <td></td>
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
