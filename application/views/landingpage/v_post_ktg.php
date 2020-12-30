<main role="main">
	<!-- Page Content -->
	<div class="container">
		<h1><?= $nm_ct; ?></h1>
		<hr>
		<?php foreach ($POST as $ktg) {
		?>
			<div class="row">
				<!-- Main content -->
				<div class="col-lg-8 blog-main">
					<section class="content">
						<div class="container-fluid">
							<div class="row">
								<div class="col-md-9">
									<div class="row">
										<h3 class="">
											<a href="<?= base_url('index/lihat_post/' . $ktg->JUDUL_POST); ?>"><?= str_replace('-', ' ', $ktg->JUDUL_POST); ?></a>

										</h3>
									</div>
									<div class="card-body">
										<div class="">
											<p><i class="fas fa-calendar"></i> <?= $ktg->TGL_POST; ?></p>
											<i class="fas fa-folder"></i>
											<a class="" href="<?= base_url('index/kategori/' . $ktg->NM_CT); ?>"><?= $ktg->NM_CT; ?></a>
											<i class="fas fa-tag ml-2"></i>
											<?php
											$queryy = $this->db->query("SELECT detail_tags.ID_TAGS, tags.NM_TAGS FROM detail_tags, tags, post
                                    WHERE post.ID_POST = detail_tags.ID_POST
                                    AND detail_tags.ID_TAGS = tags.ID_TAGS
									AND post.ID_POST = '$ktg->ID_POST'");
											$i = 1;
											foreach ($queryy->result() as $que) {
											?>
												<a href="<?= base_url('index/tag/' . $que->NM_TAGS); ?>"><?= $que->NM_TAGS; ?>
													<?= $i == count((array) $queryy->result()) ? '' : ', ' ?></a>
											<?php $i++;
											} ?>
											<hr>
											<img style="width: 600px; height: 400px;" class="img-fluid rounded" src="<?= base_url('assets/fotoblog/' . $ktg->FOTO_POST); ?>" alt="foto-post">
										</div>
										<hr>
										<div>
											<?php
											$i = 400;
											$konten = htmlspecialchars_decode($ktg->KONTEN_POST);
											$kont = str_replace('<p>', '', $konten);
											$KONTEN_POST = str_replace('</p>', '. ', $kont);
											// $konten = htmlspecialchars_decode(substr($KONTEN_POST, 0, $i));

											$char = $KONTEN_POST[$i - 1];
											while ($char != ' ') {
												$char = $KONTEN_POST[--$i]; // Cari spasi pada posisi 49, 48, 47, dst...
											}
											echo substr($KONTEN_POST, 0, $i) . ' ...';
											?>
										</div>
										<hr>
										<a class="btn btn-primary" href="<?= base_url('index/lihat_post/' . $ktg->JUDUL_POST); ?>">Lihat
											Post</a>
									</div>
									<!-- /.card -->
								</div>
							</div>
						</div>
					</section>
					<br><br><br>
				</div>
				<!--  ======================= Awalan Sidebar ============================== -->
				<div class="col-md-4 mb-2">

					<!--Card: Jumbotron-->
					<div class="jumbotron bg-warning p-4 p-md-5 fadeIn">

						<!-- Content -->
						<div class="card-body text-white text-center">
							<img src="<?= base_url(); ?>assets/dist/img/logo.png" width="130" alt="logo">
							<h4 class="para mb-2">
								<strong>
									<h5 class="text-dark font-weight-bold">Apa itu Preneur Academy</h5>
								</strong>
							</h4>
							<p class="para text-dark mb-2">
								<strong>
									merupakan ruang edukasi, ekosistem, dan komunitas wirausaha (E2KWU) yang mendorong
									pemberdayaan potensi diri untuk memberi manfaat pada lingkungannya melalui kegiatan
									kewirausahaan yang berkelanjutan.</strong>
							</p>
							<p class="para text-dark mb-2">
								<strong>
									Preneur Academy dirancang dengan pendekatan <b>training</b>, <b>mentoring</b>,
									<b>consulting</b>, dan <b>coaching (TM2C)</b>
									dalam proses pembelajaran.
								</strong>
							</p>

						</div>
						<!-- Content -->
					</div>
					<!--Card: Jumbotron-->

					<!--Card : Dynamic content wrapper-->
					<div class="card mb-4 wow fadeIn">

						<div class="card-header text-center font-weight-bold bg-warning">Berlangganan ke website ini?</div>

						<!--Card content-->
						<div class="card-body">

							<!-- Default form login -->
							<form>

								<!-- Default input email -->
								<label for="defaultFormEmailEx" class="grey-text">Email Anda</label>
								<input type="email" id="defaultFormLoginEmailEx" class="form-control">

								<br>

								<!-- Default input password -->
								<label for="defaultFormNameEx" class="grey-text">Nama Anda</label>
								<input type="text" id="defaultFormNameEx" class="form-control">

								<div class="text-center mt-4">
									<button class="btn btn-primary join btn-md" type="submit">Subscribe</button>
								</div>
							</form>
							<!-- Default form login -->

						</div>

					</div>
					<!--/.Card : Dynamic content wrapper-->

				</div>
				<!--Grid column-->
			</div> <!--  ======================= Batas Main class ============================== -->

		<?php } ?>


		<!--  ========================== Subscribe me Area ============================  -->
	</div>
	</div>
	<br>
	<section class="newsletter">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-10 text-center jumbotron bg-primary p-12 shadow">
					<img src="<?= base_url(); ?>assets/dist/img/subscribe.svg" width="200" alt="gambar-envelope">
					<div class="content text-center mt-5">
						<h2 class="text-white">SUBSCRIBE</h2>
						<p class="text-white">Dengan meng-klik subscribe artinya anda menyetujui layanan langganan ke
							website ini.</p>
						<div class="input-group p-5 mt-5 mb-5">
							<input type="email" class="form-control mr-2 mb-2" placeholder="Enter your email">
							<span class="input-group-btn">
								<button class="btn btn-warning ml-2 mb-2" type="submit">Subscribe Now</button>
							</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
			<path fill="#FFC107" fill-opacity="1" d="M0,256L48,229.3C96,203,192,149,288,154.7C384,160,480,224,576,218.7C672,213,768,139,864,128C960,117,1056,171,1152,197.3C1248,224,1344,224,1392,224L1440,224L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
			</path>
		</svg>
	</section>
	<!--  ========================== Batas Subscribe Area ============================  -->
</main>