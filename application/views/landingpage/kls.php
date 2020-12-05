<main role="main" class="container">
	<!-- Page Content -->
	<div class="container">
		<div class="row">
            <?php foreach ($kelas as $row) { ?>
			<div class="col-sm-3">
				<div class="card">
                    <img src="<?= base_url('assets/dist/img/kelas/'). $row->GBR_KLS;?>" class="card-img-top" alt="...">
					<div class="card-body">
						<h5 class="card-title"><?= $row->TITTLE; ?></h5>
						<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
						<a href="#" class="btn btn-primary">Go somewhere</a>
					</div>
				</div>
            </div>
            <?php } ?>
        </div>
    </div>
</main>
