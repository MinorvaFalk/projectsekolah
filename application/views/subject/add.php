<?php echo form_open('subject/add',array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="id_pengajar" class="col-md-4 control-label">Id Pengajar</label>
		<div class="col-md-8">
			<input type="text" name="id_pengajar" value="<?php echo $this->input->post('id_pengajar'); ?>" class="form-control" id="id_pengajar" />
		</div>
	</div>
	<div class="form-group">
		<label for="nama_subject" class="col-md-4 control-label">Nama Subject</label>
		<div class="col-md-8">
			<input type="text" name="nama_subject" value="<?php echo $this->input->post('nama_subject'); ?>" class="form-control" id="nama_subject" />
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>

<?php echo form_close(); ?>