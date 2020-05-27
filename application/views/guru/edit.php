<?php echo form_open('guru/edit/'.$guru['id_pengajar'],array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="user_id" class="col-md-4 control-label">User Id</label>
		<div class="col-md-8">
			<input type="text" name="user_id" value="<?php echo ($this->input->post('user_id') ? $this->input->post('user_id') : $guru['user_id']); ?>" class="form-control" id="user_id" />
		</div>
	</div>
	<div class="form-group">
		<label for="first_name" class="col-md-4 control-label">First Name</label>
		<div class="col-md-8">
			<input type="text" name="first_name" value="<?php echo ($this->input->post('first_name') ? $this->input->post('first_name') : $guru['first_name']); ?>" class="form-control" id="first_name" />
		</div>
	</div>
	<div class="form-group">
		<label for="last_name" class="col-md-4 control-label">Last Name</label>
		<div class="col-md-8">
			<input type="text" name="last_name" value="<?php echo ($this->input->post('last_name') ? $this->input->post('last_name') : $guru['last_name']); ?>" class="form-control" id="last_name" />
		</div>
	</div>
	<div class="form-group">
		<label for="contact" class="col-md-4 control-label">Contact</label>
		<div class="col-md-8">
			<input type="text" name="contact" value="<?php echo ($this->input->post('contact') ? $this->input->post('contact') : $guru['contact']); ?>" class="form-control" id="contact" />
		</div>
	</div>
	<div class="form-group">
		<label for="address" class="col-md-4 control-label">Address</label>
		<div class="col-md-8">
			<input type="text" name="address" value="<?php echo ($this->input->post('address') ? $this->input->post('address') : $guru['address']); ?>" class="form-control" id="address" />
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>
	
<?php echo form_close(); ?>