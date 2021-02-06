<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Edit Webinar</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard'); ?>">Home</a></li>
						<li class="breadcrumb-item"><a href="<?= base_url('admin/Webinar'); ?>">Webinar</a></li>
						<li class="breadcrumb-item active">Edit Webinar</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
		<?= $this->session->flashdata('message'); ?>
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header bg-dark">
						<h3 class="card-title text-bold">Form Edit Webinar</h3>
					</div>
					<!-- /.card-header -->
					<?php foreach ($webinar as $wbnr) { ?>
						<form action="<?= base_url() . 'admin/webinar/update'; ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
							<div class="card-body">
								<input type="hidden" name="ID_WEBINAR" value="<?= $wbnr->ID_WEBINAR; ?>">
								<input type="hidden" name="ID_ADM" value="<?= $wbnr->ID_ADM; ?>">
								<label for="JUDUL_WEBINAR">Judul</label>
								<input type="text" class="form-control" name="JUDUL_WEBINAR" value="<?= str_replace('-', ' ', $wbnr->JUDUL_WEBINAR); ?>" autocomplete="off" autofocus required>
								<br>
								<div class="form-group">
									<label for="icon">Poster Webinar</label>
									<div class="container">
										<div class="row">
											<div class="col-md-5">
												<div class="card">
													<img src="<?= base_url(); ?>assets/fotowebinar/<?= $wbnr->FOTO_WEBINAR; ?>" class="card-img-top" alt="gambar-foto">
													<div class="card-body">
														<!-- <h6 class="card-title"><?= $wbnr->FOTO_WEBINAR; ?></h6> -->
														<input type="hidden" name="HAPUS_FOTO" value="<?= $wbnr->FOTO_WEBINAR; ?>">
													</div>
												</div>
											</div>
											<div class="col-md-7">
												<div class="form-group">
													<label class="control-label">Upload File</label>
													<div class="preview-zone hidden">
														<div class="box box-solid">
															<div class="box-header with-border">
																<div><b>Preview</b></div>
																<div class="box-tools pull-right">
																	<button type="button" class="btn btn-danger btn-xs remove-preview">
																		<i class="fa fa-times"></i> Reset
																	</button>
																</div>
															</div>
															<div class="box-body"></div>
														</div>
													</div>
													<div class="dropzone-wrapper">
														<div class="dropzone-desc">
															<i class="glyphicon glyphicon-download-alt"></i>
															<div>Pilih file gambar atau seret gambar kesini .</div>
														</div>
														<input type="file" name="FOTO_WEBINAR" value="<?= $wbnr->FOTO_WEBINAR; ?>" class="dropzone" accept="image/x-png,image/gif,image/jpeg">
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<br>
								<label for="HARGA">Harga</label>
								<input type="text" class="form-control" name="HARGA" value="<?= $wbnr->HARGA; ?>" autocomplete="off" required>
								<datalist id="HARGA" class="form-control" name="HARGA" hidden>
									<option value="GRATIS">GRATIS</option>
								</datalist>
								<br>
								<label for="PLATFORM">Platform</label>
								<select name="PLATFORM" id="PLATFORM" class="form-control" required value="<?= $wbnr->PLATFORM; ?>">
									<option value="">--Pilih--</option>
									<?php foreach ($platform as $plt) { ?>
										<option value="<?= $plt->NM_PLT; ?>" <?= $plt->NM_PLT == $wbnr->PLATFORM ? "selected" : null ?>>
											<?= $plt->NM_PLT; ?></option>
									<?php } ?>
								</select>
								<br>
								<label for="LINK_ZOOM">Link Meeting</label>
								<textarea class="textarea" class="form-control" name="LINK_ZOOM"><?= $wbnr->LINK_ZOOM  ?></textarea>
								<br>
								<!-- Tanggal buka pendaftaran -->
								<label for="TGL_BUKA">Tanggal Pembukaan Pendaftaran</label>
								<div class="input-group">
									<input type="text" data-toggle="datetimepicker" data-target=".pendaftaran" class="form-control pendaftaran" name="TGL_BUKA" id="TGL_BUKA" value="<?= date('d F Y H:i', strtotime($wbnr->TGL_BUKA)); ?>" autocomplete="off" placeholder="dd/mm/yyyy 00:00" required>
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="far fa-calendar-alt"></i>
										</span>
									</div>
								</div>
								<br>
								<!-- Tanggal tutup pendaftaran -->
								<label for="TGL_TUTUP">Tanggal Penutupan Pendaftaran</label>
								<div class="input-group">
									<input type="text" data-toggle="datetimepicker" data-target=".penutupan" class="form-control penutupan" name="TGL_TUTUP" id="TGL_TUTUP" value="<?= date('d F Y H:i', strtotime($wbnr->TGL_TUTUP)); ?>" autocomplete="off" placeholder="dd/mm/yyyy 00:00" required>
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="far fa-calendar-alt"></i>
										</span>
									</div>
								</div>
								<br>
								<!-- Tanggal mulai webinar -->
								<label for="TGL_WEB">Tanggal Webinar</label>
								<div class="input-group">
									<input type="text" data-toggle="datetimepicker" data-target=".mulai2" class="form-control mulai2" name="TGL_WEB" id="TGL_WEB" value="<?= date('d F Y H:i', strtotime($wbnr->TGL_WEB)); ?>" autocomplete="off" placeholder="dd/mm/yyyy 00:00" required>
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="far fa-calendar-alt"></i>
										</span>
									</div>
								</div>
								<br>
								<label for="KONTEN_WEB">Deskripsi Webinar</label>
								<textarea class="textarea" class="form-control" name="KONTEN_WEB"><?= $wbnr->KONTEN_WEB  ?></textarea>
								<br>
							</div>
							<div class="card-footer">
								<button type="submit" class="btn btn-primary float-right"><i class="fas fa-save"></i> Simpan</button>
								<a href="<?= base_url('admin/webinar'); ?>" class="btn btn-default float-right"><i class="fas fa-arrow-circle-left"></i> Batal</a>
							</div>
						</form>
					<?php } ?>
					<!-- /.card-body -->
				</div>
				<!-- /.card -->
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->