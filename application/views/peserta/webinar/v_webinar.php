<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1><?= $tittle; ?></h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active"><?= $tittle; ?></li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">

		<!-- Default box -->
		<div class="card card-solid">
			<div class="card-body pb-0">
				<div class="row d-flex align-items-stretch">
					<?php foreach ($webinar as $wbnr) :
						$ID_WEBINAR = $wbnr->ID_WEBINAR;
                        $JUDUL_WEBINAR = $wbnr->JUDUL_WEBINAR;
                    ?>
					<!-- <div class="col-md-4 mb-5">
						<div class="card h-100">
							<img class="card-img-top" src="<?= base_url('assets/fotowebinar/'). $wbnr->FOTO_WEBINAR;?>"
								alt="">
							<div class="card-footer">
								<a class="btn bg-teal text-bold"><?= $wbnr->HARGA; ?></a>
								<a href="<?= base_url('webinar/detail/'. $wbnr->JUDUL_WEBINAR);?>"
									class="btn btn-primary font-weight-bold text-uppercase m-2">Lihat Detail</a>
							</div>
						</div>
					</div> -->

					<!-- <div class="card bg-light"> -->
						<!-- <div class="position-relative card-body pt-3"> -->
							<div class="col-md-4 mb-5">
								<div class="card">
									<div class="row">
										<img class="card-img-top"
											src="<?= base_url('assets/fotowebinar/'). $wbnr->FOTO_WEBINAR;?>" alt="">
									</div>
								</div>
								<div class="card-footer">
									<div class="text-right">
										<span class="btn btn-sm bg-teal text-bold">
											<i class="fas fa-money-check"></i>
											<?= $wbnr->HARGA; ?>
										</span>
										<button class="btn btn-sm btn-primary beli" id="ID_WEBINAR" data-toggle="modal"
											data-target="#cekout<?= $wbnr->ID_WEBINAR; ?>">
											<i class="fas fa-cart-plus text-bold"></i> Daftar Webinar
										</button>
									</div>
								</div>
							</div>
						<!-- </div> -->
					<!-- </div> -->
					<?php endforeach; ?>
				</div>
			</div>
			<!-- /.card-body -->
			<div class="card-footer">
				<?= $this->pagination->create_links(); ?>
			</div>
			<!-- /.card-footer -->
		</div>
		<!-- /.card -->
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- <div class="container p-5 mt-5 mb-5">
	<div class="row">
		<?php foreach ($webinar as $wbnr) : ?>
		<div class="col-md-4 mb-5">
			<div class="card h-100">
				<img class="card-img-top" src="<?= base_url('assets/fotowebinar/'). $wbnr->FOTO_WEBINAR;?>" alt="">
				<div class="card-body">
					<h4 class="card-title"><?= str_replace('-', ' ', $wbnr->JUDUL_WEBINAR); ?></h4>
					<div class="deskripsi">
					</div>
				</div>
				<div class="card-footer">
					<div class="harga">
						<h5 class="float-right font-weight-bold"><?= $wbnr->HARGA; ?>
						</h5>
					</div>
				</div>
				<a href="<?= base_url('webinar/detail/'. $wbnr->JUDUL_WEBINAR);?>"
					class="btn btn-primary font-weight-bold text-uppercase m-2">Lihat Detail</a>
			</div>
		</div>
		<?php endforeach;?>
	</div>
</div> -->
