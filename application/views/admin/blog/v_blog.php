<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Blog</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard'); ?>">Home</a></li>
						<li class="breadcrumb-item active">Blog</li>
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
					<div class="card-header">
						<!-- <h3 class="card-title">Tabel Blog</h3> -->
						<div class="text-right">
							<a class="btn btn-primary" href="<?= base_url('admin/blog/tulis_blog'); ?>">Tulis artikel</a>
						</div>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<table id="example2" class="table table-bordered table-hover">
							<thead>
								<tr align="center">
									<th>Nomor</th>
									<th>Judul</th>
									<th>Kategori</th>
									<th>Tags</th>
									<th>Foto</th>
									<th>Isi</th>
									<th>Action</th>
								</tr>
							</thead>
							<?php
							$i = 1;
							foreach ($blog as $blg) { ?>
								<tbody>
									<tr>
										<td align="center"><?= $i++; ?></td>
										<td><?= $blg->JUDUL_POST; ?></td>
										<td><?= $blg->NM_CT; ?></td>
										<td><?= $blg->NM_TAGS; ?></td>
										<td><?= $blg->FOTO_POST; ?></td>
										<td><textarea name="" id="" rows="5" disabled><?= $blg->KONTEN_POST; ?></textarea></td>
										<td>
											<button type="button" id="posting_status" class="btn btn-primary btn-xs btn-round" data-toggle="modal" data-target="#modal_posting_status'.$blg->ID_POST.'">Posting</button>
											<button type="button" id="edit_status" class="btn btn-warning btn-xs btn-round" href="blog/edit">Ubah</button>
											<button type="button" id="hapus_status" class="btn btn-danger btn-xs btn-round" data-toggle="modal" data-target="#deleteModal">Hapus</button>
										</td>
									</tr>
								</tbody>
							<?php } ?>
						</table>
					</div>
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

<!-- modal alert hapus -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" arialabelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Apakah Anda Yakin?</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
				<?php echo anchor('admin/blog/hapus_artikel/' . $blg->ID_POST, 'Hapus', 'class="btn btn-danger"'); ?>
			</div>
		</div>
	</div>
</div>
<!-- modal alert hapus -->