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
            <td></td>
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
