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
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Detail Kelas</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="row">
                            <?php if ($cekmyclass == null) : ?>
                                <!-- Kelas yang dipilih -->
                                <div class="col-md">
                                    <div class="card-body text-center mt-4">
                                        <img src="<?= base_url('assets/icon/noClass.svg'); ?>" alt="" class="img-rounded img-responsive img-fluid" width="400">
                                    </div>
                                    <div class="card-body pt-0 mt-4">
                                        <h3 class="text-center text-bold text-muted">Belum ada kelas yang di pilih...</h3>
                                    </div>
                                    <div class="card-body text-center mb-4">
                                        <a href="<?= base_url('peserta/kelas'); ?>" class="btn btn-outline-primary text-dark"><i class="fas fa-arrow-circle-left"></i> Pilih kelas anda</a>
                                    </div>
                                </div>
                            <?php else : ?>
                                <!-- Kelas yang dipilih -->
                                <div class="col-md-6">
                                    <div class="card-body pt-0 mt-4">
                                        <div class="text-center mb-4">
                                            <img src="<?= base_url('assets/dist/img/kelas/' . $myclass['GBR_KLS']); ?>" alt="" class="img-rounded img-responsive img-fluid shadow-lg" width="400">
                                        </div>
                                        <div class="">
                                            <h4 class="text-bold"><b><?= $myclass['TITTLE']; ?></b></h4>
                                            <h5 class="text-muted"> <?= $myclass['DESKRIPSI']; ?></h5>
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
                                            <span class="btn <?= $class; ?> btn-block shadow">
                                                <i class="fas fa-lg fa-arrow-circle-up"></i>
                                                <span class="text-bold">
                                                    Level:
                                                </span> <?= $myclass['KTGKLS']; ?>
                                            </span>
                                            <a href="<?= $myclass['PERMALINK']; ?>" type="submit" class="btn btn-primary btn-block text-bold">Akses Kelas</a>
                                        </div>
                                    </div>
                                </div>

                                <!-- <div class="border border-right"></div> -->

                                <!-- ALur kelas -->
                                <div class="col-md-6">
                                    <div class="card-body pt-0 mt-4">
                                        <h4 class="text-bold"><b>Alur Belajar Kelas</b></h4>
                                        <!-- Timelime example  -->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <!-- The time line -->
                                                <div class="timeline">
                                                    <!-- timeline time label -->
                                                    <div class="time-label">
                                                        <span class="bg-red">10 Feb. 2014</span>
                                                    </div>
                                                    <!-- /.timeline-label -->
                                                    <!-- timeline item -->
                                                    <div>
                                                        <i class="fas fa-envelope bg-blue"></i>
                                                        <div class="timeline-item">
                                                            <span class="time"><i class="fas fa-clock"></i> 12:05</span>
                                                            <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                                                            <div class="timeline-body">
                                                                Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                                                                weebly ning heekya handango imeem plugg dopplr jibjab, movity
                                                                jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                                                                quora plaxo ideeli hulu weebly balihoo...
                                                            </div>
                                                            <div class="timeline-footer">
                                                                <a class="btn btn-primary btn-sm">Read more</a>
                                                                <a class="btn btn-danger btn-sm">Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- END timeline item -->
                                                    <!-- timeline item -->
                                                    <div>
                                                        <i class="fas fa-user bg-green"></i>
                                                        <div class="timeline-item">
                                                            <span class="time"><i class="fas fa-clock"></i> 5 mins ago</span>
                                                            <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request</h3>
                                                        </div>
                                                    </div>
                                                    <!-- END timeline item -->
                                                    <!-- timeline item -->
                                                    <div>
                                                        <i class="fas fa-comments bg-yellow"></i>
                                                        <div class="timeline-item">
                                                            <span class="time"><i class="fas fa-clock"></i> 27 mins ago</span>
                                                            <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>
                                                            <div class="timeline-body">
                                                                Take me to your leader!
                                                                Switzerland is small and neutral!
                                                                We are more like Germany, ambitious and misunderstood!
                                                            </div>
                                                            <div class="timeline-footer">
                                                                <a class="btn btn-warning btn-sm">View comment</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- END timeline item -->
                                                    <div>
                                                        <i class="fas fa-clock bg-gray"></i>
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