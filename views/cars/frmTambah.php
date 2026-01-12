<p class="card-title-desc">&nbsp;</p>
<h4><?php echo ($action == 'add') ? 'Tambah Mobil Baru' : 'Edit Mobil'; ?></h4>
<p class="card-title-desc">&nbsp;</p>

<form id="frm" action="<?php echo base_url(); ?>cars/simpan" autocomplete="off">
	<input type="hidden" id="action" name="action" class="form-control" value="<?php echo $action; ?>">
	<input type="hidden" id="id_mobil" name="id_mobil" class="form-control" value="<?php echo $id_mobil; ?>">
	<div class="form-group">
		<label for="name" class="col-sm-3 control-label">Nama Mobil <span class="text-danger">*</span></label>
		<div class="col-sm-9">
			<input type="text" 
				   class="form-control" 
				   id="name" 
				   name="name" 
				   value="<?php echo set_value('name', $car ? $car['name'] : ''); ?>" 
				   placeholder="Contoh: Toyota Avanza">
		</div>
	</div>

	<div class="form-group">
		<label for="plate" class="col-sm-3 control-label">Nomor Plat <span class="text-danger">*</span></label>
		<div class="col-sm-9">
			<input type="text" 
				   class="form-control" 
				   id="plate" 
				   name="plate" 
				   value="<?php echo set_value('plate', $car ? $car['plate'] : ''); ?>" 
				   placeholder="Contoh: B 1234 XYZ">
		</div>
	</div>

	<div class="form-group">
		<label for="capacity" class="col-sm-3 control-label">Kapasitas <span class="text-danger">*</span></label>
		<div class="col-sm-9">
			<input type="number" 
				   class="form-control" 
				   id="capacity" 
				   name="capacity" 
				   value="<?php echo set_value('capacity', $car ? $car['capacity'] : ''); ?>" 
				   placeholder="Jumlah penumpang"
				   min="1">
			<span class="help-block">Jumlah maksimal penumpang</span>
		</div>
	</div>

	<div class="form-group">
		<label for="status" class="col-sm-3 control-label">Status <span class="text-danger">*</span></label>
		<div class="col-sm-9">
			<select class="form-control" id="status" name="status" data-width="100%">
				<option value="">-- Pilih Status --</option>
				<option value="available" <?php echo set_select('status', 'available', ($car && $car['status'] == 'available')); ?>>Tersedia</option>
				<option value="maintenance" <?php echo set_select('status', 'maintenance', ($car && $car['status'] == 'maintenance')); ?>>Maintenance</option>
				<option value="inactive" <?php echo set_select('status', 'inactive', ($car && $car['status'] == 'inactive')); ?>>Tidak Aktif</option>
			</select>
		</div>
	</div>
	
	<p class="card-title-desc">&nbsp;</p>

	<div class="form-group">
		<div class="col-sm-offset-3 col-sm-9">
		   <button type="button" class="btn red_btn" id="batal" title="Batal"><i class="fa fa-times"></i>&nbsp;Batal</button>&nbsp;&nbsp;&nbsp;&nbsp;
			<button type="button" class="btn ijo_btn"  id="simpan" title="Simpan Data"><i class="far fa-save"></i>&nbsp;Simpan Data</button>
		</div>
	</div>

</form>
           