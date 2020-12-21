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
						<li class="breadcrumb-item"><a href="<?= base_url('admin/webinar'); ?>">Webinar</a></li>
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
					<form action="<?= base_url() . 'admin/webinar/update'; ?>" method="post"
						enctype="multipart/form-data" class="form-horizontal">
						<div class="card-body">
							<input type="hidden" name="ID_WEBINAR" value="<?= $wbnr->ID_WEBINAR ?>">
							<input type="hidden" name="ID_ADM" value="<?= $wbnr->ID_ADM ?>">
							<label for="JUDUL_WEBINAR">Judul</label>
							<input type="text" class="form-control" name="JUDUL_WEBINAR"
								value="<?= str_replace('-', ' ', $wbnr->JUDUL_WEBINAR); ?>" autocomplete="off" autofocus
								required>
							<br>
							<label for="ID_FA">fasilitas</label>
							<select name="ID_FA[]" id="ID_FA[]" class="select2bs4" multiple="multiple"
								data-placeholder="Pilih fasilitas" style="width: 100%;">
								<?php
								foreach($fasilitas as $fs) {
                                    foreach ($dt_fasilitas as $dtf) { ?>
								<option value="<?= $fs->ID_FA; ?>"
									<?= $fs->ID_FA == $dtf->ID_FA ? "selected" : null ?>>
									<?= $fs->NM_FA; ?></option>
								<?php 
                                    }} ?>
							</select>
							<br>
							<div class="form-group">
								<label for="icon">Foto</label>
								<div class="container">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<div class="preview-zone hidden">
													<div class="box box-solid">
														<div class="box-header with-border">
															<div><b>Preview</b></div>
															<!-- <img src="<?= base_url('assets/fotowebinar/fotoweb/'. $wbnr->FOTO_WEBINAR); ?>" alt=""> -->
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
													<input type="file" name="FOTO_WEBINAR" class="dropzone"
														value="<?= $wbnr->FOTO_WEBINAR ?>">
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<br>

							<label for="HARGA">Harga</label>
							<input type="text" class="form-control" name="HARGA" value="<?= $wbnr->HARGA; ?>"
								autocomplete="off" autofocus required>
							<br>
							<label for="PLATFORM">Platform</label>
							<input type="text" class="form-control" name="PLATFORM" value="<?= $wbnr->PLATFORM; ?>"
								autocomplete="off" autofocus required>
							<br>
							<label for="TGL_WEB">Tanggal Webinar</label> <br>
							<input type="date" name="TGL_WEB" id="TGL_WEB" class="form-control"
								value="<?php echo date('Y-m-d', strtotime($wbnr->TGL_WEB)); ?>">
							<br> <br>
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
