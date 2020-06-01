<?php echo form_open('siswa/edit/'.$siswa['id_siswa']); ?>

	<div>
		User Id : 
		<input type="text" name="user_id" value="<?php echo ($this->input->post('user_id') ? $this->input->post('user_id') : $siswa['user_id']); ?>" />
	</div>
	<div>
		Id Kelas : 
		<input type="text" name="id_kelas" value="<?php echo ($this->input->post('id_kelas') ? $this->input->post('id_kelas') : $siswa['id_kelas']); ?>" />
	</div>
	<div>
		First Name : 
		<input type="text" name="first_name" value="<?php echo ($this->input->post('first_name') ? $this->input->post('first_name') : $siswa['first_name']); ?>" />
		<span class="text-danger"><?php echo form_error('first_name');?></span>
	</div>
	<div>
		Last Name : 
		<input type="text" name="last_name" value="<?php echo ($this->input->post('last_name') ? $this->input->post('last_name') : $siswa['last_name']); ?>" />
		<span class="text-danger"><?php echo form_error('last_name');?></span>
	</div>
	<div>
		Contact : 
		<input type="text" name="contact" value="<?php echo ($this->input->post('contact') ? $this->input->post('contact') : $siswa['contact']); ?>" />
		<span class="text-danger"><?php echo form_error('contact');?></span>
	</div>
	<div>
		Address : 
		<input type="text" name="address" value="<?php echo ($this->input->post('address') ? $this->input->post('address') : $siswa['address']); ?>" />
		<span class="text-danger"><?php echo form_error('address');?></span>
	</div>
	<div>
		Keterangan : 
		<input type="text" name="keterangan" value="<?php echo ($this->input->post('keterangan') ? $this->input->post('keterangan') : $siswa['keterangan']); ?>" />
	</div>
	
	<button type="submit">Save</button>
	
<?php echo form_close(); ?>