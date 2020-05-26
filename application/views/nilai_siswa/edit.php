<?php echo form_open('nilai_siswa/edit/'.$nilai_siswa['id'],array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="id_subject" class="col-md-4 control-label"><span class="text-danger">*</span>Id Subject</label>
		<div class="col-md-8">
			<input type="text" name="id_subject" value="<?php echo ($this->input->post('id_subject') ? $this->input->post('id_subject') : $nilai_siswa['id_subject']); ?>" class="form-control" id="id_subject" />
			<span class="text-danger"><?php echo form_error('id_subject');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="id_siswa" class="col-md-4 control-label"><span class="text-danger">*</span>Id Siswa</label>
		<div class="col-md-8">
			<input type="text" name="id_siswa" value="<?php echo ($this->input->post('id_siswa') ? $this->input->post('id_siswa') : $nilai_siswa['id_siswa']); ?>" class="form-control" id="id_siswa" />
			<span class="text-danger"><?php echo form_error('id_siswa');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="nilai_tugas" class="col-md-4 control-label"><span class="text-danger">*</span>Nilai Tugas</label>
		<div class="col-md-8">
			<input type="text" name="nilai_tugas" value="<?php echo ($this->input->post('nilai_tugas') ? $this->input->post('nilai_tugas') : $nilai_siswa['nilai_tugas']); ?>" class="form-control" id="nilai_tugas" />
			<span class="text-danger"><?php echo form_error('nilai_tugas');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="nilai_uts" class="col-md-4 control-label"><span class="text-danger">*</span>Nilai Uts</label>
		<div class="col-md-8">
			<input type="text" name="nilai_uts" value="<?php echo ($this->input->post('nilai_uts') ? $this->input->post('nilai_uts') : $nilai_siswa['nilai_uts']); ?>" class="form-control" id="nilai_uts" />
			<span class="text-danger"><?php echo form_error('nilai_uts');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="nilai_uas" class="col-md-4 control-label"><span class="text-danger">*</span>Nilai Uas</label>
		<div class="col-md-8">
			<input type="text" name="nilai_uas" value="<?php echo ($this->input->post('nilai_uas') ? $this->input->post('nilai_uas') : $nilai_siswa['nilai_uas']); ?>" class="form-control" id="nilai_uas" />
			<span class="text-danger"><?php echo form_error('nilai_uas');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="komplain" class="col-md-4 control-label">Komplain</label>
		<div class="col-md-8">
			<input type="text" name="komplain" value="<?php echo ($this->input->post('komplain') ? $this->input->post('komplain') : $nilai_siswa['komplain']); ?>" class="form-control" id="komplain" />
			<span class="text-danger"><?php echo form_error('komplain');?></span>
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>
	
<?php echo form_close(); ?>