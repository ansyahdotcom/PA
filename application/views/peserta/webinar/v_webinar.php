<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="text-bold"><?= $tittle; ?></h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= base_url('peserta/dashboard'); ?>">Home</a></li>
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
					<?php foreach ($webinar as $wbnr) {
						$ID_WEBINAR = $wbnr->ID_WEBINAR;
						if ($ID_WEBINAR == NULL) { ?>
							<div class="col-md">
								<div class="card-body text-center mt-4">
									<img src="<?= base_url('assets/icon/noClass.svg'); ?>" alt=""
										class="img-rounded img-responsive img-fluid" width="400">
								</div>
								<div class="card-body pt-0 mt-4">
									<h3 class="text-center text-bold text-muted">Belum ada webinar</h3>
								</div>
							</div>
					<?php } else {
                    ?>
					<div class="col-md-5 ml-5 mb-5">
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
								<a class="btn btn-sm btn-primary beli" id="ID_WEBINAR"
									href="<?= base_url('peserta/webinar/daftar/'. strtolower($wbnr->JUDUL_WEBINAR)); ?>">
									<i class="fas fa-cart-plus text-bold"></i> Daftar Webinar
								</a>
							</div>
						</div>
					</div>
					<?php }} ?>
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
