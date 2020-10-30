        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-xl-9 mx-auto">
                    <div class="card card-signin flex-row my-5">
                        <div class="card-img-left d-none d-md-flex">
                        </div>
                        <div class="card-body">
                        <h5 class="card-title text-center">Lupa Kata Sandi</h5>
                        <form class="form-signin text-center" action="<?= base_url('peserta/auth/lupapsw'); ?>" method="POST">
                        <?= $this->session->flashdata('message'); ?>
                            <img src="<?=base_url();?>assets/dist/img/forgot.svg" width="150" alt="lupasandi">
                            <small class="text-success">
                                <p>Masukkan Email Anda, Kami akan mengirimkan link untuk mengganti password</p>
                            </small>
                            <div class="form-label-group text-left">
                                <input type="email" id="email" class="form-control" name="email" placeholder="Email address" required>
                                <label for="email">Alamat Email</label>
                                <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Kirim</button>
                            <a class="d-block text-center mt-2 small" href="<?= base_url('peserta/auth/login'); ?>">Sudah punya akun?</a>
                            <a class="d-block text-center mt-2 small" href="<?= base_url('peserta/auth/register'); ?>">Belum punya akun?</a>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>