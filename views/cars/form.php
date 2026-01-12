<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <?php echo ($action == 'add') ? 'Tambah Mobil Baru' : 'Edit Mobil'; ?>
                </h3>
            </div>
            <div class="panel-body">
                <?php echo validation_errors('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>', '</div>'); ?>

                <?php if ($this->session->flashdata('error')): ?>
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <?php echo $this->session->flashdata('error'); ?>
                    </div>
                <?php endif; ?>

                <?php 
                $form_action = ($action == 'add') ? base_url('cars/add') : base_url('cars/edit/' . $car['id']);
                echo form_open($form_action, array('class' => 'form-horizontal'));
                ?>

                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Nama Mobil <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" 
                                   class="form-control" 
                                   id="name" 
                                   name="name" 
                                   value="<?php echo set_value('name', $car ? $car['name'] : ''); ?>" 
                                   placeholder="Contoh: Toyota Avanza"
                                   required>
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
                                   placeholder="Contoh: B 1234 XYZ"
                                   required>
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
                                   min="1"
                                   required>
                            <span class="help-block">Jumlah maksimal penumpang</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="status" class="col-sm-3 control-label">Status <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <select class="form-control" id="status" name="status" required>
                                <option value="">-- Pilih Status --</option>
                                <option value="available" <?php echo set_select('status', 'available', ($car && $car['status'] == 'available')); ?>>Tersedia</option>
                                <option value="maintenance" <?php echo set_select('status', 'maintenance', ($car && $car['status'] == 'maintenance')); ?>>Maintenance</option>
                                <option value="inactive" <?php echo set_select('status', 'inactive', ($car && $car['status'] == 'inactive')); ?>>Tidak Aktif</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                            <button type="submit" class="btn btn-primary">
                                <span class="glyphicon glyphicon-floppy-disk"></span> 
                                <?php echo ($action == 'add') ? 'Simpan' : 'Update'; ?>
                            </button>
                            <a href="<?php echo base_url('cars'); ?>" class="btn btn-default">
                                <span class="glyphicon glyphicon-remove"></span> Batal
                            </a>
                        </div>
                    </div>

                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
