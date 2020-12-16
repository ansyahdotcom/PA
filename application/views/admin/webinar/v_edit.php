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
                        <form action="<?= base_url() . 'admin/webinar/update'; ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <div class="card-body">
                                <input type="hidden" name="ID_WEBINAR" value="<?= $wbnr->ID_WEBINAR ?>">
                                <input type="hidden" name="ID_ADM" value="<?= $wbnr->ID_ADM ?>">
                                <label for="TEMA">Tema</label>
                                <input type="text" class="form-control" name="TEMA" value="<?= str_replace('-', ' ', $wbnr->TEMA); ?>" autocomplete="off" autofocus required>
                                <br>
                                <label for="ID_FA">fasilitas</label>
                                <select name="ID_FA[]" id="ID_FA[]" class="select2bs4" multiple="multiple" data-placeholder="Pilih fasilitas" style="width: 100%;">
                                    <?php
                                    foreach ($dt_fasilitas as $dtf) {
                                        foreach ($fasilitas as $fa) { ?>
                                            <option value="<?= $fa->ID_FA; ?>" <?= $fa->ID_FA == $dt->ID_FA ? "selected" : null ?>>
                                                <?= $fa->NM_FA; ?></option>
                                    <?php }
                                    } ?>
                                </select>
                                <button type="button" id="tambah_fasilitas" class="btn btn-primary btn-xs btn-round" data-toggle="modal" data-target="#modal_tambah_fasilitas">Tambah Fasilitas Baru</button>
                                <br> <br>
                                <!-- <label for="FOTO_WEBINAR">Foto</label>
							<input type="file" class="form-control" name="FOTO_WEBINAR"
								value="<?= $wbnr->FOTO_WEBINAR ?>">
							<br>
							<div class="form-group">
								<label for="icon">Foto</label>
								<div class="container">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
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
													<input type="file" name="FOTO_WEBINAR" class="dropzone" value="<?= $wbnr->FOTO_WEBINAR ?>">
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<br> -->

                                <label for="HARGA">Harga</label>
                                <input type="text" class="form-control" name="HARGA" value="<?= $wbnr->HARGA; ?>" autocomplete="off" autofocus required>
                                <br>
                                <label for="PLATFORM">Platform</label>
                                <input type="text" class="form-control" name="PLATFORM" value="<?= $wbnr->PLATFORM; ?>" autocomplete="off" autofocus required>
                                <br>
                                <label for="TGL_WEB">Tanggal Webinar</label> <br>
                                <input type="date" name="TGL_WEB" id="TGL_WEB" value="<?php echo date('Y-m-d', strtotime($wbnr->TGL_WEB)); ?>">
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

<!-- Modal buat fasilitas -->
<div class="modal fade" id="modal_tambah_fasilitas" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title title-1" id="myModalLabel">Buat Fasilitas</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?= base_url('admin/webinar/pr_tmbh_fasilitas'); ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="ID_FA" value="<?= $ID_FA; ?>">
                        <input type="text" class="form-control" name="NM_FA" autocomplete="off">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="save-btn" class="btn btn-success">Buat</button>
                </div>
            </form>
        </div>
    </div>
</div>