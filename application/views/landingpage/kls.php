<!--  ======================= Awalan Area Utama ================================ -->
<main class="site-main">
    <section class="bg-warning" id="hero">
        <div class="container mt-lg-5 mt-md-5 mt-sm-5">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6 col-md-12 mt-5 site-title" data-aos="fade-right">
                    <div class="kelas">
                        <h1 class="display-4 title-text font-weight-bold mt-2">
                            Kelas Online
                        </h1>
                        <p class="para font-weight-bold mt-2 mb-5">Terdapat beberapa list kelas online.</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 text-center banner-image mb-2" data-aos="fade-left">
                    <img src="<?= base_url(); ?>assets/dist/img/program/study.svg" width="200" alt="gambar kelas"
                        class="img-fluid" id="animated">
                </div>
            </div>
        </div>
    </section>
    <!--  ======================= Batas Banner =======================  -->

    <!-- Page Content -->
    <div class="container p-5 mt-5 mb-5">
        <div class="row">
            <?php foreach ($kelas as $k) : ?>
            <div class="col-md-3 col-sm-12 mb-5">
                <div class="card h-100 border-light shadow" data-aos="fade-down">
                    <img class="rounded" src="<?= base_url('assets/dist/img/kelas/') . $k->GBR_KLS; ?>"
                        alt="gambar-kelas">
                    <div class="gambar card-img-overlay align-items-center">
                        <span
                            class="float-left badge bg-primary ml-0 font-weight-bold text-light"><?= $k->KTGKLS ?></span>
                        <span class="float-right badge bg-warning font-weight-bold">Rp.
                            <?= number_format($k->PRICE, 0, ".", "."); ?>
                        </span>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold"><?= $k->TITTLE ?></h5>
                    </div>
                    <div class="card-footer align-items-center">
                        <div class="row">
                            <div class="col-sm-3">
                                <img class="rounded-circle" width="50"
                                    src="<?= base_url('assets/dist/img/admin/') . $k->FTO_ADM; ?>" alt="foto penyusun">
                            </div>
                            <div class="col-sm-9">
                                <p class="para text-dark mt-2 text-center"><?= $k->NM_ADM ?></p>
                            </div>
                        </div>
                    </div>
                    <a href="<?= base_url('class-detail/' . $k->PERMALINK); ?>"
                        class="button primary-button font-weight-bold text-uppercase m-2 text-center">Lihat Detail</a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <hr>

    <!--  ========================= Awalan About ==========================  -->

    <section class="about-area p-5 mt-5 mb-5" id="about-area">
        <div class="container">
            <div class="row mt-5">
                <div class="col-lg-6 col-md-12" data-aos="fade-up">
                    <div class="about-image">
                        <img src="<?= base_url(); ?>assets/dist/img/celebration.svg" alt="About us" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 about-title" data-aos="fade-down">
                    <h3 class="text-uppercase font-weight-bold pt-5">
                        <span>Apa Itu</span>
                        <span>Preneur Academy?</span>
                    </h3>
                    <div class="paragraph py-4 w-100">
                        <p class="para">
                            merupakan ruang edukasi, ekosistem, dan komunitas wirausaha (E2KWU) yang mendorong
                            pemberdayaan potensi diri untuk memberi manfaat pada lingkungannya melalui kegiatan
                            kewirausahaan yang berkelanjutan.
                        </p>
                        <p class="para">
                            Preneur Academy dirancang dengan pendekatan <b>training</b>, <b>mentoring</b>,
                            <b>consulting</b>, dan <b>coaching (TM2C)</b>
                            dalam proses pembelajaran.
                        </p>
                    </div>
                    <button type="button" class="btn button primary-button text-uppercase">Tentang Kami</button>
                </div>
            </div>
        </div>
    </section>

    <!--  ========================= Batas About ==========================  -->

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
                        href="#faq-list-1">Apa itu Kelas Online? <i class="bx bx-chevron-down icon-show"></i><i
                            class="bx bx-chevron-up icon-close"></i></a>
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
                        class="collapsed">Bagaimana cara mendaftar kelas online di Preneur Academy? <i
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
                        class="collapsed">Bagaimana dengan sistem pembayaran yang tersedia? <i
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

                <li data-aos="fade-up" data-aos-delay="400">
                    <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-4"
                        class="collapsed">Apa perbedaan kelas online di Preneur Academy dengan kelas online lain? <i
                            class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                    <div id="faq-list-4" class="collapse" data-parent=".faq-list">
                        <p>
                            Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in
                            est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl
                            suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in.
                        </p>
                    </div>
                </li>

                <li data-aos="fade-up" data-aos-delay="500">
                    <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-5"
                        class="collapsed">Apa yang saya dapat jika saya mendaftar kelas online di Preneur Academy? <i
                            class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                    <div id="faq-list-5" class="collapse" data-parent=".faq-list">
                        <p>
                            Laoreet sit amet cursus sit amet dictum sit amet justo. Mauris vitae ultricies leo
                            integer malesuada nunc vel. Tincidunt eget nullam non nisi est sit amet. Turpis nunc
                            eget lorem dolor sed. Ut venenatis tellus in metus vulputate eu scelerisque.
                        </p>
                    </div>
                </li>

            </ul>
        </div>

        </div>
    </section>
    <!--  ========================= Batas FAQ ==========================  -->
</main>