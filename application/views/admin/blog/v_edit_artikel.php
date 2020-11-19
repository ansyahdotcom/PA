<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Edit Artikel</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard'); ?>">Home</a></li>
						<li class="breadcrumb-item"><a href="<?= base_url('admin/blog'); ?>">Blog</a></li>
						<li class="breadcrumb-item active">Edit Artikel</li>
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
					<?php foreach ($post as $blg) { ?>
						<form action="<?php echo base_url() . 'admin/blog/update_artikel'; ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
							<div class="card-body">
								<input type="hidden" name="ID_POST" value="<?php echo $blg->ID_POST ?>">
								<input type="hidden" name="ID_ADM" value="<?php echo $blg->ID_ADM ?>">
								<label for="JUDUL_POST">Judul</label>
								<input type="text" class="form-control" name="JUDUL_POST" value="<?php echo $blg->JUDUL_POST ?>">
								<br>
								<label for="ID_CT">Kategori</label>
								<select name="ID_CT" id="ID_CT" class="form-control">
									<option disabled>Pilih Kategori</option>
									<?php foreach ($category as $ct) { ?>
										<option value="<?= $ct->ID_CT; ?>" <?= $ct->ID_CT == $blg->ID_CT ? "selected" : null ?>><?= $ct->NM_CT; ?></option>
									<?php } ?>
								</select>
								<!-- <button type="button" id="tambah_kategori" class="btn btn-primary btn-xs btn-round" data-toggle="modal" data-target="#modal_tambah_kategori">Tambah kategori baru</button> -->
								<br>
								<label for="ID_TAGS">Tags</label>
								<select name="ID_TAGS" id="ID_TAGS" class="form-control">
									<option disabled>Pilih Tags</option>
									<?php foreach ($tags as $tg) { ?>
										<option value="<?= $tg->ID_TAGS; ?>"><?= $tg->NM_TAGS; ?></option>
									<?php } ?>
								</select>
								<!-- <button type="button" id="buat_tags" class="btn btn-primary btn-xs btn-round" data-toggle="modal" data-target="#modal_buat_tags">Buat tags baru</button> -->
								<br>
								<label for="FOTO_POST">Foto</label>
								<input type="file" class="form-control" name="FOTO_POST" value="<?php echo $blg->FOTO_POST ?>">
								<br>
								<label for="KONTEN_POST">Konten</label>
								<textarea class="textarea" class="form-control" name="KONTEN_POST"><?php echo $blg->KONTEN_POST  ?></textarea>
								<br>
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

<!-- Modal tambah kategori -->
<div class="modal fade" id="modal_tambah_kategori" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title title-1" id="myModalLabel">Tambah Kategori Blog</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="post" action="<?= base_url('admin/blog/pr_tmbh_kategori2'); ?>">
				<div class="modal-body">
					<div class="form-group">
						<input type="hidden" class="form-control" name="ID_CT" value="<?= $ID_CT; ?>">
						<input type="text" class="form-control" name="NM_CT" autocomplete="off" autofocus>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" id="save-btn" class="btn btn-success">Tambah</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Modal buat tags -->
<div class="modal fade" id="modal_buat_tags" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title title-1" id="myModalLabel">Buat tags</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="post" action="<?= base_url('admin/blog/pr_buat_tags2'); ?>">
				<div class="modal-body">
					<div class="form-group">
						<input type="hidden" class="form-control" name="ID_TAGS" value="<?= $ID_TAGS; ?>">
						<input type="text" class="form-control" name="NM_TAGS" autocomplete="off">
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" id="save-btn" class="btn btn-success">Buat</button>
				</div>
			</form>
		</div>
	</div>
</div>