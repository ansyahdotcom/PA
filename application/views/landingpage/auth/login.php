<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-xl-9 mx-auto">
                <div class="card card-signin flex-row my-5">
                    <div class="card-img-left d-none d-md-flex">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-center">Masuk Akun</h5>
                        <?= $this->session->flashdata('message'); ?>
                        <form class="form-signin" method="POST" action="<?= base_url('peserta/auth/login'); ?>">
                            <div class="form-label-group">
                                <label for="inputEmail">Alamat Email</label>
                                <input type="email" id="email" class="form-control" name="email" placeholder="Email" required>
                            </div>

                            <div class="form-label-group mt-3">
                                <label for="inputEmail">Password</label>
                                <input type="password" id="password" class="form-control" name="password" placeholder="Password" required>
                            </div>

                            <div class="mt-3">
                                <button class="btn btn-lg btn-primary btn-block" type="submit">Masuk</button>
                            </div>
                            <a class="d-block text-center mt-2 small" href="<?= base_url('peserta/auth/register'); ?>">Belum punya akun?</a>
                            <a class="d-block text-center mt-2 small" href="forgot.html">Lupa kata sandi?</a>
                            <hr class="my-4">
                            <button class="btn btn-lg btn-google btn-block text-uppercase" type="submit"><i class="fab fa-google mr-2"></i> Daftar dengan Google</button>
                            <button class="btn btn-lg btn-facebook btn-block text-uppercase" type="submit"><i class="fab fa-facebook-f mr-2"></i> Daftar dengan Facebook</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



</body>

</html>