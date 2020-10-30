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

    <header class="header_area">
        <div class="main-menu">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="<?=base_url();?>"><img src="<?= base_url(); ?>assets/dist/img/logo.png" width="130" alt="logo"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url();?>">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Kelas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="blog.html">Blog</a>
                        </li>
                    </ul>
                    <div class="mr-auto"></div>
                    <ul class="navbar-nav">
                    <?php if ($this->session->userdata('email') == "") { ?>
                        <li class="nav-item mr-2 ml-2 mb-2">
                            <a href="<?= base_url('peserta/auth/login'); ?>" class="nav-link btn btn-primary">Masuk</a>
                        </li>
                        <li class="nav-item ml-2 mr-2 mb-2">
                            <a href="<?= base_url('peserta/auth/register'); ?>" class="nav-link btn btn-warning">Daftar</a>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item ml-2 mr-2 mb-2">
                            <a href="<?= base_url('peserta/auth/logout'); ?>" class="nav-link btn btn-outline-dark">Logout</a>
                        </li>
                    <?php } ?>
                    </ul>
                </div>
            </nav>
        </div>
    </header>