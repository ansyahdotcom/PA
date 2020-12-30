</div>
<main class="mt-5 pt-5">
    <div class="container">

      <!--Section: Post-->
      <section class="mt-4">
		<?php foreach ($blog as $blg) {
		?>
        <!--Grid row-->
        <div class="row">

          <!--Grid column-->
          <div class="col-md-8 mb-4">

            <!--Featured Image-->
            <div class="card mb-4 wow fadeIn">
				<h2 class="m-3 font-weight-bold"><?= str_replace('-',' ',$blg->JUDUL_POST);?></h2>
				<div class="ket mb-3">
				<i class="fas fa-calendar"></i><?= date(' d F Y', strtotime($blg->TGL_POST)); ?>
				<i class="fa fa-folder"></i>
						<a class="" href="<?= base_url('index/kategori/'. $blg->NM_CT); ?>"><?= $blg->NM_CT; ?></a>
						<i class="fas fa-tag ml-2"></i>
						<?php 
							$i = 1;
							foreach($detail_tags as $dt){ ?>
						<a class=""
							href="<?= base_url('index/tag/'. $dt->NM_TAGS); ?>"><?= $dt->NM_TAGS; ?><?= $i == count((array) $detail_tags) ? '' : ', ' ?></a>
						<?php $i++; } ?>
				</div>
				<img src="<?= base_url('assets/fotoblog/'.$blg->FOTO_POST); ?>" class="img-fluid rounded" alt="foto-post">

            </div>
			<!--/.Featured Image-->

            <!--Card-->
            <div class="card mb-4 wow fadeIn">

              <!--Card content-->
              <div class="card-body">\
                <p class="h5 my-4"><?= htmlspecialchars_decode($blg->KONTEN_POST)?></p>

                <hr>

				<p class="float-right"><i class="fas fa-flipboard"></i>
						<!-- <br> -->
						<i class="fa fa-folder"></i>
						<a class="" href="<?= base_url('index/kategori/'. $blg->NM_CT); ?>"><?= $blg->NM_CT; ?></a>
						<i class="fas fa-tag ml-2"></i>
						<?php 
							$i = 1;
							foreach($detail_tags as $dt){ ?>
						<a class=""
							href="<?= base_url('index/tag/'. $dt->NM_TAGS); ?>"><?= $dt->NM_TAGS; ?><?= $i == count((array) $detail_tags) ? '' : ', ' ?></a>
						<?php $i++; } ?></p>

              </div>

            </div>
			<!--/.Card-->
			
			<!--Card-->
            <div class="card mb-4 wow fadeIn">

              <div class="card-header font-weight-bold">
                <span>Ikuti kami</span>
                <span class="pull-right">
				<?php foreach ($footer as $f) :
                        $icon = $f['IC_MS'];
                        $link = $f['LINK_MS'];
                ?>
                  <a href="<?=$link;?>" target="_blank">
                    <i class="<?=$icon;?> mr-2"></i>
				  </a>
				<?php endforeach;?>
                </span>
              </div>

            </div>
            <!--/.Card-->

            <!--Reply-->
            <div class="card mb-3 wow fadeIn">
              <div class="card-header font-weight-bold">Tinggalkan Komentar</div>
              <div class="card-body">

                <!-- Default form reply -->
                <form>

                  <!-- Comment -->
                  <div class="form-group">
                    <label for="replyFormComment">Your comment</label>
                    <textarea class="form-control" id="replyFormComment" rows="5"></textarea>
                  </div>

                  <!-- Name -->
                  <label for="replyFormName">Your name</label>
                  <input type="email" id="replyFormName" class="form-control">

                  <br>

                  <!-- Email -->
                  <label for="replyFormEmail">Your e-mail</label>
                  <input type="email" id="replyFormEmail" class="form-control">


                  <div class="text-center mt-4">
                    <button class="btn btn-info btn-md" type="submit"><i class="fas fa-paper-plane"></i> Post</button>
                  </div>
                </form>
                <!-- Default form reply -->
              </div>
            </div>
            <!--/.Reply-->

          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-md-4 mb-4">
			<!--Card-->
            <div class="card mb-4 wow fadeIn">

              <div class="card-header"><i class="fas fa-fire-alt"></i> Artikel Terbaru</div>

              <!--Card content-->
              <div class="card-body">
				<?php foreach ($list as $ls) {?>
                <ul class="list-unstyled">
                  <li class="media">
                    <img class="d-flex mr-3" src="<?= base_url('assets/fotoblog/'.$ls->FOTO_POST); ?>" alt="post-blog" width="100">
                    <div class="media-body">
                      <a href="">
                        <h5 class="mt-0 mb-1 font-weight-bold"><?= str_replace('-',' ',$ls->JUDUL_POST);?></h5>
                      </a>
                      <p class="card-text">
						<?php 
						$aa = 100;
													$konten = htmlspecialchars_decode($ls->KONTEN_POST);
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
                    </div>
                  </li>
				</ul>
				<?php }?>

              </div>

            </div>
            <!--/.Card-->

            <!--Card : Dynamic content wrapper-->
            <div class="card mb-4 text-center wow fadeIn">

              <div class="card-header"><i class="fas fa-newspaper"></i> Berlangganan newsletter?</div>

              <!--Card content-->
              <div class="card-body">

                <!-- Default form login -->
                <form>

                  <!-- Default input email -->
                  <label for="defaultFormEmailEx" class="grey-text">Your email</label>
                  <input type="email" id="defaultFormLoginEmailEx" class="form-control">

                  <br>

                  <!-- Default input password -->
                  <label for="defaultFormNameEx" class="grey-text">Your name</label>
                  <input type="text" id="defaultFormNameEx" class="form-control">

                  <div class="text-center mt-4">
                    <button class="btn btn-info btn-md" type="submit">Daftar</button>
                  </div>
                </form>
                <!-- Default form login -->

              </div>

            </div>
            <!--/.Card : Dynamic content wrapper-->

          </div>
          <!--Grid column-->

        </div>
		<!--Grid row-->
		<?php }?>

      </section>
      <!--Section: Post-->

    </div>
	<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
		<path fill="#FFC107" fill-opacity="1"
		d="M0,256L48,229.3C96,203,192,149,288,154.7C384,160,480,224,576,218.7C672,213,768,139,864,128C960,117,1056,171,1152,197.3C1248,224,1344,224,1392,224L1440,224L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
		</path>
	</svg>
</main>
