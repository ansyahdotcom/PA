<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1><?= $tittle; ?></h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= base_url('peserta/dashboard'); ?>">Home</a></li>
						<li class="breadcrumb-item active"><?= $tittle; ?></li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">

		<!-- Default box -->
		<div class="card card-solid">
			<div class="card-body pb-0">

				<div class="row justify-content-center">
					<div class="col-md-6">
						<form method="POST" action="<?= base_url('peserta/kelas'); ?>">
							<div class="input-group mb-3">
								<input class="form-control" type="text" name="keyword" placeholder="Temukan kelas pilihan anda..." autocomplete="off">
								<div class="input-group-append">
									<button class="btn btn-primary" type="submit" name="btn-search">
										<i class="fas fa-search"></i>
									</button>
								</div>
							</div>
						</form>
					</div>
				</div>
				<div class="row justify-content-center">
					<?php if ($this->session->userdata('keyword') == null) : ?>

					<?php else : ?>
						<?php if ($rows == 0) : ?>
							<h5 class="text-bold text-secondary">Hasil pencarian tidak ditemukan</h5>
						<?php else : ?>
							<h5 class="text-bold text-secondary">Ditemukan Hasil Pencarian: <?= $rows; ?></h5>
						<?php endif; ?>
					<?php endif; ?>
				</div>

				<div class="row d-flex align-items-stretch">
					<?php foreach ($kls as $k) :
						$id = $k['ID_KLS'];
						$kelas = $k['TITTLE'];
						$harga = $k['PRICE'];
						$gambar = $k['GBR_KLS'];
						$deskripsi = $k['DESKRIPSI'];
						$ktg = $k['KTGKLS'];
						$kuota_kls = $k['KUOTA_KLS'];
						$tgl_daftar = $k['TGL_PENDAFTARAN'];
						$tgl_penutupan = $k['TGL_PENUTUPAN'];
						$tgl_mulai = $k['TGL_MULAI'];
						$tgl_selesai = $k['TGL_SELESAI'];
					?>

						<?php
						/** Untuk mengecek jumlah pendaftar */
						$jml_pendaftar = $this->db->get_where('transaksi', [
							'STATUS' => 200,
							'ID_KLS' => $id
						])->num_rows();
						?>
						<div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
							<div class="card bg-light">
								<div class="card overflow-hidden position-relative" style="width:auto;height:150px;">
									<img src="<?= base_url('assets/dist/img/kelas/' . $gambar); ?>" alt="" class="img-responsive img-fluid position-absolute shadow" style="width:auto;top:-75px;bottom:-75px;">
									<div class="pt-2 pl-2">
										<span class="badge badge-primary right position-absolute shadow"><?= $ktg; ?></span>
									</div>
								</div>
								<div class="position-relative card-body pt-1">
									<div class="row">
										<div class="col-6">
											<small class="text-muted">
												<i class="fas fa-user-tie"></i>
												<span class="text-bold">Pendaftar <?= $jml_pendaftar; ?></span>
											</small>
										</div>
										<div class="col-6 text-right">
											<small class="text-muted">
												<i class="fas fa-users"></i>
												<span class="text-bold">Kuota <?= $kuota_kls - $jml_pendaftar; ?></span>
											</small>
										</div>
									</div>
									<input type="hidden" name="idkls" value="<?= $id; ?>">
									<div class="">
										<a href="" class="lead text-dark text-bold"><?= $kelas; ?></a>
									</div>
									<?php if ($tgl_daftar == "" && $tgl_penutupan == "" || $peserta['STATUS_BELI'] == 200) : ?>
										<?php if ($tgl_daftar == "" && $tgl_penutupan == "") : ?>
											<div class="row pt-2">
												<span class="btn btn-warning text-justify text-bold btn-block">
													<div class="col-md-12">
														<i class="fas fa-info pr-2"></i>
														Kelas ini tidak membuka pendaftaran.
													</div>
												</span>
											</div>
										<?php elseif ($peserta['STATUS_BELI'] == 200) : ?>
											<div class="row pt-2">
												<span class="btn btn-success text-justify text-bold btn-block">
													<div class="col-md-12">
														<i class="fas fa-info pr-2"></i>
														<small>
															Anda sudah terdaftar disalah satu kelas Preneur Academy,
															mohon selesaikan kelas anda agar bisa mendaftar ke kelas lainnya.
														</small> 
													</div>
												</span>
											</div>
										<?php endif; ?>
									<?php else : ?>
										<div class="row pt-2">
											<span class="col-md-12 alert alert-default-primary text-bold text-justify">
												<i class="far fa-edit pr-2"></i>
												Mulai kelas:
												<p>
													<?= tanggal_indo($tgl_mulai, false); ?>
													sampai <?= tanggal_indo($tgl_penutupan, false); ?>
												</p>
											</span>
										</div>
									<?php endif; ?>
								</div>
								<div class="card-footer">
									<?php
									$tgl = date('Y-m-d H:i', time());
									$tgl_now = strtotime($tgl);
									?>
									<div class="text-center">
										<!-- <?php if ($tgl_daftar > $tgl_now && $tgl_penutupan < $tgl_now) : ?>
											<?php
													if ($tgl_daftar > $tgl_now) :
														$text = "Kelas ini belum membuka pendaftaran";
														$btn = "btn-info";
														$icon = "fas fa-info";
													elseif ($tgl_penutupan < $tgl_now) :
														$text = "Pendaftaran kelas ini telah di tutup";
														$btn = "btn-danger";
														$icon = "fas fa-ban";
													endif;
											?>
											<div class="row">
												<div class="col-md-12">
													<span class="btn btn-sm <?= $btn; ?> text-bold btn-block">
														<div class="text-center">
															<i class="<?= $icon; ?> pr-2"> </i>
															<?= $text; ?>
														</div>
													</span>
												</div>
											</div>
										<?php else : ?> -->
										<div class="row">
											<div class="col-md-6 pt-2">
												<span class="btn btn-sm btn-success btn-block text-bold">
													<i class="fas fa-money-check"></i>
													<strike>Rp. <?= number_format($harga, 0, ".", "."); ?></strike>
												</span>
											</div>
											<div class="col-md-6 pt-2">
												<span class="btn btn-sm btn-warning btn-block text-bold" title="Harga Donasi Seikhlasnya">
													<i class="fas fa-wallet"></i>
													Donasi
												</span>
											</div>
										</div>
										<?php
													if ($jml_pendaftar == 50) :
														$btn = "btn-danger";
														$stts_btn = "disabled";
														$text = "Kuota Habis";
														$icon = "fas fa-ban";
														$tag = "button";
													else :
														$btn = "btn-primary";
														$stts_btn = "";
														$text = "Beli Kelas";
														$icon = "fas fa-cart-plus";
														$tag = "a";
													endif;
										?>
										<div class="row">
											<div class="col-md-12 pt-2">
												<!-- <button class="btn btn-sm <?= $btn; ?> beli btn-block" id="<?= $id; ?>" data-toggle="modal" data-target="#cekout<?= $id; ?>" <?= $stts_btn; ?>>
															<i class="<?= $icon; ?>"></i> <?= $text; ?>
														</button> -->
												<?php if ($tgl_daftar == "" && $tgl_penutupan == "" || $peserta['STATUS_BELI'] == 200) : ?>
													<button class="btn btn-sm btn-primary btn-block text-bold" disabled>
														<i class="fas fa-cart-plus"></i> Beli Kelas
													</button>
												<?php else : ?>
													<<?= $tag; ?> href="<?= base_url('peserta/transaksi/beli/' . $id); ?>" class="btn btn-sm <?= $btn; ?> btn-block text-bold"  title="Beli Kelas" <?= $stts_btn; ?>>
														<i class="<?= $icon; ?>"></i> <?= $text; ?>
													</<?= $tag; ?>>
												<?php endif; ?>
											</div>
										</div>
										<!-- <?php endif; ?> -->
									</div>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
			<!-- /.card-body -->
			<div class="card-footer">
				<?= $this->pagination->create_links(); ?>
			</div>
			<!-- /.card-footer -->
		</div>
		<!-- /.card -->
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- <?php foreach ($kls as $k) :
			$id = $k['ID_KLS'];
			$kelas = $k['TITTLE'];
			$harga = $k['PRICE'];
			$gambar = $k['GBR_KLS'];
			$deskripsi = $k['DESKRIPSI'];
			$ktg = $k['KTGKLS'];
		?> -->
<!-- Modal Cekout Kelas -->
<!-- <div class="modal fade" id="cekout<?= $id; ?>">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Detail Kelas</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form id="payment-form" method="POST" action="<?= site_url() ?>/peserta/kelas/finish">
					<div class="modal-body">
						<input type="hidden" name="result_type" id="result-type" value="">
						<input type="hidden" name="result_data" id="result-data" value=""> -->

<!-- Input untuk menangkap data json -->
<!-- <input type="hidden" class="id" name="id" id="id">
						<input type="hidden" class="kelas" name="kelas" id="kelas">
						<input type="hidden" class="harga" name="harga" id="harga"> -->
<!-- End tangkap data json -->

<!-- Input kirim data json -->
<!-- <input type="hidden" name="id_ps" id="id_ps" value="<?= $peserta['ID_PS']; ?>">
						<input type="hidden" name="nama" id="nama" value="<?= $peserta['NM_PS']; ?>">
						<input type="hidden" name="hp" id="hp" value="<?= $peserta['HP_PS']; ?>">
						<input type="hidden" name="email" id="email" value="<?= $peserta['EMAIL_PS']; ?>"> -->
<!-- End kirim json -->

<!-- <h4 class="text-bold"><?= $kelas; ?></h4> -->
<!-- <p class="text-muted"><?= htmlspecialchars_decode($deskripsi); ?></p> -->
<!-- <p class="text-bold">Harga: </p>
						<h2 class="text-bold text-success">Rp. <?= number_format($harga, 0, ".", "."); ?></h2>
					</div>
					<div class="modal-footer justify-content-between">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
						<button type="button" class="btn btn-primary" data-dismiss="modal" name="continue" id="continue">Lanjut Cekout</button>
					</div>
				</form>
			</div> -->
<!-- /.modal-content -->
<!-- </div> -->
<!-- /.modal-dialog -->
<!-- </div> -->
<!-- /.modal -->
<!-- <?php endforeach; ?> -->