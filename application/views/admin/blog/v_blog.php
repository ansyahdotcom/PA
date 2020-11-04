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
											<img class="img-circle img-bordered-sm" src="assets/fotoblog/Screenshot_(226).png">
											<span class="username">
												<label><?= $blg->JUDUL_POST; ?></label>
												<a href="<?= base_url('admin/blog/edit_artikel/' . $blg->ID_POST); ?>">
													<button type="button" class="btn btn-primary btn-circle btn-sm">
														<i class="fas fa-edit" style="color: white"></i> Edit
													</button>
												</a>
											</span>
											<span class="description"><?= $blg->NM_CT . " | " . $blg->TGL_POST = date('d F Y'); ?></span>
										</div>
										<!-- /.user-block -->
										<p>
											<?= $blg->KONTEN_POST ?>
										</p>

										<p>
											<a href="#" class="link-black text-sm mr-2"></i>
												<?= $blg->NM_TAGS; ?></a>

											<span class="float-right">
												<a href="">Pratinjau</a>
												<a href="">Posting</a>
												<a href="<?= base_url('admin/blog/hapus_artikel/' .  $blg->ID_POST); ?>" onclick="return confirm('Anda yakin mau menghapus data ini ?')">
													<button type="button" class="btn btn-danger btn-circle btn-sm" style="color: white">
														<i class="fas fa-trash"></i> Hapus
													</button>
												</a>
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