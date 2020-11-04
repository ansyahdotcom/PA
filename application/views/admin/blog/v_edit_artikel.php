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
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">

					</div>
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
									<option selected disabled>Pilih Kategori</option>
									<?php foreach ($category as $ct) { ?>
										<option value="<?= $ct->ID_CT; ?>" <?= $ct->ID_CT == $blg->ID_CT ? "selected" : null ?>><?= $ct->NM_CT; ?></option>
									<?php } ?>
								</select>
								<button type="button" id="tambah_kategori" class="btn btn-primary btn-xs btn-round" data-toggle="modal" data-target="#modal_tambah_kategori">Tambah kategori baru</button>
								<br> <br>
								<label for="ID_TAGS">Tags</label>
								<select name="ID_TAGS" id="ID_TAGS" class="form-control">
									<?php foreach ($tags as $tg) { ?>
										<option value="<?= $tg->ID_TAGS; ?>"><?= $tg->NM_TAGS; ?></option>
									<?php } ?>
								</select>
								<br>
								<label for="FOTO_POST">Foto</label>
								<input type="text" class="form-control" name="FOTO_POST" value="<?php echo $blg->FOTO_POST ?>">
								<br>
								<label for="KONTEN_POST">Konten</label>
								<input type="text" class="form-control" name="KONTEN_POST" value="<?php echo $blg->KONTEN_POST ?>">
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