<h1>Tag : <?= $nm_tags; ?></h1>
<?php foreach ($tag as $tg){
    ?>
<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-9">
				<div class="row">
					<h3 class="">
						<a href="<?= base_url('index/lihat_post/'.$tg->JUDUL_POST); ?>"><?= str_replace('-', ' ', $tg->JUDUL_POST); ?></a>
						
					</h3>
				</div>
				<div class="card-body">
					<div class="">
						<p><i class="fas fa-calendar"></i> <?= $tg->TGL_POST; ?></p>
						<i class="fas fa-folder"></i>
						<a class="text-sm" href=""><?= $tg->NM_CT; ?></a>
						<hr>
						<img style="width: 600px; height: 400px;" class="img-fluid rounded"
							src="<?= base_url('assets/fotoblog/'. $tg->FOTO_POST);?>" alt="foto-post">
					</div>
					<hr>
					<div>
						<?php 
						$i = 400;
						$konten = htmlspecialchars_decode($tg->KONTEN_POST);
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
					<a class="btn btn-primary" href="<?= base_url('index/lihat_post/'. $tg->JUDUL_POST);?>">Lihat
						Post</a>
				</div>
				<!-- /.card -->
			</div>
		</div>
	</div>
</section>
<br><br><br>

<?php } ?>
