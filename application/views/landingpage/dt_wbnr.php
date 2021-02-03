<header class="bg-warning py-5 mt-5 mb-5">
	<div class="container h-100">
	<div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
		<div class="row h-100 align-items-center">
			<a href="<?= base_url('index/webinar');?>" class="btn button secondary-button float-left"><i
					class="fas fa-arrow-left"></i> Kembali</a>
			<?php foreach ($webinar as $row) { ?>
			<div class="col-lg-12">
				<div class="site-buttons p-5">
					<div class="d-flex flex-row flex-wrap">
						<img src="<?= base_url('assets/fotowebinar/'). $row->FOTO_WEBINAR;?>" width="500"
							alt="gambar kelas" class="img-fluid ml-5">
						<div class="kelas ml-5">
							<h4 class="display-4 title-text"><?= str_replace('-', ' ', $row->JUDUL_WEBINAR); ?></h4>
							<p class="para text-dark">Oleh : <?= $row->NM_ADM?></p>
							<h5 class="font-weight-bold"><?= $row->HARGA; ?></h5>
							<?php if ($row->TGL_WEB >= date('Y-m-d H:i')) { ?>
							<a href="<?= base_url('register')?>" class="btn button primary-button mt-5 float-right"><i
									class="fas fa-shopping-cart"></i> Daftar Webinar</a>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
</header>

<div class="container mt-2 mb-2">
	<div class="card">
		<!-- <div class="card-header" id="headingOne">
			<h3 class="card-title pt-2"> Deskripsi</h3>
		</div> -->
		<div class="card-body">
			<p><?= htmlspecialchars_decode($row->KONTEN_WEB); ?></p>
			<!-- <p class="card-text">Tanggal Pelaksanaan</p> -->
			<!-- <p class="font-weight-bold"><?= date('d F Y', strtotime($row->TGL_WEB)); ?></p> -->
		</div>
	</div>
</div>

<?php } ?>

<hr>


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
