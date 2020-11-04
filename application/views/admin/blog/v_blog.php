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
		<div class="card-header">
			<div class="text-right">
				<a class="btn btn-primary" href="<?= base_url('admin/blog/tulis_blog'); ?>">Tulis
					artikel</a>
			</div>
		</div>
		<?php foreach ($blog as $blg) { ?>
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<div class="tab-content">
							<div class="active tab-pane" id="activity">
								<!-- Post -->
								<div class="post">
									<div class="user-block">
										<img class="img-circle img-bordered-sm"
											src="assets/fotoblog/Screenshot_(226).png">
										<span class="username">
											<a
												href="<?= base_url('admin/blog/ubah_blog/'.$blg->ID_POST);?>"><?= $blg->JUDUL_POST; ?></a>
										</span>
										<span class="description"><?= $blg->NM_CT." | ".$blg->TGL_POST;?></span>
									</div>
									<!-- /.user-block -->
									<p>
										Lorem
									</p>

									<p>
										<a href="#" class="link-black text-sm mr-2"></i>
											<?= $blg->NM_TAGS; ?></a>

										<span class="float-right">
											<a href="">Pratinjau</a>
											<a href="">Posting</a>
											<button type="button" id="hapus_status"
												class="btn btn-danger btn-xs btn-round" data-toggle="modal"
												data-target="#deleteModal">Hapus</button>
										</span>
									</p>
								</div>
								<!-- /.post -->
							</div>
							<!-- /.tab-pane -->
						</div>
						<!-- /.tab-content -->
					</div>
					<!-- /.card-body -->
				</div>
			</div>
		</div>
		<?php } ?>
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- modal alert hapus -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" arialabelledby="exampleModalLabel"
	aria-hidden="true">
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
