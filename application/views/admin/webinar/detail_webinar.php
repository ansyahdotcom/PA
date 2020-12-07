	<?php foreach ($webinar as $wbnr) { ?>

		<main role="main" class="container">
			<!-- Page Content -->
			<div class="container">

				<div class="row">

					<!-- Post Content Column -->
					<div class="col-lg-8">

						<!-- Title -->
						<h1 class="mt-4">
							<?= $wbnr->TEMA; ?>
						</h1>

						<hr>

						<!-- Date/Time -->
						<span>
							<p><i class="fas fa-calendar"></i><?= date(' d F Y', strtotime($wbnr->TGL_POSTWEB)); ?>
								<i class="fa fa-folder"></i> </p>

						</span>

						<hr>

						<!-- Preview Image -->
						<img class="img-fluid rounded" src="<?= base_url('assets/fotowebinar/' . $wbnr->FOTO_PEMATERI); ?>" alt="foto-pemateri">
						<br>

						<hr>
					</div>
					<!--  ======================= Awalan Sidebar ============================== -->
					<aside class="col-md-4 blog-sidebar">

						<!--  ======================= Awalan Media sosial ============================== -->
						<div class="card my-4">
							<h5 class="card-header">Ikuti akun sosial media kami</h5>
							<div class="card-body">
								<div class="social">
									<!-- <a href="https://www.facebook.com/preneuracademy/"><i class="fab fa-facebook"></i></a>
					<a href="https://www.instagram.com/preneuracademy/"><i class="fab fa-instagram"></i></a>
					<a href="https://www.youtube.com/channel/UCr5MmNPr-xNwbyt7Hrzu6Hw"><i class="fab fa-youtube"></i></a>
					<a href="https://twitter.com/preneuracademy"><i class="fab fa-twitter"></i></a>   -->
									<a href="#"><i class="fab fa-facebook"></i></a>
									<a href="#"><i class="fab fa-instagram"></i></a>
									<a href="#"><i class="fab fa-youtube"></i></a>
									<a href="#"><i class="fab fa-twitter"></i></a>
								</div>
							</div>
						</div>
						<!--  ======================= Batas Media sosial ============================== -->
					</aside>
					<!--  ======================= Batas Sidebar ============================== -->
				</div>
		</main>
		<!--  ======================= Batas Main class ============================== -->
		</div>
	<?php } ?>

	<!--  ========================== Subscribe me Area ============================  -->
	<section class="subscribe-us-area">
		<div class="container subscribe bg-warning justify-content-center">
			<div class="row">
				<div class="col-lg-12 text-center subscribe-title">
					<h4 class="text-uppercase">Dapatkan update dari mana saja</h4>
					<p class="para">Dengan mengklik subscribe, anda akan mendapatkan update artikel terbaru.</p>
				</div>
			</div>
			<div class="d-sm-flex  form justify-content-center">
				<form class="ml-10">
					<div class="row">
						<div class="col-md-8 pl-4 pr-4 mt-2">
							<input type="email" class="form-control" placeholder="Email">
						</div>
						<div class="col-md-4 pl-4 pr-4 mt-2">
							<button type="submit" class="btn btn-success form-control">Subscribe</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
			<path fill="#FFC107" fill-opacity="1" d="M0,256L48,229.3C96,203,192,149,288,154.7C384,160,480,224,576,218.7C672,213,768,139,864,128C960,117,1056,171,1152,197.3C1248,224,1344,224,1392,224L1440,224L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
			</path>
		</svg>
	</section>
	<!--  ========================== Batas Subscribe Area ============================  -->