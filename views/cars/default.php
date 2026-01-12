<?php

$ada			=sizeof($data);
$i				=0;

if($cari && !$ada){ ?>
	<p class="card-title-desc">&nbsp;</p>
	<h4 class='text-center'>Data tidak Ketemu</h4>
<?php } elseif(!$cari && !$ada){ ?>
	<p class="card-title-desc">&nbsp;</p>
	<h4 class='text-center'>Data Kosong</h4>	
<?php } else { ?>


	<div class="table-responsive">
		<table class="table table-bordered table-striped table-hover">
			<thead>
				<tr class="bg-biru-tua">
					<th width="5%">ID</th>
					<th width="25%">Nama Mobil</th>
					<th width="15%">Plat Nomor</th>
					<th width="10%">Kapasitas</th>
					<th width="15%">Status</th>
					<th width="30%">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($data as $car):
					$i++; if($i%2==0){ $class="even"; } else { $class="odd"; }
				?>
					<tr class="<?php echo $class; ?>">
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
							<button id="btnEdit" rel="<?php echo $car['id']; ?>" class="btn btn-sm btn-primary" title="Edit"><span class="fas fa-pencil-alt"></span> Edit</button>&nbsp;&nbsp;
							<button id="btnHapus" rel="<?php echo $car['id']; ?>" class="btn btn-sm btn-danger" title="Hapus"><span class="far fa-trash-alt"></span> Hapus</button>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
	<div id="paging"><span class="pull-right"><?php echo $pagings; ?></span></div>
<?php } ?>
