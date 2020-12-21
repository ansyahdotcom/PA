		<!-- Header -->
		<header class="bg-warning py-5 mb-5">
			<div class="container h-100">
				<div class="row h-100 align-items-center">
					<div class="col-lg-12">
						<div class="site-buttons p-5">
							<div class="d-flex flex-row flex-wrap">
								<div class="kelas mr-5">
									<h1 class="display-4 title-text">Kelas Online</h1>
									<!-- <p class="lead mb-5 para">Pada halaman ini terdapat list kelas online.</p> -->
								</div>
								<img src="<?= base_url(); ?>assets/dist/img/program/study.svg" width="500" alt="gambar kelas"
									class="img-fluid ml-5">
							</div>
						</div>
					</div>
				</div>
		</header>

		<!-- Page Content -->
		<div class="container p-5 mt-5 mb-5">
			<div class="row">
				<?php foreach ($kelas as $k) : ?>
				<div class="col-md-4 mb-5">
					<div class="card h-100">
						<img class="card-img-top" src="<?= base_url('assets/dist/img/kelas/'). $k->GBR_KLS;?>" alt="">
						<div class="card-body">
							<h4 class="card-title"><?= $k->TITTLE?></h4>
							<div class="deskripsi">
								<p class="para text-dark">Disusun oleh : <?= $k->NM_ADM?></p>
							</div>
						</div>
						<div class="card-footer">
							<div class="harga">
								<h5 class="float-right font-weight-bold">Rp. <?= number_format($k->PRICE, 0, ".", "."); ?>
								</h5>
							</div>
							<span class="badge bg-warning">Kategori: <?= $k->KTGKLS?></span>
						</div>
						<a href="<?= base_url('class/detail/'.$k->ID_KLS);?>"
							class="btn btn-primary font-weight-bold text-uppercase m-2">Lihat Detail</a>
					</div>
				</div>
				<?php endforeach;?>
			</div>
		</div>

		<hr>
		<!--  ========================= Awalan About ==========================  -->

		<section class="about-area mt-5" id="about-area">
			<div class="container-fluid">
				<div class="row p-5">
					<div class="col-lg-6 col-md-12">
						<div class="about-image">
							<img src="<?= base_url(); ?>assets/dist/img/about-us.png" width="500" alt="About us"
								class="img-fluid">
						</div>
					</div>
					<div class="col-lg-6 col-md-12 about-title">
						<h2 class="text-uppercase pt-5">
							<span>Apa Itu</span>
							<span>Preneur Academy?</span>
						</h2>
						<div class="paragraph py-4 w-75">
							<p class="para">
								merupakan ruang edukasi, ekosistem, dan komunitas wirausaha (E2KWU) yang mendorong
								pemberdayaan potensi diri untuk memberi manfaat pada lingkungannya melalui kegiatan
								kewirausahaan yang berkelanjutan.
							</p>
							<p class="para">
								Preneur Academy dirancang dengan pendekatan <b>training</b>, <b>mentoring</b>,
								<b>consulting</b>, dan <b>coaching (TM2C)</b>
								dalam proses pembelajaran.
							</p>
						</div>
						<!-- <button type="button" class="btn button primary-button text-uppercase">Tentang Kami</button> -->
					</div>
				</div>
			</div>
		</section>

		<!--  ========================= Batas About ==========================  -->

		<!--  ========================== Subscribe me Area ============================  -->
		<section class="newsletter mt-5">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-10 text-center jumbotron bg-primary p-12 shadow">
						<img src="<?=base_url();?>assets/dist/img/subscribe.svg" width="200" alt="gambar-envelope">
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
				<path fill="#FFC107" fill-opacity="1"
					d="M0,256L48,229.3C96,203,192,149,288,154.7C384,160,480,224,576,218.7C672,213,768,139,864,128C960,117,1056,171,1152,197.3C1248,224,1344,224,1392,224L1440,224L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
				</path>
			</svg>
		</section>
		<!--  ========================== Batas Subscribe Area ============================  -->
