<!doctype html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?=$judul?></title>

	<link rel="stylesheet" href="<?= base_url();?>assets/dist/css/blog.css">

	<!--  Bootstrap css file  -->
	<link rel="stylesheet" href="<?= base_url();?>assets/dist/css/bootstrap.min.css">

	<!-- Favicon -->
	<link rel="icon" type="image/png" href="<?= base_url(); ?>assets/dist/img/favicon/favicon-32x32.png"
		sizes="32x32" />
	<link rel="icon" type="image/png" href="<?= base_url(); ?>assets/dist/img/favicon/favicon-16x16.png"
		sizes="16x16" />

	<!--  font awesome icons  -->
	<link rel="stylesheet" href="<?= base_url();?>assets/dist/css/all.min.css">

	<link rel="stylesheet" href="<?= base_url();?>assets/dist/css/login.css">

	<!--  Magnific Popup css file  -->
	<link rel="stylesheet" href="<?= base_url();?>assets/dist/js/plugin/Magnific-Popup/dist/magnific-popup.css">

	<!--  Owl-carousel css file  -->
	<link rel="stylesheet" href="<?= base_url();?>assets/dist/js/plugin/owl-carousel/css/owl.carousel.min.css">
	<link rel="stylesheet" href="<?= base_url();?>assets/dist/js/plugin/owl-carousel/css/owl.theme.default.min.css">

	<link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@700&display=swap" rel="stylesheet">
	<!--  custom css file  -->
	<link rel="stylesheet" href="<?= base_url();?>assets/dist/css/style.css">

	<!--  Responsive css file  -->
	<link rel="stylesheet" href="<?= base_url();?>assets/dist/css/responsive.css">
</head>

<body>

	<div class="container-all">
		<header class="header_area">
			<div class="main-menu">
				<nav class="navbar navbar-expand-lg navbar-light bg-warning">
					<a class="navbar-brand" href="<?=base_url('home');?>"><img
							src="<?= base_url(); ?>assets/dist/img/logo.png" width="130" alt="logo"></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
						aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarNav">
						<ul class="navbar-nav">
							<?php foreach ($header as $h) :
                        $name = $h['NM_NV'];
                        $link = $h['LINK_NV'];
                    ?>
							<li class="nav-item">
								<a class="nav-link" href="<?= $link;?>"><?= $name;?></a>
							</li>
							<?php endforeach;?>
						</ul>
						<div class="mr-auto"></div>
						<ul class="navbar-nav">
							<li class="nav-item mr-2 ml-2 mb-2">
								<a href="<?= base_url('auth'); ?>" class="nav-link btn button primary-button">Masuk</a>
							</li>
							<li class="nav-item ml-2 mr-2 mb-2">
								<a href="<?= base_url('register'); ?>" class="nav-link btn button secondary-button">Daftar</a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</header>
