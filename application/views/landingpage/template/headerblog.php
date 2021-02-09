<!doctype html>
<html lang="en">

<head>
<<<<<<< Updated upstream
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?=$judul?></title>

	<link rel="stylesheet" href="<?= base_url();?>assets/dist/css/blog.css">
	<!--  Bootstrap css file  -->
	<link rel="stylesheet" href="<?= base_url();?>assets/dist/css/bootstrap.min.css">
	<!--  Magnific Popup css file  -->
	<link rel="stylesheet" href="<?= base_url();?>assets/dist/js/plugin/Magnific-Popup/dist/magnific-popup.css">
	<!--  Owl-carousel css file  -->
	<link rel="stylesheet" href="<?= base_url();?>assets/dist/js/plugin/owl-carousel/css/owl.carousel.min.css">
	<link rel="stylesheet" href="<?= base_url();?>assets/dist/js/plugin/owl-carousel/css/owl.theme.default.min.css">
	<!-- Favicon -->
	<link rel="icon" type="image/png" href="<?= base_url(); ?>assets/dist/img/favicon/favicon-32x32.png"
		sizes="32x32" />
	<link rel="icon" type="image/png" href="<?= base_url(); ?>assets/dist/img/favicon/favicon-16x16.png"
		sizes="16x16" />
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
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@700&display=swap" rel="stylesheet">
	<!--  custom css file  -->
	<link rel="stylesheet" href="<?= base_url();?>assets/dist/css/style.css">
	<!--  Responsive css file  -->
	<link rel="stylesheet" href="<?= base_url();?>assets/dist/css/responsive.css">
</head>

<body>
	<div class="container bg-light">
		<!--  ======================= Awalan Header ============================== -->
		<header class="blog-header py-3">
			<div class="row flex-nowrap justify-content-between align-items-center">
				<div class="col-4 pt-1">
					<a href="<?=base_url()?>"><img src="<?= base_url();?>assets/dist/img/logo.png" width="130"
							alt="logo"></a>
				</div>
				<div class="col-4 text-center">
					<a class="blog-header-logo text-dark" href="<?= base_url('blog');?>">
						<h3>Preneur Academy Blog</h3>
					</a>
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
					<a class="button primary-button btn-md" href="<?= base_url('auth')?>">Masuk <i
							class="fas fa-sign-in-alt"></i></a>
				</div>
			</div>
		</header>
=======
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $judul ?></title>

    <!-- Box Icons -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/boxicons/css/boxicons.min.css">

    <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/icofont.min.css">
    <!-- AOS Accordion -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/aos.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/blog.css">
    <!--  Bootstrap css file  -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/bootstrap.min.css">
    <!--  Magnific Popup css file  -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/js/plugin/Magnific-Popup/dist/magnific-popup.css">
    <!--  Owl-carousel css file  -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/js/plugin/owl-carousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/js/plugin/owl-carousel/css/owl.theme.default.min.css">
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="<?= base_url(); ?>assets/dist/img/favicon/favicon-32x32.png"
        sizes="32x32" />
    <link rel="icon" type="image/png" href="<?= base_url(); ?>assets/dist/img/favicon/favicon-16x16.png"
        sizes="16x16" />
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
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@700&display=swap" rel="stylesheet">
    <!--  custom css file  -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/style.css">
    <!--  Responsive css file  -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/responsive.css">
</head>

<body>
    <div class="container bg-light">
        <!--  ======================= Awalan Header ============================== -->
        <header class="blog-header py-3">
            <div class="row flex-nowrap justify-content-between align-items-center">
                <div class="col-4 pt-1">
                    <a href="<?= base_url() ?>"><img src="<?= base_url(); ?>assets/dist/img/logo.png" width="130"
                            alt="logo"></a>
                </div>
                <div class="col-4 text-center">
                    <a class="blog-header-logo text-dark" href="<?= base_url('blog'); ?>">
                        <h3>Preneur Academy Blog</h3>
                    </a>
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
                    <a class="button primary-button btn-md" href="<?= base_url('auth') ?>">Masuk <i
                            class="fas fa-sign-in-alt"></i></a>
                </div>
            </div>
        </header>
>>>>>>> Stashed changes

		<!--  ======================= Awalan Navbar ============================== -->
		<!-- <div class="nav-scroller py-1 mb-2">
            <nav class="nav justify-content-center d-flex">
<<<<<<< Updated upstream
            <a class="p-2 text-muted" href="<?= base_url('blog')?>">Beranda</a>
=======
                <a class="p-2 text-muted" href="<?= base_url('blog') ?>">Beranda</a>
                <?php foreach ($kategori as $ktg) { ?>
                <a class="p-2 text-muted"
                    href="<?= base_url('index/kategori/' . $ktg->NM_CT); ?>"><?= $ktg->NM_CT; ?></a>
                <?php } ?>
>>>>>>> Stashed changes
            </nav>
        </div> -->
		<!--  ======================= Batas Navbar ============================== -->
