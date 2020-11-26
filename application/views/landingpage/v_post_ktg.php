<?php foreach ($kategori as $ktg){
    // echo $ktg->ID_POST;
    // echo $ktg->KONTEN_POST;
    // echo $ktg->TGL_POST;
    // echo $ktg->FOTO_POST; 
    ?>
<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-9">
				<div class="row">
					<h3 class="">
						<a href="<?= base_url('index/lihat_post/'.$ktg->JUDUL_POST); ?>"><?= str_replace('-', ' ', $ktg->JUDUL_POST); ?></a>
						
					</h3>
				</div>
				<div class="card-body">
					<div class="">
						<p><i class="fas fa-calendar"></i> <?= $ktg->TGL_POST; ?></p>
						<i class="fas fa-folder"></i>
						<a class="" href=""><?= $ktg->NM_CT; ?></a>
						<hr>
						<img style="width: 600px; height: 400px;" class="img-fluid rounded"
							src="<?= base_url('assets/fotoblog/'. $ktg->FOTO_POST);?>" alt="foto-post">
					</div>
					<hr>
					<div>
						<?php 
						$i = 400;
						$konten = htmlspecialchars_decode($ktg->KONTEN_POST);
						$kont = str_replace('<p>', '', $konten);
						$KONTEN_POST = str_replace('</p>', '. ', $kont);
						// $konten = htmlspecialchars_decode(substr($KONTEN_POST, 0, $i));

						$char = $KONTEN_POST[$i - 1];
						while($char != ' ') {
							$char = $KONTEN_POST[--$i]; // Cari spasi pada posisi 49, 48, 47, dst...
						}
						echo substr($KONTEN_POST, 0, $i) . ' ...';
						?>
					</div>
					<hr>
					<a class="btn btn-primary" href="<?= base_url('index/lihat_post/'. $ktg->JUDUL_POST);?>">Lihat
						Post</a>
				</div>
				<!-- /.card -->
			</div>
		</div>
	</div>
</section>
<br><br><br>

<?php } ?>
