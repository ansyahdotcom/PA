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
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="card card-primary">
						<div class="row">
							<?php 
                            foreach ($pesertaa as $ps) {
                                $pst = $ps->ID_PS;
                                if ($pst == NULL) { ?>
								<div class="col-md">
									<div class="card-body text-center mt-4">
										<img src="<?= base_url('assets/icon/noClass.svg'); ?>" alt=""
											class="img-rounded img-responsive img-fluid" width="400">
									</div>
									<div class="card-body pt-0 mt-4">
										<h3 class="text-center text-bold text-muted">Belum mendaftar webinar</h3>
									</div>
									<div class="card-body text-center mb-4">
										<a href="<?= base_url('peserta/webinar'); ?>" class="btn btn-outline-primary"><i
												class="fas fa-arrow-circle-left"></i> Daftar webinar</a>
									</div>
								</div>
							<?php } else { ?>
							<div class="col-md">
								<div class="card-body p-5 mt-4">
									<h3><?= str_replace('-', ' ', $ps->JUDUL_WEBINAR); ?></h3>
								
								<div class="col-sm-8">
									<table>
										<tr>
											<td><b>Pembicara</b> &nbsp;</td>
											<td for="NM_ADM">:&nbsp; <?= $ps->NM_ADM; ?></td>
										</tr>
										<tr>
											<td><b>Tanggal Webinar</b> &nbsp;</td>
											<td for="TGL_WEB">:&nbsp;
												<?= date('l, d F Y', strtotime(str_replace('.', '-', $ps->TGL_WEB))); ?>
											</td>
										</tr>
										<tr>
											<td><b>Platform</b> &nbsp;</td>
											<td for="PLATFORM">:&nbsp; <?= $ps->PLATFORM; ?></td>
										</tr>
									</table>
									<div class="col-md-12 mt-5">
										<div class="card">
											<div class="card-header">
												<label for="LINK_MEETING">Link Meeting</label>
											</div>
											<div class="card-body">
												<?php 
												if ($ps->ST_POSTWEB == 1) {
													if ($ps->ST_LINK == 0) { ?>
														Belum diizinkan mengakses link meeting
												<?php 
													} else { ?>
														<?= htmlspecialchars_decode($ps->LINK_ZOOM);
													}
												} 
												?>
											</div>
										</div>
									</div>
									<div class="card-body">
										<?php if ($ps->ST_SRT == 1) { ?>
											<a type="button" class="btn btn-primary" href="<?= base_url('peserta/webinar/download_srt/'. $ps->SRT_WEBINAR); ?>">Download Sertifikat</a>
										<?php } else { ?>
											<a type="button" class="btn btn-primary btn-sm" href="#">Sertifikat belum dapat didownload</a>
										<?php } ?>
									</div>
								</div>
								</div>
							</div>
							<?php }}?>
						</div>
					</div>
					<!-- /.card-body -->
				</div>
				<!-- /.card -->
			</div>
			<!--/.col (left) -->
		</div>
		<!-- /.row -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
