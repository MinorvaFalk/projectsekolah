<?php echo form_open('nilai_siswa2/add',array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="id_subject" class="col-md-4 control-label">Id Subject</label>
		<div class="col-md-8">
			<input type="text" name="id_subject" value="<?php echo $this->input->post('id_subject'); ?>" class="form-control" id="id_subject" />
		</div>
	</div>
	<div class="form-group">
		<label for="id_siswa" class="col-md-4 control-label">Id Siswa</label>
		<div class="col-md-8">
			<input type="text" name="id_siswa" value="<?php echo $this->input->post('id_siswa'); ?>" class="form-control" id="id_siswa" />
		</div>
	</div>
	<div class="form-group">
		<label for="id_pengajar" class="col-md-4 control-label">Id Pengajar</label>
		<div class="col-md-8">
			<input type="text" name="id_pengajar" value="<?php echo $this->input->post('id_pengajar'); ?>" class="form-control" id="id_pengajar" />
		</div>
	</div>
	<div class="form-group">
		<label for="nilai_tugas" class="col-md-4 control-label">Nilai Tugas</label>
		<div class="col-md-8">
			<input type="text" name="nilai_tugas" value="<?php echo $this->input->post('nilai_tugas'); ?>" class="form-control" id="nilai_tugas" />
			<span class="text-danger"><?php echo form_error('nilai_tugas');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="nilai_uts" class="col-md-4 control-label">Nilai Uts</label>
		<div class="col-md-8">
			<input type="text" name="nilai_uts" value="<?php echo $this->input->post('nilai_uts'); ?>" class="form-control" id="nilai_uts" />
			<span class="text-danger"><?php echo form_error('nilai_uts');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="nilai_uas" class="col-md-4 control-label">Nilai Uas</label>
		<div class="col-md-8">
			<input type="text" name="nilai_uas" value="<?php echo $this->input->post('nilai_uas'); ?>" class="form-control" id="nilai_uas" />
			<span class="text-danger"><?php echo form_error('nilai_uas');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="komplain" class="col-md-4 control-label">Komplain</label>
		<div class="col-md-8">
			<input type="text" name="komplain" value="<?php echo $this->input->post('komplain'); ?>" class="form-control" id="komplain" />
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>

<?php echo form_close(); ?>