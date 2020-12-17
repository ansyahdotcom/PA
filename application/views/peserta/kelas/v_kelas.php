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
                                <input class="form-control" type="text" name="keyword" placeholder="Temukan kelas pilihan anda..." autocomplete="off">
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
                    <?php if ($this->session->userdata('keyword') == null) : ?>

                    <?php else : ?>
                        <?php if ($rows == 0) : ?>
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

                                <div class="card-header text-muted border-bottom-0 bg-primary">
                                    Kelas
                                </div>
                                <div class="position-relative card-body pt-3">
                                    <div class="row">
                                        <div class="col-7">
                                            <h2 class="lead text-bold"><b><?= $kelas; ?></b></h2>
                                            <!-- <p class="text-muted text-sm"><b>Deskripsi: </b> <?= htmlspecialchars_decode($deskripsi); ?> </p> -->
                                            <!-- <ul class="ml-4 mb-0 fa-ul text-muted">
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
                                            </ul> -->
                                        </div>
                                        <div class="col-5 text-center">
                                            <img src="<?= base_url('assets/dist/img/kelas/' . $gambar); ?>" alt="" class="img-responsive img-fluid img-rounded shadow">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="text-right">
                                        <span class="btn btn-sm bg-teal text-bold">
                                            <i class="fas fa-money-check"></i> Rp. <?= number_format($harga, 0, ".", "."); ?>
                                        </span>
                                        <button class="btn btn-sm btn-primary beli" id="<?= $id; ?>" data-toggle="modal" data-target="#cekout<?= $id; ?>">
                                            <i class="fas fa-cart-plus"></i> Beli Kelas
                                        </button>
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
            </div>
            <!-- /.card-footer -->
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php foreach ($kls as $k) :
    $id = $k['ID_KLS'];
    $kelas = $k['TITTLE'];
    $harga = $k['PRICE'];
    $gambar = $k['GBR_KLS'];
    $deskripsi = $k['DESKRIPSI'];
    $ktg = $k['KTGKLS'];
?>
    <!-- Modal Cekout Kelas -->
    <div class="modal fade" id="cekout<?= $id; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Detail Kelas</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="payment-form" method="POST" action="<?= site_url() ?>/peserta/kelas/finish">
                    <div class="modal-body">
                        <input type="hidden" name="result_type" id="result-type" value="">
                        <input type="hidden" name="result_data" id="result-data" value="">

                        <!-- Input untuk menangkap data json -->
                        <input type="hidden" class="id" name="id" id="id">
                        <input type="hidden" class="kelas" name="kelas" id="kelas">
                        <input type="hidden" class="harga" name="harga" id="harga">
                        <!-- End tangkap data json -->
                        
                        <!-- Input kirim data json -->
                        <input type="hidden" name="id_ps" id="id_ps" value="<?= $peserta['ID_PS']; ?>">
                        <input type="hidden" name="nama" id="nama" value="<?= $peserta['NM_PS']; ?>">
                        <input type="hidden" name="hp" id="hp" value="<?= $peserta['HP_PS']; ?>">
                        <input type="hidden" name="email" id="email" value="<?= $peserta['EMAIL_PS']; ?>">
                        <!-- End kirim json -->
                        
                        <h4 class="text-bold"><?= $kelas; ?></h4>
                        <p class="text-muted"><?= htmlspecialchars_decode($deskripsi); ?></p>
                        <p class="text-bold">Harga: </p>
                        <h2 class="text-bold text-success">Rp. <?= number_format($harga, 0, ".", "."); ?></h2>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal" name="continue" id="continue">Lanjut Cekout</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php endforeach; ?>