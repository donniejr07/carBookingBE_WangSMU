<div class="row">
    <div class="col-md-12">
        <div class="page-header clearfix">
            <h1 class="pull-left">Daftar Mobil</h1>
            <a href="<?php echo base_url('cars/add'); ?>" class="btn btn-success pull-right" style="margin-top: 25px;">
                <span class="glyphicon glyphicon-plus"></span> Tambah Mobil
            </a>
        </div>

        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>Berhasil!</strong> <?php echo $this->session->flashdata('success'); ?>
            </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>Error!</strong> <?php echo $this->session->flashdata('error'); ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($cars)): ?>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th width="5%">ID</th>
                            <th width="25%">Nama Mobil</th>
                            <th width="15%">Plat Nomor</th>
                            <th width="10%">Kapasitas</th>
                            <th width="15%">Status</th>
                            <th width="30%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($cars as $car): ?>
                            <tr>
                                <td><?php echo $car['id']; ?></td>
                                <td><?php echo $car['name']; ?></td>
                                <td><strong><?php echo $car['plate']; ?></strong></td>
                                <td><?php echo $car['capacity']; ?> orang</td>
                                <td>
                                    <span class="status-badge status-<?php echo $car['status']; ?>">
                                        <?php 
                                        $status_label = array(
                                            'available' => 'Tersedia',
                                            'maintenance' => 'Maintenance',
                                            'inactive' => 'Tidak Aktif'
                                        );
                                        echo $status_label[$car['status']];
                                        ?>
                                    </span>
                                </td>
                                <td>
                                    <a href="<?php echo base_url('cars/edit/' . $car['id']); ?>" class="btn btn-sm btn-primary btn-action">
                                        <span class="glyphicon glyphicon-pencil"></span> Edit
                                    </a>
                                    <a href="<?php echo base_url('cars/delete/' . $car['id']); ?>" class="btn btn-sm btn-danger btn-action btn-delete">
                                        <span class="glyphicon glyphicon-trash"></span> Hapus
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <div class="alert alert-info">
                <strong>Info:</strong> Belum ada data mobil. <a href="<?php echo base_url('cars/add'); ?>">Tambah mobil baru</a>
            </div>
        <?php endif; ?>
    </div>
</div>
