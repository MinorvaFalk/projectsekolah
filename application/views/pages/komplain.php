<?php echo form_open('nilai_siswa/edit/'.$nilai_siswa['id']); ?>

  <div>
		Komplain : 
		<input type="text" name="komplain" value="<?php echo ($this->input->post('komplain') ? $this->input->post('komplain') : $nilai_siswa['komplain']); ?>" />
	</div>
	
	<button type="submit">Save</button>
	
<?php echo form_close(); ?>