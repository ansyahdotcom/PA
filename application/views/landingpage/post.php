        <!--  ======================= Awalan Banner ============================== -->
        <!-- <div class="jumbotron text-center p-4 p-md-5 text-white rounded bg-dark join">
            <div class="col-md-12 text-center px-0">
                <h1 class="display-4">Blog</h1>
                <p class="lead my-3">Blog halaman utama.</p>
            </div>
        </div> -->
        <!--  ======================= Batas Banner ============================== -->
        </div>
        <main role="main" class="container">
        	<div class="row">
        		<div class="col-md-8 blog-main">
        			<h3 class="pb-4 mb-4">
        				Artikel Terbaru
        			</h3>
        			<?php foreach ($blog as $row) :?>
        			<!--  ======================= Awalan Blog post ============================== -->
        			<div class="blog-post card mb-4">
        				<img class="card-img-top" src="<?= base_url('assets/fotoblog/'.$row->FOTO_POST); ?>"
        					alt="Card image cap">
        				<div class="card-body">
        					<h2 class="card-title"><?= str_replace('-', ' ', $row->JUDUL_POST); ?></h2>
        					<p class="card-text">
        						<?php 
                    $aa = 200;
										$konten = htmlspecialchars_decode($row->KONTEN_POST);
										$em = str_replace('<em>', '', $konten);
										$strong = str_replace('<strong>', '', $em);
										$count = strlen($strong);
										if ($count > $aa){
											$char = $strong[$aa - 1];
											while($char != ' ') {
												$char = $strong[--$aa];
											}
											echo substr($strong, 0, $aa) . ' ...';
										} else {
											echo $strong;
										}
										?>
        					</p>
        					<a href="<?= base_url('blog/detail/'.strtolower($row->JUDUL_POST));?>" class="btn btn-primary">Read
        						More &rarr;</a>
        				</div>
        				<div class="card-footer text-muted">
        					Di posting pada <i class="fas fa-calendar"></i> <?= date('d-m-Y', strtotime($row->TGL_POST)); ?> Oleh
        					<a href="#">Admin</a>
        				</div>
        			</div>
        			<!--  ======================= Batas Blog post ============================== -->

        			<?php endforeach;?>

        			<!--  ======================= Awalan Pagination ============================== -->
        			<nav class="blog-pagination">
        				<!-- <a class="btn btn-outline-secondary disabled" href="#">Older</a>
                <a class="btn btn-outline-primary" href="#">1</a>
                <a class="btn btn-outline-primary" href="#">2</a>
                <a class="btn btn-outline-primary" href="#" tabindex="-1" aria-disabled="true">Newer</a> -->
        				<!--Tampilkan pagination-->
        				<?= $this->pagination->create_links(); ?>
        			</nav>
        			<!--  ======================= Batas Pagination ============================== -->
        		</div>

        		<!--Grid column-->
        		<div class="col-md-4 mb-2">

        			<!--Card: Jumbotron-->
        			<div class="jumbotron bg-warning mb-3 fadeIn">

        				<!-- Content -->
        				<div class="card-body text-white text-center">
        					<img src="<?= base_url();?>assets/dist/img/logo.png" width="130" alt="logo">
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
        	</div>

        </main>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        	<path fill="#FFC107" fill-opacity="1"
        		d="M0,256L48,229.3C96,203,192,149,288,154.7C384,160,480,224,576,218.7C672,213,768,139,864,128C960,117,1056,171,1152,197.3C1248,224,1344,224,1392,224L1440,224L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
        	</path>
        </svg>
