<table id="example" class="table table-striped table-bordered" style="width:100%">
	<thead>
		<tr>
			<td>ID Subject</td>
			<td>Nama Siswa</td>
            <td>Nama Guru</td>
            <td>Nilai Tugas</td>
            <td>Nilai UTS</td>
            <td>Nilai UAS</td>
			<td>Action</td>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($data as $row) {
            echo '<tr>
            <td>'.$row['id_subject'].'</td>
            <td>'.$row['namasiswa'].'</td>
            <td>'.$row['namaguru'].'</td>
            <td>'.$row['nilai_tugas'].'</td>
            <td>'.$row['nilai_uts'].'</td>
            <td>'.$row['nilai_uas'].'</td>
            <td></td>
            </tr>';
        }?>
	</tbody>
	<tfoot>
		<tr>
            <th>ID Subject</th>
			<th>Nama Siswa</th>
            <th>Nama Guru</th>
            <th>Nilai Tugas</th>
            <th>Nilai UTS</th>
            <th>Nilai UAS</th>
			<th>Action</th>
		</tr>
	</tfoot>
</table>
