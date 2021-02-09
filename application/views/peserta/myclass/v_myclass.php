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
                        <li class="breadcrumb-item"><a href="<?= base_url('peserta/dashboard'); ?>">Home</a></li>
                        <li class="breadcrumb-item active"><?= $tittle; ?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <!-- <div class="card-header">
                            <h3 class="card-title">Detail Kelas</h3>
                        </div> -->
                        <!-- /.card-header -->
                        <div class="row">
                            <?php if ($cekmyclass['STATUS_BELI'] == 0 || $cekmyclass['STATUS_BELI'] == 201) : ?>
                                <!-- Kelas yang dipilih -->
                                <div class="col-md">
                                    <div class="card-body text-center mt-4">
                                        <?php if ($cekmyclass['STATUS_BELI'] == 201) : ?>
                                            <img src="<?= base_url('assets/icon/payment.svg'); ?>" alt="" class="img-rounded img-responsive img-fluid" width="400">
                                        <?php elseif ($cekmyclass['STATUS_BELI'] == 0) : ?>
                                            <img src="<?= base_url('assets/icon/noClass.svg'); ?>" alt="" class="img-rounded img-responsive img-fluid" width="400">
                                        <?php endif; ?>
                                    </div>
                                    <div class="card-body pt-0 mt-4">
                                        <?php if ($cekmyclass['STATUS_BELI'] == 201) : ?>
                                            <h3 class="text-center text-bold text-muted">Selesaikan transaksi pembayaran anda, </br>agar bisa mengakses kelas ini</h3>
                                        <?php elseif ($cekmyclass['STATUS_BELI'] == 0) : ?>
                                            <h3 class="text-center text-bold text-muted">Belum ada kelas yang di pilih...</h3>
                                        <?php endif; ?>
                                    </div>
                                    <div class="card-body text-center mb-4">
                                        <?php if ($cekmyclass['STATUS_BELI'] == 201) : ?>
                                            <a href="<?= base_url('peserta/transaksi'); ?>" class="btn btn-outline-primary"><i class="fas fa-arrow-circle-left"></i> Selesaikan Pembayaran</a>
                                        <?php elseif ($cekmyclass['STATUS_BELI'] == 0) : ?>
                                            <a href="<?= base_url('peserta/kelas'); ?>" class="btn btn-outline-primary"><i class="fas fa-arrow-circle-left"></i> Pilih kelas anda</a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php elseif ($cekmyclass['STATUS_BELI'] == 200) : ?>
                                <!-- Kelas yang dipilih -->
                                <div class="col-md-6">
                                    <div class="card-body pt-0 mt-4">
                                        <div class="text-center mb-4">
                                            <img src="<?= base_url('assets/dist/img/kelas/' . $myclass['GBR_KLS']); ?>" alt="" class="img-rounded img-responsive img-fluid shadow-lg" width="400">
                                        </div>
                                        <div class="">
                                            <h4 class="text-bold"><b><?= $myclass['TITTLE']; ?></b></h4>
                                            <!-- <h5 class="text-muted"> <?= htmlspecialchars_decode($myclass['DESKRIPSI']); ?></h5> -->
                                            <ul class="ml-4 mb-0 fa-ul text-muted">
                                                <?php
                                                if ($myclass['KTGKLS'] === "Dasar") {
                                                    $class = "btn-outline-success";
                                                } elseif ($myclass['KTGKLS'] === "Lanjutan") {
                                                    $class = "btn-outline-warning";
                                                } elseif ($myclass['KTGKLS'] === "Advance") {
                                                    $class = "btn-outline-danger";
                                                }
                                                ?>
                                            </ul>
                                            <!-- <span class="btn <?= $class; ?> btn-block shadow">
                                                <i class="fas fa-lg fa-arrow-circle-up"></i>
                                                <span class="text-bold">
                                                    Level:
                                                </span> <?= $myclass['KTGKLS']; ?>
                                            </span> -->
                                            <?php 
                                                $id = $myclass['ID_KLS'];
                                            ?>
                                            <a href="<?= base_url("peserta/mymateri/materi/" . $id) ?>" class="btn btn-primary btn-block text-bold">Masuk Kelas</a>
                                        </div>
                                    </div>
                                </div>

                                <!-- <div class="border border-right"></div> -->

                                <!-- ALur kelas -->
                                <div class="col-md-6">
                                    <div class="card-body pt-0 mt-4">
                                        <h4 class="text-bold"><b>Apa yang di dapat dari kelas ini?</b></h4>
                                        <!-- Timelime example  -->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <!-- The time line -->
                                                <div class="timeline">
                                                    <!-- timeline time label -->
                                                    <!-- <div class="time-label">
                                                        <span class="bg-red">10 Feb. 2014</span>
                                                    </div> -->
                                                    <!-- /.timeline-label -->
                                                    <!-- timeline item -->
                                                    <div>
                                                        <i class="fas fa-circle-notch bg-primary"></i>
                                                        <div class="timeline-item">
                                                            <div class="callout callout-info">
                                                                <h5 class="text-bold">Kurikulum 1 Semester</h5>

                                                                <p>Kurikulum 1 semester atau setara 6 bulan, dengan teori dan praktek.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <i class="fas fa-circle-notch bg-warning"></i>
                                                        <div class="timeline-item">
                                                            <div class="callout callout-warning">
                                                                <h5 class="text-bold">Materi</h5>

                                                                <p>Terdapat materi dalam kelas ini.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <i class="fas fa-circle-notch bg-primary"></i>
                                                        <div class="timeline-item">
                                                            <div class="callout callout-info">
                                                                <h5 class="text-bold">Tugas</h5>

                                                                <p>Terdapat tugas harian.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <i class="fas fa-circle-notch bg-warning"></i>
                                                        <div class="timeline-item">
                                                            <div class="callout callout-warning">
                                                                <h5 class="text-bold">Proyek</h5>

                                                                <p>Setelah semua materi selesai, anda mendapatkan tugas akhir atau proyek.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                    </div>
                                    <!-- /.timeline -->
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!--/.col (left) -->
        </div>
        <!-- /.row -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
