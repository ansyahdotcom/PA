<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Blog Preneur Academy</title>
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="<?= base_url(); ?>https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- icheck bootstrap -->
	<link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/adminlte.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="<?= base_url(); ?>https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700"
		rel="stylesheet">
	<!-- Mycss -->
	<link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/mycss/style.css">
	<!-- SweetAlert2 -->
	<link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

	<link href="<?= base_url();?>assets/vendor/Preneur/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?= base_url();?>assets/vendor/Preneur/css/blog.css" rel="stylesheet">
</head>

<body>
	<div class="container-fluid bg-light">
		<!--  ======================= Awalan Header ============================== -->
		<header class="blog-header py-3">
			<div class="row flex-nowrap justify-content-between align-items-center">
				<div class="col-4 pt-1">
					<img src="./img/logo.png" width="130" alt="logo">
				</div>
				<div class="col-4 text-center">
					<a class="blog-header-logo text-dark" href="blog.html">Preneur Blog</a>
				</div>
				<div class="col-4 d-flex justify-content-end align-items-center">
					<a class="text-muted" href="#" aria-label="Search">
						<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor"
							stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img"
							viewBox="0 0 24 24" focusable="false">
							<title>Search</title>
							<circle cx="10.5" cy="10.5" r="7.5" />
							<path d="M21 21l-5.2-5.2" />
						</svg>
					</a>
					<a class="btn btn-sm btn-primary" href="#">Masuk</a>
				</div>
			</div>
		</header>
		<!--  ======================= Batas Header ============================== -->

		<!--  ======================= Awalan Navbar ============================== -->
		<!-- <div class="nav-scroller py-1 mb-2">
			<nav class="nav d-flex">
				<a class="p-2 text-muted" href="index.html">Beranda</a>
				<a class="p-2 text-muted" href="#">Kelas</a>
				<a class="p-2 text-muted" href="#">Tips & Trick</a>
				<a class="p-2 text-muted" href="#">Inspirasi</a>
				<a class="p-2 text-muted" href="#">Komunitas</a>
			</nav>
		</div> -->
		<!--  ======================= Batas Navbar ============================== -->
		<?php foreach ($blog as $blg) { ?>
		<!--  ======================= Awalan Banner ============================== -->
		<!-- <div class="jumbotron p-4 p-md-5 text-white rounded bg-dark join"> -->
		<!-- <div class="col-md-6 px-0"> -->
		<div align="center">
		<h1 class="mt-4"><?= $blg->JUDUL_POST; ?></h1>
		<br>
			</div>
		<!-- </div> -->
		<!-- </div> -->
		<!--  ======================= Batas Banner ============================== -->

		<main role="main" class="container">
			<!-- Page Content -->
			<div class="container">

				<div class="row">

					<!-- Post Content Column -->
					<div class="col-lg-8">

						<!-- Title -->
						
						<br>

						<!-- Date/Time -->
						<span>
							<p><i class="fas fa-calendar"></i><?= date(' d F Y', strtotime($blg->TGL_POST)); ?></p>
							<i class="fa fa-folder"></i>
							<a class="link-black text-sm"
								href="<?= base_url('admin/blog/lihat_post_ktg/'. $blg->NM_CT); ?>"><?= $blg->NM_CT; ?></a>
							<i class="fas fa-tag"></i>
							<?php foreach ($detail_tags as $dttags) {?>
							<a href="<?= base_url('admin/blog/lihat_post_tag/'. $dttags->NM_TAGS); ?>"><?= $dttags->NM_TAGS; ?></a>
							<?php } ?>

						</span>
						<hr>

						<!-- Preview Image -->
						<img style="width: 720px; height: 405px;" src="<?= base_url('assets/fotoblog/'.$blg->FOTO_POST);?>" alt="">
		

						<hr>

						<!-- Post Content -->
						<p class="lead"><?= $blg->KONTEN_POST;  ?></p>

						<hr>
					</div>
					<!--  ======================= Awalan Sidebar ============================== -->
					<aside class="col-md-4 blog-sidebar">

						<!--  ======================= Awalan Artikel populer ============================== -->
						<div class="card my-4">
							<h5 class="card-header">Kategori</h5>
							<div class="card-body">
								<div class="row">
									<div class="col-lg-6">
										<ul class="list-unstyled mb-0">
											<?php foreach ($kategori as $ktg) { ?>
											<li>
												<a href="<?= base_url('admin/blog/lihat_post_ktg/'. $ktg->NM_CT); ?>"><?= $ktg->NM_CT; ?></a>
											</li>
											<?php } ?>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<!--  ======================= Batas Artikel populer ============================== -->

						<!--  ======================= Awalan Media sosial ============================== -->
						<div class="card my-4">
							<h5 class="card-header">Ikuti akun sosial media kami</h5>
							<div class="card-body">
								<div class="social">
									<a href="https://www.facebook.com/preneuracademy/"><i
											class="fab fa-facebook"></i></a>
									<a href="https://www.instagram.com/preneuracademy/"><i
											class="fab fa-instagram"></i></a>
									<a href="https://www.youtube.com/channel/UCr5MmNPr-xNwbyt7Hrzu6Hw"><i
											class="fab fa-youtube"></i></a>
									<a href="https://twitter.com/preneuracademy"><i class="fab fa-twitter"></i></a>
								</div>
							</div>
						</div>
						<!--  ======================= Batas Media sosial ============================== -->
					</aside>
					<!--  ======================= Batas Sidebar ============================== -->
				</div>
		</main>
		<?php } ?>
		<!--  ======================= Batas Main class ============================== -->
	</div>

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
			<path fill="#FFC107" fill-opacity="1"
				d="M0,256L48,229.3C96,203,192,149,288,154.7C384,160,480,224,576,218.7C672,213,768,139,864,128C960,117,1056,171,1152,197.3C1248,224,1344,224,1392,224L1440,224L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
			</path>
		</svg>
	</section>
	<!--  ========================== Batas Subscribe Area ============================  -->

	<footer class="footer-area bg-warning">
		<div class="container">
			<div class="">
				<div class="site-logo text-center py-4">
					<a href="#"><img src="./img/logo.png" width="150" alt="logo"></a>
				</div>
				<div class="container-fluid text-center text-md-left">
					<div class="row">
						<div class="col-md-6 mt-md-0 mt-3">
							<h5 class="text-uppercase">Alamat</h5>
							<p>Bengawan Solo Regency Kav 3-4,<br> Jl. Bengawan Solo, Kota Jember<br> 66122</p>
						</div>
						<hr class="clearfix w-100 d-md-none pb-3">
						<div class="col-md-3 mb-md-0 mb-3">
							<h5 class="text-uppercase">Menu</h5>
							<ul class="list-unstyled">
								<li>
									<a href="">Beranda</a>
								</li>
								<li>
									<a href="#">Kelas</a>
								</li>
								<li>
									<a href="#">Blog</a>
								</li>
							</ul>
						</div>
						<div class="col-md-3 mb-md-0 mb-3">
							<img src="./img/contact.svg" alt="banner-img" class="img-fluid">
						</div>
					</div>
				</div>

				<div class="social text-center">
					<h6 class="text-uppercase">Ikuti akun sosial media kami</h6>
					<a href="https://www.facebook.com/preneuracademy/"><i class="fab fa-facebook"></i></a>
					<a href="https://www.instagram.com/preneuracademy/"><i class="fab fa-instagram"></i></a>
					<a href="https://www.youtube.com/channel/UCr5MmNPr-xNwbyt7Hrzu6Hw"><i
							class="fab fa-youtube"></i></a>
					<a href="https://twitter.com/preneuracademy"><i class="fab fa-twitter"></i></a>
				</div>
				<div class="copyrights text-center">
					<p class="para">
						Copyright ©2020 All rights reserved by
						<a href="#"><span style="color: var(--primary-color);">Preneur Academy</span></a>
					</p>
				</div>
			</div>
		</div>
	</footer>
</body>

</html>
