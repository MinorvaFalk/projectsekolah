<?php echo form_open('subject/edit/'.$subject['id_subject'],array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="id_subject" class="col-md-4 control-label">ID Subject</label>
		<div class="col-md-8">
			<input type="text" name="id_subject" value="<?php echo ($this->input->post('id_subject') ? $this->input->post('id_subject') : $subject['id_subject']); ?>" class="form-control" id="id_subject" />
		</div>
	</div>
	<div class="form-group">
		<label for="nama_subject" class="col-md-4 control-label">Nama Subject</label>
		<div class="col-md-8">
			<input type="text" name="nama_subject" value="<?php echo ($this->input->post('nama_subject') ? $this->input->post('nama_subject') : $subject['nama_subject']); ?>" class="form-control" id="nama_subject" />
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>
	
<?php echo form_close(); ?>