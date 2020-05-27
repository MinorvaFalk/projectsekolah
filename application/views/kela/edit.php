<?php echo form_open('kela/edit/'.$kela['id_kelas'],array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="nama_kelas" class="col-md-4 control-label">Nama Kelas</label>
		<div class="col-md-8">
			<input type="text" name="nama_kelas" value="<?php echo ($this->input->post('nama_kelas') ? $this->input->post('nama_kelas') : $kela['nama_kelas']); ?>" class="form-control" id="nama_kelas" />
		</div>
	</div>
	<div class="form-group">
		<label for="id_pengajar" class="col-md-4 control-label">Id Pengajar</label>
		<div class="col-md-8">
			<input type="text" name="id_pengajar" value="<?php echo ($this->input->post('id_pengajar') ? $this->input->post('id_pengajar') : $kela['id_pengajar']); ?>" class="form-control" id="id_pengajar" />
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>
	
<?php echo form_close(); ?>