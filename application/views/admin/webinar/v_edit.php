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
					<!-- /.card-header -->
					<?php foreach ($webinar as $wbnr) { ?>
					<form action="<?= base_url() . 'admin/webinar/update'; ?>" method="POST"
						enctype="multipart/form-data" class="form-horizontal">
						<div class="card-body">
							<input type="hidden" name="ID_WEBINAR" value="<?= $wbnr->ID_WEBINAR; ?>">
							<input type="hidden" name="ID_ADM" value="<?= $wbnr->ID_ADM; ?>">
							<label for="JUDUL_WEBINAR">Judul</label>
							<input type="text" class="form-control" name="JUDUL_WEBINAR"
								value="<?= str_replace('-', ' ', $wbnr->JUDUL_WEBINAR); ?>" autocomplete="off" autofocus
								required>
							<br>
							<div class="form-group">
								<label for="icon">Gambar</label>
								<div class="container">
									<div class="row">
										<div class="col-md-5">
											<div class="card">
												<img src="<?= base_url(); ?>assets/fotowebinar/<?= $wbnr->FOTO_WEBINAR; ?>"
													class="card-img-top" alt="gambar-foto">
												<div class="card-body">
													<!-- <h6 class="card-title"><?= $wbnr->FOTO_WEBINAR; ?></h6> -->
													<input type="hidden" name="HAPUS_FOTO"
														value="<?= $wbnr->FOTO_WEBINAR; ?>">
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
																<button type="button"
																	class="btn btn-danger btn-xs remove-preview">
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
													<input type="file" name="FOTO_WEBINAR" value="<?= $wbnr->FOTO_WEBINAR; ?>"
														class="dropzone" accept="image/x-png,image/gif,image/jpeg">
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<br>
							<label for="HARGA">Harga</label>
							<input type="text" class="form-control" name="HARGA" value="<?= $wbnr->HARGA; ?>"
								autocomplete="off" required>
							<datalist id="HARGA" class="form-control" name="HARGA" hidden>
								<option value="GRATIS">GRATIS</option>
							</datalist>
							<br>
							<label for="PLATFORM">Platform</label>
							<select name="PLATFORM" id="PLATFORM" class="form-control" required>
								<option value="ZOOM">ZOOM</option>
								<option value="GOOGLE MEET">GOOGLE MEET</option>
							</select>
							<br>
							<label for="LINK_ZOOM">Link Meeting</label>
							<textarea class="textarea" class="form-control"
								name="LINK_ZOOM"><?= $wbnr->LINK_ZOOM  ?></textarea>
							<label for="TGL_WEB">Tanggal Webinar</label> <br>
							<input type="date" name="TGL_WEB" id="TGL_WEB" class="form-control"
								value="<?php echo date('Y-m-d', strtotime($wbnr->TGL_WEB)); ?>">
							<br>
							<label for="KONTEN_WEB">Konten</label>
							<textarea class="textarea" class="form-control"
								name="KONTEN_WEB"><?= $wbnr->KONTEN_WEB  ?></textarea>
							<br><br>
							<button class="btn btn-primary btn-round">Batal</button>
							<button type="submit" class="btn btn-success btn-round">Simpan</button>
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
