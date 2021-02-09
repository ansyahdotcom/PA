</div>
<main role="main" class="container mt-5">
    <div class="row p-5">
        <div class="col-md-8 blog-main">
            <h3 class="pb-4 mb-4 border-bottom">
                <i class="fas fa-fire-alt text-danger"></i> Artikel Terbaru
            </h3>
            <!--  ======================= Awalan Blog post ============================== -->
            <?php foreach ($blog as $row) : ?>
            <div class="blog-post card mb-4">
                <img class="card-img-top" src="<?= base_url('assets/fotoblog/' . $row->FOTO_POST); ?>"
                    alt="gambar-posting">
                <div class="card-body">
                    <div class="judul">
                        <h3 class="card-title font-weight-bold"><?= str_replace('-', ' ', $row->JUDUL_POST); ?></h3>
                    </div>
                    <hr>
                    <div class="widget d-flex">
                        <p class="mr-2 ml-2"><i class="fas fa-clock text-primary"></i> <?= $row->TGL_POST ?></p>
                        <p class="ml-2 mr-2">
                            <i class="fas fa-comments text-primary"></i> <a
                                href="<?= base_url('blog/detail/' . strtolower($row->JUDUL_POST)); ?>#disqus_thread"></a>
                        </p>
                    </div>
                    <p class="card-text"><?php
                                                $aa = 200;
                                                $konten = htmlspecialchars_decode($row->KONTEN_POST);
                                                $em = str_replace('<em>', '', $konten);
                                                $strong = str_replace('<strong>', '', $em);
                                                $count = strlen($strong);
                                                if ($count > $aa) {
                                                    $char = $strong[$aa - 1];
                                                    while ($char != ' ') {
                                                        $char = $strong[--$aa];
                                                    }
                                                    echo substr($strong, 0, $aa) . ' ...';
                                                } else {
                                                    echo $strong;
                                                }
                                                ?></p>
                </div>
                <div class="card-footer text-muted">
                    <div class="row">
                        <div class="col-sm-1">
                            <img class="rounded-circle" width="50"
                                src="<?= base_url('assets/dist/img/admin/') . $row->FTO_ADM; ?>" alt="foto penyusun">
                        </div>
                        <div class="col-sm-3">
                            <p class="text-dark mt-2 text-center"><?= $row->NM_ADM ?></p>
                        </div>
                        <div class="col-sm-8 text-right">
                            <a href="<?= base_url('blog/detail/' . strtolower($row->JUDUL_POST)); ?>"
                                class="btn btn-primary float right">Read More &rarr;</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
            <!--  ======================= Batas Blog post ============================== -->
        </div>
        <div class="col-md-4 mb-2">
            <div class="card mb-4 border-light shadow">
                <div class="card-header"><i class="fas fa-fire-alt text-danger"></i> Kategori</div>
                <div class="card-body">
                    <?php foreach ($kategori as $ls) { ?>
                    <ul class="unstyle list-group shadow mb-1">
                        <li class="list-group-item para"><i class="fa fa-folder text-info"></i> <a
                                href="<?= base_url('blog/kategori/' . $ls->NM_CT); ?>"><?= $ls->NM_CT; ?></a></li>
                    </ul>
                    <?php } ?>
                </div>
            </div>
            <div class="jumbotron bg-warning mb-3">
                <div class="card-body text-white text-center">
                    <img src="<?= base_url(); ?>assets/dist/img/logo.png" width="130" alt="logo">
                    <h4 class="para mb-2">
                        <strong>
                            <h5 class="text-dark font-weight-bold">Apa itu Preneur Academy</h5>
                        </strong>
                    </h4>
                    <p class="para text-dark mb-2">
                        <strong>
                            merupakan ruang edukasi, ekosistem, dan komunitas wirausaha (E2KWU) yang mendorong
                            pemberdayaan potensi diri untuk memberi manfaat pada lingkungannya melalui kegiatan
                            kewirausahaan yang berkelanjutan.</strong>
                    </p>
                </div>
            </div>
            <div class="card mb-4 border-light shadow">

                <div class="card-header font-weight-bold"><i class="fas fa-newspaper text-info"></i>
                    Berlangganan newsletter?</div>
                <div class="card-body">
                    <form>
                        <label for="defaultFormEmailEx" class="grey-text">Email Anda</label>
                        <input type="email" id="defaultFormLoginEmailEx" class="form-control">

                        <div class="text-center mt-4">
                            <button class="btn btn-info btn-md" type="submit"><i class="fas fa-paper-plane"></i>
                                Daftar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
    <path fill="#FFC107" fill-opacity="1"
        d="M0,256L48,229.3C96,203,192,149,288,154.7C384,160,480,224,576,218.7C672,213,768,139,864,128C960,117,1056,171,1152,197.3C1248,224,1344,224,1392,224L1440,224L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
    </path>
</svg>