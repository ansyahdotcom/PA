<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1><?= $tittle; ?></h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active"><?= $tittle; ?></li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
		<div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">

					<div class="col-md-12">
						<div class="card card-default">
							<div class="card-header">
								<h3 class="card-title">
									<i class="fas fa-"></i>
									List Kelas
								</h3>

							</div>
							<!-- /.card-header -->
							<div class="card-body">
              <?php if ($kyui == null) : ?>
                <!-- Jika Belum Terdapat data -->
                    <div class="col-md">
                        <div class="card-body text-center mt-4">
                            <img src="<?= base_url('assets/icon/noList.svg'); ?>" alt="noData" class="img-rounded img-responsive img-fluid" width="100">
                        </div>
                        <div class="card-body pt-0 mt-4">
                            <h3 class="text-center text-bold text-muted">Belum terdapat data</h3>
                        </div>
              </div>
              <?php else : ?>
                <?php foreach ($kyui as $ky) : ?>
                  <div class="card bg-purple">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-8">
                          <h1 class="card-title mb-2"><?= $ky->TITTLE; ?></h1>
                          <h4 class="card-text mt-2"><span class="badge badge-warning"><?= $ky->KTGKLS; ?></span></h4>
                        </div>
                        <div class="col-md-4 text-right">
                        <?php 
                          $ID_KLS = 5; ?>
                          <a href="<?= base_url("admin/listpeserta/index/". $ID_KLS); ?>" class="btn btn-dark"> <i class="nav-icon fas fa-user"></i> List Peserta</a>
                          <a href="<?= base_url("admin/materi/materikelas/".$ky->ID_KLS); ?>" class="btn btn-info"><i class="fas fa-book"></i> Materi</a>
                          <!-- <a href="#" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a> -->
                        </div>
                      </div>
                    </div>
                  </div>
                <?php endforeach; ?>
              <?php endif;?>
							</div>
							<!-- /.card-body -->
						</div>
						<!-- /.card -->
					</div>
					<!-- /.col -->
				</div>
			</div>
			<!-- /.row -->
		</div><!-- /.container-fluid -->
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->
