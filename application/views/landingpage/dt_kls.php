
	<div class="container mt-5 mb-5">
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
		
		<div class="row justify-content-center">
			<div class="col-md-9">
				<h3 class="my-3">Deskripsi Kelas</h3>
				<p><?= $row->DESKRIPSI;?></p>
				<h3 class="my-3">Detail Kelas</h3>
				<ul>
					<li>Lorem Ipsum</li>
					<li>Dolor Sit Amet</li>
					<li>Consectetur</li>
					<li>Adipiscing Elit</li>
				</ul>
			</div>
		</div>
		<?php } ?>
	</div>

