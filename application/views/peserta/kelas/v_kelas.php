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

        <!-- Default box -->
        <div class="card card-solid">
            <div class="card-body pb-0">
    
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <form method="POST" action="<?= base_url('peserta/kelas'); ?>">
                            <div class="input-group mb-3">
                                <input class="form-control" type="text" name="keyword" placeholder="Temukan kelas pilihan anda..." autocomplete="off" autofocus>
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit" name="btn-search">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <?php if($this->session->userdata('keyword') == null) : ?>
                    
                    <?php else : ?>
                        <?php if($rows == 0) : ?>
                            <h5 class="text-bold text-secondary">Hasil pencarian tidak ditemukan</h5>
                        <?php else : ?>
                            <h5 class="text-bold text-secondary">Ditemukan Hasil Pencarian: <?= $rows; ?></h5>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>

                <div class="row d-flex align-items-stretch">
                    <?php foreach ($kls as $k) :
                        $id = $k['ID_KLS'];
                        $kelas = $k['TITTLE'];
                        $harga = $k['PRICE'];
                        $gambar = $k['GBR_KLS'];
                        $deskripsi = $k['DESKRIPSI'];
                        $ktg = $k['KTGKLS'];
                    ?>
                        <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                            <div class="card bg-light">
                                <div class="card-header text-muted border-bottom-0">
                                    Kelas
                                </div>
                                <div class="card-body pt-0">
                                    <div class="row">
                                        <div class="col-7">
                                            <h2 class="lead text-bold"><b><?= $kelas; ?></b></h2>
                                            <p class="text-muted text-sm"><b>Deskripsi: </b> <?= $deskripsi; ?> </p>
                                            <ul class="ml-4 mb-0 fa-ul text-muted">
                                                <?php
                                                if ($ktg === "Dasar") {
                                                    $class = "text-success";
                                                } elseif ($ktg === "Lanjutan") {
                                                    $class = "text-warning";
                                                } elseif ($ktg === "Advance") {
                                                    $class = "text-danger";
                                                }
                                                ?>
                                                <li class="small <?= $class; ?>"><span class="fa-li">
                                                        <i class="fas fa-lg fa-arrow-circle-up"></i></span> <span class="text-bold">Level:</span> <?= $ktg; ?>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-5 text-center">
                                            <img src="<?= base_url('assets/dist/img/kelas/' . $gambar); ?>" alt="" class="img-bordered img-responsive img-fluid">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="text-right">
                                        <span class="btn btn-sm bg-warning text-bold">
                                            <i class="fas fa-money-bill"></i> Rp. <?= number_format($harga, 0, ".", "."); ?>
                                        </span>
                                        <a href="#" class="btn btn-sm btn-primary">
                                            <i class="fas fa-cart-plus"></i> Beli Kelas
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <?= $this->pagination->create_links(); ?>
                <!-- <nav aria-label="Contacts Page Navigation">
                    <ul class="pagination justify-content-center m-0">
                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                        <li class="page-item"><a class="page-link" href="#">6</a></li>
                        <li class="page-item"><a class="page-link" href="#">7</a></li>
                        <li class="page-item"><a class="page-link" href="#">8</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                </nav> -->
            </div>
            <!-- /.card-footer -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->