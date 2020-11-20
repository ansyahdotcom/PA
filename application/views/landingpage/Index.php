    <!--  ======================= Awalan Area Utama ================================ -->
    <main class="site-main">


    	<!--  ======================= Awalan Banner=======================  -->
    	<section class="site-banner">
    		<div class="container">
    			<div class="row">
    				<div class="col-lg-12 text-center">
    					<?= $this->session->flashdata('message'); ?>
    				</div>
    			</div>
    			<div class="row">
    				<div class="col-lg-6 col-md-12 site-title">
    					<h3 class="title-text">lorem ipsum</h3>
    					<h1 class="title-text text-uppercase">Awokwowow</h1>
    					<h4 class="title-text text-uppercase">Anjayani</h4>
    					<div class="site-buttons">
    						<div class="d-flex flex-row flex-wrap">
    							<a href="<?=base_url('register');?>" class="btn button primary-button mr-4 text-uppercase">Daftar
    								Sekarang</a>
    							<button type="button" class="btn button secondary-button text-uppercase">Pelajari Lebih
    								Lanjut</button>
    						</div>
    					</div>
    				</div>
    				<div class="col-lg-6 col-md-12 banner-image">
    					<img src="<?= base_url(); ?>assets/dist/img/banner/instruktur.svg" alt="banner-img"
    						class="img-fluid">
    				</div>
    			</div>
    		</div>
    		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
    			<path fill="#FFC107" fill-opacity="1"
    				d="M0,64L60,96C120,128,240,192,360,192C480,192,600,128,720,112C840,96,960,128,1080,160C1200,192,1320,224,1380,240L1440,256L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z">
    			</path>
    		</svg>
    		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
    			<path fill="#FFC107" fill-opacity="1"
    				d="M0,288L60,256C120,224,240,160,360,160C480,160,600,224,720,213.3C840,203,960,117,1080,106.7C1200,96,1320,160,1380,192L1440,224L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z">
    			</path>
    		</svg>
    	</section>
    	<!--  ======================= Batas Banner =======================  -->

    	<!--  ========================= Awalan About ==========================  -->

    	<section class="about-area">
    		<div class="container-fluid">
    			<div class="row">
    				<div class="col-lg-6 col-md-12">
    					<div class="about-image">
    						<img src="<?= base_url(); ?>assets/dist/img/about-us.png" alt="About us" class="img-fluid">
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
    					<button type="button" class="btn button primary-button text-uppercase">Tentang Kami</button>
    				</div>
    			</div>
    		</div>
    	</section>

    	<!--  ========================= Batas About ==========================  -->

    	<!--  ========================= Awalan Program ==========================  -->

    	<section class="program-area">
    		<div class="container-fluid">
    			<div class="row">
    				<div class="col-lg-6 col-md-12">
    					<div class="about-image">
    						<img src="<?= base_url(); ?>assets/dist/img/setup.svg" alt="About us" class="img-fluid">
    					</div>
    				</div>
    				<div class="col-lg-6 col-md-12 program-title">
    					<h2 class="text-uppercase pt-5">
    						<span>Program kami di</span>
    						<span>Preneur Academy</span>
    					</h2>
    					<div class="program">
    						<div class="card mb-3 bg-warning" style="max-width: 540px;">
    							<div class="row no-gutters">
    								<div class="col-md-4">
    									<img src="<?= base_url(); ?>assets/dist/img/program/study.svg"
    										class="card-img p-3" alt="gambar kelas">
    								</div>
    								<div class="col-md-8">
    									<div class="card-body text-center">
    										<h5 class="card-title">Kelas Enterpreneur</h5>
    										<p class="card-text">Kelas belajar untuk berwirausaha.</p>
    										<a class="btn button primary-button" href="#">Lihat Kelas</a>
    									</div>
    								</div>
    							</div>
    						</div>
    						<div class="card mb-3 bg-warning" style="max-width: 540px;">
    							<div class="row no-gutters">
    								<div class="col-md-4">
    									<img src="<?= base_url(); ?>assets/dist/img/program/team.svg"
    										class="card-img p-3" alt="gambar komunitas">
    								</div>
    								<div class="col-md-8">
    									<div class="card-body text-center">
    										<h5 class="card-title">Join Komunitas</h5>
    										<p class="card-text">Ikut berperan dalam perubahan.</p>
    										<a class="btn button primary-button" href="#">Bergabung Sekarang</a>
    									</div>
    								</div>
    							</div>
    						</div>
    					</div>
    				</div>
    			</div>
    	</section>

    	<!--  ========================= Batas Program ==========================  -->


    	<!--  ====================== Awalan Fitur =============================  -->

    	<section class="services-area h-100">
    		<div class="container">
    			<div class="row">
    				<div class="col-lg-12 text-center services-title">
    					<h1 class="text-uppercase title-text">Mengapa harus Preneur Academy ?
    					</h1>
    					<p class="para">
    						Berikut merupakan program yang akan kamu dapat di Preneur Academy
    					</p>
    				</div>
    			</div>
    			<div class="container services-list">
    				<div class="row">
    					<div class="col-lg-3 col-md-6 col-sm-12">
    						<div class="services">
    							<div class="sevices-img text-center py-4">
    								<img src="<?= base_url(); ?>assets/dist/img/services/business.svg"
    									class="img-fluid p-5" alt="Services-1">
    							</div>
    							<div class="card-body text-center">
    								<h5 class="card-title text-uppercase font-roboto">Program 1.001 Wirausaha Baru</h5>
    								</h5>
    								<p class="card-text text-secondary">
    									Lorem ipsum dolor sit amet consectetur adipisicing
    									elit. Delectus error animi possimus perspiciatis
    									laboriosam nesciunt minus ipsum excepturi voluptates
    									impedit, aperiam placeat obcaecati inventore expedita
    									dolorum quibusdam ipsam voluptatem quasi?
    								</p>
    							</div>
    						</div>
    					</div>
    					<div class="col-lg-3 col-md-6 col-sm-12">
    						<div class="services">
    							<div class="sevices-img text-center py-4">
    								<img src="<?= base_url(); ?>assets/dist/img/services/book.svg" class="img-fluid p-5"
    									alt="Services-2">
    							</div>
    							<div class="card-body text-center">
    								<h5 class="card-title text-uppercase font-roboto">Kurikulum 6 semester</h5>
    								<p class="card-text text-secondary">
    									Lorem ipsum dolor sit amet consectetur adipisicing
    									elit. Delectus error animi possimus perspiciatis
    									laboriosam nesciunt minus ipsum excepturi voluptates
    									impedit, aperiam placeat obcaecati inventore expedita
    									dolorum quibusdam ipsam voluptatem quasi?
    								</p>
    							</div>
    						</div>
    					</div>
    					<div class="col-lg-3 col-md-6 col-sm-12">
    						<div class="services">
    							<div class="sevices-img text-center py-4">
    								<img src="<?= base_url(); ?>assets/dist/img/services/realtime.svg"
    									class="img-fluid p-5" alt="Services-3">
    							</div>
    							<div class="card-body text-center">
    								<h5 class="card-title text-uppercase font-roboto">Pendampingan Seumur Hidup</h5>
    								<p class="card-text text-secondary">
    									Lorem ipsum dolor sit amet consectetur adipisicing
    									elit. Delectus error animi possimus perspiciatis
    									laboriosam nesciunt minus ipsum excepturi voluptates
    									impedit, aperiam placeat obcaecati inventore expedita
    									dolorum quibusdam ipsam voluptatem quasi?
    								</p>
    							</div>
    						</div>
    					</div>
    					<div class="col-lg-3 col-md-6 col-sm-12">
    						<div class="services">
    							<div class="sevices-img text-center py-4">
    								<img src="<?= base_url(); ?>assets/dist/img/services/graduate.svg"
    									class="img-fluid p-5" alt="Services-4">
    							</div>
    							<div class="card-body text-center">
    								<h5 class="card-title text-uppercase font-roboto">E-Sertifikat</h5>
    								<p class="card-text text-secondary">
    									Lorem ipsum dolor sit amet consectetur adipisicing
    									elit. Delectus error animi possimus perspiciatis
    									laboriosam nesciunt minus ipsum excepturi voluptates
    									impedit, aperiam placeat obcaecati inventore expedita
    									dolorum quibusdam ipsam voluptatem quasi?
    								</p>
    							</div>
    						</div>
    					</div>
    				</div>
    			</div>
    		</div>
    	</section>

    	<!--  ====================== Batas Fitur =============================  -->

    	<!--  ======================== Awalan Blog ==============================  -->

    	<section class="about-area">
    		<div class="container">
    			<div class="row text-center">
    				<div class="col-12">
    					<div class="about-title">
    						<h1 class="text-uppercase title-h1">Blog</h1>
    						<p class="para">
    							Berikut beberapa artikel terpopuler.
    						</p>
    					</div>
    				</div>
    			</div>
			</div>
			
			<div class="container carousel py-lg-5">
                <div class="owl-carousel owl-theme">
				<?php foreach ($blog as $blg) { ?>
                    <div class="client row">
                        <div class="mb-3" style="max-width: 540px;">
                            <div class="row no-gutters">
                                <div class="col-md-12">
                                    <img src="<?= base_url('assets/fotoblog/'.$blg->FOTO_POST); ?>" class="card-img" alt="foto-post">
                                </div>
                                <div class="col-md-12">
                                    <div class="card-body">
                                        <h6 class="card-title"><?= $blg->JUDUL_POST; ?></h6>
                                        <p class="card-text"><small class="text-muted"><?= date('d F Y', strtotime($blg->TGL_POST)); ?></small></p>
                                        <!-- <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p> -->
                                        <a class="btn btn-primary" href="<?= base_url('index/detail_blog');?>">Lihat Post</a>
                                    </div>
                                </div>
                            </div>
                        </div>
					</div>
				<?php }?>
				</div>
			</div>
    	</section>

    	<!--  ======================== Batas Blog ==============================  -->

    	<!--  ========================== Subscribe me Area ============================  -->
    	<section class="newsletter">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-10 text-center jumbotron bg-primary p-12 shadow">
						<img src="<?=base_url();?>assets/dist/img/subscribe.svg" width="200" alt="gambar-envelope">
						<div class="content text-center mt-5">
							<h2 class="text-white">SUBSCRIBE</h2>
							<p class="text-white">Dengan meng-klik subscribe artinya anda menyetujui layanan langganan ke website ini.</p>
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


    </main>
    <!--  ======================= End Main Area ================================ -->
