<!--  ======================= Awalan Area Utama ================================ -->
<main class="site-main">
    <section class="header">
        <div class="container mt-lg-5 mt-md-5 mt-sm-5 py-4">
            <?php foreach ($kelas as $row) { ?>
            <div class="row bg-warning rounded shadow">
                <div class="col-md-6 col-sm-12 mb-4 text-center" data-aos="fade-up">
                    <img src="<?= base_url('assets/dist/img/kelas/') . $row->GBR_KLS; ?>" width="400"
                        class="img-fluid mt-5 ml-5" alt="gambar-kelas">
                </div>
                <div class="col-md-6 col-sm-12 mb-4" data-aos="fade-down">
                    <div class="p-4">
                        <div class="mb-3">
                            <span class="badge bg-primary mr-1 text-light"><?= $row->KTGKLS ?></span>
                        </div>
                        <h3 class="font-roboto"><?= $row->TITTLE; ?></h3>
                        <p class="lead">
                            <span class="mr-1">
                                <del>Rp. <?= number_format($row->PRICE, 0, ".", "."); ?></del>
                            </span>
                            <span class="btn btn-sm btn-info text-bold">
                                <i class="fas fa-wallet"></i>
                                Donasi</span>
                        </p>

                        <p class="lead font-weight-bold">Keterangan</p>
                        <label for="keterangan" class="btn btn-primary">
                            Untuk harga yang dibayarkan kami menggunakan sistem pembayaran berupa Donasi.
                        </label>
                        <small class="text-muted">minimum pembayaran Rp. 10.000</small>
                        <hr>
                        <a href="<?= base_url('register') ?>" class="btn button primary-button float-right"><i
                                class="fas fa-shopping-cart"></i> Beli Kelas</a>
                        <a href="<?= base_url('class'); ?>" class="btn button secondary-button float-left"><i
                                class="fas fa-arrow-left"></i>
                            Kembali</a>

                    </div>
                </div>
            </div>
    </section>

    <hr>

    <!--  ========================= Awalan Deskripsi ==========================  -->
    <section id="faq" class="about-area faq faq-kls mb-5">
        <div class="container">
            <div class="row text-center">
                <div class="col-12">
                    <div class="about-title">
                        <h3 class="title-h1" data-aos="fade-up">Informasi Kelas</h3>
                        <!-- <p class="para text-dark">
                            Deskripsi kelas beserta tanggal kelas.
                        </p> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="deskripsi">
            <div class="row justify-content-center mt-2 mb-2">
                <div class="card border-light shadow col-md-8 mr-1 ml-1" data-aos="fade-right">
                    <div class="card-header">
                        <h5>Deskripsi</h5>
                    </div>
                    <div class="card-body">
                        <p><?= $row->DESKRIPSI; ?>.</p>
                        <p class="card-text">Tanggal Pelaksanaan</p>
                        <p class="font-weight-bold">
                            <?= 'Mulai : ' . date('d F Y', strtotime($row->TGL_MULAI)); ?></p>
                        <p class="font-weight-bold">
                            <?= 'Selesai : ' . date('d F Y', strtotime($row->TGL_SELESAI)); ?>
                        </p>
                    </div>
                </div>
                <div class="card border-light shadow col-md-2 mr-1 ml-1" data-aos="fade-left">
                    <div class="card-header">
                        <h5>Instruktur</h5>
                    </div>
                    <div class="card-body h-100 border-light">
                        <img class="rounded text-center" width="150"
                            src="<?= base_url('assets/dist/img/admin/') . $row->FTO_ADM; ?>" alt="gambar-kelas">
                        <div class="card-body text-center">
                            <h5 class="card-title font-weight-bold"><?= $row->NM_ADM ?></h5>
                        </div>
                        <h6 class="text-center">Coach</h6>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  ========================= Batas Deskripsi ==========================  -->
    <?php } ?>
    </div>


    <!--  ========================= Awalan FAQ ==========================  -->
    <section id="faq" class="about-area faq faq-kls mt-5 mb-5">
        <div class="container" data-aos="fade-up">
            <div class="row text-center">
                <div class="col-12">
                    <div class="about-title">
                        <h3 class="title-h1">FAQ</h3>
                        <p class="para text-dark">
                            Berikut beberapa list pertanyaan yang sering diajukan.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="faq-list">
            <ul>
                <li data-aos="fade-up" data-aos="fade-up" data-aos-delay="100">
                    <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" class="collapse"
                        href="#faq-list-1">Bagaimana cara membeli kelas ini? <i
                            class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                    <div id="faq-list-1" class="collapse show" data-parent=".faq-list">
                        <p>
                            Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet
                            non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor
                            purus non.
                        </p>
                    </div>
                </li>

                <li data-aos="fade-up" data-aos-delay="200">
                    <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-2"
                        class="collapsed">Bagaimana jika terjadi kesalahan pembelian? <i
                            class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                    <div id="faq-list-2" class="collapse" data-parent=".faq-list">
                        <p>
                            Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum
                            velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend
                            donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in
                            cursus turpis massa tincidunt dui.
                        </p>
                    </div>
                </li>

                <li data-aos="fade-up" data-aos-delay="300">
                    <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-3"
                        class="collapsed">Apakah saya bisa membeli kelas lebih dari satu? <i
                            class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                    <div id="faq-list-3" class="collapse" data-parent=".faq-list">
                        <p>
                            Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus
                            pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit.
                            Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis
                            tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
                        </p>
                    </div>
                </li>
            </ul>
        </div>

        </div>
    </section>
    <!--  ========================= Batas FAQ ==========================  -->
</main>