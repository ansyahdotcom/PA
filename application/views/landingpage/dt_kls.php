<main role="main" class="container">
	<!-- Page Content -->
	<div class="container">
		<div class="row">
            <?php foreach ($kelas as $row) { ?>
                <div class="row mt-4">
                    <div class="col-md-4">
                        <img src="<?= base_url('assets/dist/img/kelas/'). $row->GBR_KLS;?>" class="card-img-top" alt="...">
                    </div>
                    <div class="col-md-6">
                        <h3 class="card-title"><?= $row->TITTLE; ?></h3>
                        <p class="card-text"><i class="fas fa-map-marker">&nbsp;</i>Lokasi : &nbsp;<?= $row->LOK_KLS; ?></p>
                        <p class="card-text">Tanggal Pelaksanaan</p>
                        <p><?= 'Mulai : '. date('d F Y', strtotime($row->TGL_MULAI)); ?></p>
                        <p><?= 'Selesai : '. date('d F Y', strtotime($row->TGL_SELESAI)); ?></p>
                        <a class="btn btn-warning" type="button" href="<?= base_url('register')?>">Beli Kelas</a>  
                    </div>
                </div>
			</div>
			<?php } ?>
		</div>
	</div>
</main>

<?php foreach ($kelas as $row) { 
	$ID_KLS = $row->ID_KLS;
	$TITTLE = $row->TITTLE;
	$GBR_KLS = $row->GBR_KLS;
	$PRICE = $row->PRICE;
	?>
<!-- Modal lihat -->
<!-- <div class="modal fade" id="modal_lihat<?= $ID_KLS; ?>" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="card-title font-weight-bold"><?= $TITTLE; ?></h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="card mb-3" style="max-width: 540px;">
					<div class="row no-gutters">
						<div class="col-md-4">
							<img src="<?= base_url('assets/dist/img/kelas/'. $GBR_KLS); ?>" class="card-img" alt="...">
						</div>
						<div class="col-md-8">
							<div class="card-body">
								<h5 class="card-title font-weight-bold">Fasilitas</h5>
								<? ?>
								<p class="card-text">e-Sertifikat</p>
								<h5 class="card-title font-weight-bold">Tanggal</h5>
								<p class="card-text">Mulai : 1 Januari 2020</p>
								<p class="card-text">Selesai : 31 Januari 2020</p>
								<h5 class="card-title font-weight-bold">Lokasi</h5>
								<label for="">Online Class</label>
								<h4 class="text-right font-weight-bold">Rp. <?= $PRICE; ?></h4>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<a type="button" class="btn btn-primary" href="<?= base_url('login'); ?>"><i class="fas fa-shopping-cart"></i> Beli Kelas</a>
			</div>
		</div>
	</div>
</div> -->
<?php } ?>
