
    <footer class="footer-area bg-warning">
        <div class="container">
            <div class="">
                <div class="site-logo text-center py-4">
                    <a href="<?= base_url('peserta/auth'); ?>"><img src="<?= base_url(); ?>assets/dist/img/logo.png" width="150" alt="logo"></a>
                </div>
                    <div class="container-fluid text-center text-md-left">
                    <div class="row">
                        <div class="col-md-6 mt-md-0 mt-3">
                        <h5 class="text-uppercase">Alamat</h5>
                        <p>Bengawan Solo Regency Kav 3-4,<br> Jl. Bengawan Solo, Kota Jember<br> 66122</p>
                        </div>
                        <hr class="clearfix w-100 d-md-none pb-3">
                        <div class="col-md-3 mb-md-0 mb-3">
                        <h5 class="text-uppercase">Menu</h5>
                        <ul class="list-unstyled">
                            <li>
                            <a href="<?= base_url();?>">Beranda</a>
                            </li>
                            <li>
                            <a href="#">Kelas</a>
                            </li>
                            <li>
                            <a href="#">Blog</a>
                            </li>
                        </ul>
                        </div>
                        <div class="col-md-3 mb-md-0 mb-3">
                            <img src="<?= base_url(); ?>assets/dist/img/contact.svg" alt="banner-img" class="img-fluid">
                        </div>
                    </div>
                    </div>

                <div class="social text-center">
                    <h6 class="text-uppercase">Ikuti akun sosial media kami</h6>
                    <?php foreach ($data as $row) :
                        $icon = $row['IC_MS'];
                        $link = $row['LINK_MS'];
                    ?>
                    <a href="<?= base_url(); ?><?= $link;?>"><i class="<?= $icon;?>" target="_blank"></i></a>
                    <?php endforeach;?>
                </div>
                <div class="copyrights text-center">
                    <p class="para">
                        Copyright ©<?= date('Y')?> All rights reserved by
                        <a href="<?= base_url(); ?>"><span style="color: var(--primary-color);">Preneur Academy</span></a>
                    </p>
                </div>
            </div>
        </div>
    </footer>


    <!--  Jquery js file  -->
    <script src="<?= base_url(); ?>assets/dist/js/jquery.3.4.1.js"></script>

    <!--  Bootstrap js file  -->
    <script src="<?= base_url(); ?>assets/dist/js/bootstrap.min.js"></script>

    <!--  isotope js library  -->
    <script src="<?= base_url(); ?>assets/dist/js/plugin/isotope/isotope.min.js"></script>

    <!--  Magnific popup script file  -->
    <script src="<?= base_url(); ?>assets/dist/js/plugin/Magnific-Popup/dist/jquery.magnific-popup.min.js"></script>

    <!--  Owl-carousel js file  -->
    <script src="<?= base_url(); ?>assets/dist/js/plugin/owl-carousel/js/owl.carousel.min.js"></script>

    <!--  custom js file  -->
    <script src="<?= base_url(); ?>assets/dist/js/main.js"></script>

    <!--===============================================================================================-->



</body>

</html>