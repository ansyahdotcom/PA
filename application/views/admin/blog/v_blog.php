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
		<!-- <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div> -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<section class="content">
		<div class="card-header">
			<div class="text-right">
				<a class="btn btn-primary" href="<?= base_url('admin/blog/tulis_blog'); ?>"><i class="fas fa-plus"></i>
					Tulis artikel</a>
			</div>
		</div>
		<?php foreach ($blog as $blg) { 
			$ID_POST = $blg->ID_POST;
			$ID_CT = $blg->ID_CT;
			?> 
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<div class="tab-content">
							<div class="active tab-pane" id="activity">
								<!-- Post -->
								<div class="post">
									<div class="user-block">
										<!-- <img class="img-circle img-bordered-sm"
											src="<?= base_url('assets/fotoicon/'. $blg->FOTO_POST); ?>"> -->
										<span class="username m-0 text-lg">
											<a class="text-dark"
												href="<?= base_url('admin/blog/edit_artikel/' . $blg->ID_POST.'/'); ?>"><?= $blg->JUDUL_POST; ?></a>

										</span>
										<hr>
										<span>
											<i class="fa fa-folder"></i>
											<a class="link-black text-lg"
												href="<?= base_url('admin/blog/lihat_post_ktg/'. $blg->NM_CT); ?>"><?= $blg->NM_CT; ?></a>

										</span>
									</div>
									<!-- /.user-block -->
									<!-- Karepnya nampilin sebagian kalimat di artikel -->
									<p>
										<!-- <?php 
										$i = 100;
										$KONTEN_POST = htmlspecialchars_decode($blg->KONTEN_POST);
										$konten = htmlspecialchars_decode(substr($KONTEN_POST, 0, $i));

										$char = $KONTEN_POST[$i - 1];
										while($char != ' ') {
											$char = $KONTEN_POST[--$i]; // Cari spasi pada posisi 49, 48, 47, dst...
										}
										echo substr($KONTEN_POST, 0, $i) . ' ...';
										?> -->
									</p>

									<p>
										<!-- Nyari status post trus ditampilkan sesuai status post -->
										<?php 
										if ($blg->ST_POST == 0) {
											echo '<label for="">Draf</label>';
										} else {
											echo '<label for="">Dipublikasikan</label>';
										}
										?>

										<label for="TGL_POST"
											class="text-sm mr-2"><?= ' | '. date('d F Y', strtotime($blg->TGL_POST)); ?></label>
										<span class="float-right">
											<!-- Nyari status post trus mau diposting apa nggak -->
											<?php 
											if ($blg->ST_POST == 0) {
												echo '<button type="button" id="detail" class="btn btn-warning btn-sm btn-round" style="color: white"
												data-toggle="modal" data-target="#modal_posting'. $blg->ID_POST.'">
												<i class="fas fa-arrow-circle-right"></i> Publikasikan</button>';
											} else {
												echo '<button type="button" id="detail" class="btn btn-success btn-sm btn-round" style="color: white"
												data-toggle="modal" data-target="#modal_posting'. $blg->ID_POST.'">
												<i class="fas fa-arrow-circle-left"></i> Kembalikan ke draf</button>';	
											}
											?>
											<!-- dilihat tampilan blognya sebelum diposting -->
											<a class="btn btn-secondary btn-sm btn-round"
												href="<?= base_url('admin/blog/pratinjau/'.$blg->ID_POST);?>"><i
													class="fas fa-eye"></i> Pratinjau</a>

											<!-- edit artikel -->
											<a href="<?= base_url('admin/blog/edit_artikel/' .$blg->ID_POST); ?>">
												<button type="button" class="btn btn-primary btn-circle btn-sm">
													<i class="fas fa-edit" style="color: white"></i> Edit
												</button>
											</a>
											<!-- hapus artikel -->
											<button type="button" id="detail" class="btn btn-danger btn-circle btn-sm"
												data-toggle="modal" data-target="#modal_hapus<?= $blg->ID_POST; ?>"
												style="color : white"><i class="fas fa-trash"></i> Hapus</button>
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

<!-- modal posting -->
<?php 
foreach ($blog as $blg) { 
	$ID_POST = $blg->ID_POST;
	$ST_POST = $blg->ST_POST;	
	?>
<div class="modal fade" id="modal_posting<?= $ID_POST; ?>" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<?php 
			if ($ST_POST == 0) {
				echo '<div class="modal-header">
						<h3 class="modal-title" id="myModalLabel">Publikasikan Artikel</h3>
					</div>
					<form action="'. base_url('admin/blog/pr_posting').'" method="post" class="form-horizontal">
						<div class="modal-body">
							<p>Apakah Anda yakin ingin mempublikasikan artikel ini?</p>
						</div>
						<div class="modal-footer">
							<input type="hidden" name="ST_POST" value="'. $ST_POST. '">
							<input type="hidden" name="ID_POST" value="'. $ID_POST. '">
							<button class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Batal</button>
							<button class="btn btn-primary">Ya</button>
						</div>
					</form>';
			} else {
				echo '<div class="modal-header">
						<h3 class="modal-title" id="myModalLabel">Kembalikan ke Draf</h3>
					</div>
					<form action="'. base_url('admin/blog/pr_posting').'" method="post" class="form-horizontal">
						<div class="modal-body">
							<p>Apakah Anda ingin mengembalikan artikel ke draf?</p>
						</div>
						<div class="modal-footer">
							<input type="hidden" name="ST_POST" value="'. $ST_POST. '">
							<input type="hidden" name="ID_POST" value="'. $ID_POST. '">
							<button class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Batal</button>
							<button class="btn btn-primary">Ya</button>
						</div>
					</form>';
			}
			?>
		</div>
	</div>
</div>

<!-- Modal Hapus -->
<div class="modal fade" id="modal_hapus<?= $ID_POST; ?>" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title" id="myModalLabel">Hapus Data</h3>
			</div>
			<form action="<?= base_url('admin/blog/hapus_artikel'); ?>" method="post" class="form-horizontal">
				<div class="modal-body">
					<p>Apakah Anda yakin ingin menghapus data ini?</p>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="ID_POST" value="<?= $ID_POST; ?>">
					<button class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Batal</button>
					<button class="btn btn-danger">Hapus</button>
				</div>
			</form>
		</div>
	</div>
</div>
<?php } ?>
