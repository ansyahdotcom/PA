	<div class="container">
            <div class="row">
                <div class="col-lg-10 col-xl-9 mx-auto">
                    <div class="card card-signin flex-row my-5">
                        <div class="card-img-left d-none d-md-flex">
                        </div>
                        <div class="card-body">
                        <h5 class="card-title text-center">Daftar Akun</h5>
						<form class="form-signin" method="POST" action="<?= base_url('peserta/auth/register'); ?>">
						<?= $this->session->flashdata('message'); ?>
                            <div class="form-label-group">
                            <input type="text" id="inputUserame" class="form-control" placeholder="Username" required autofocus>
                            <label for="inputUserame">Nama Lengkap</label>
                            </div>
							<?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                            <div class="form-label-group">
                            <input type="email" id="email" name="email" class="form-control" placeholder="Email address" required>
                            <label for="inputEmail">Alamat Email</label>
							</div>
							<?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                            <div class="form-label-group">
                            <input type="number" id="nomorwa" name="nomorwa" class="form-control" placeholder="Email address" required>
                            <label for="inputEmail">Nomer WhatsApp</label>
							</div>
							<?= form_error('nomorwa', '<small class="text-danger">', '</small>'); ?>
                            <div class="form-label-group">
                            <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                            <label for="inputPassword">Kata Sandi</label>
                            </div>
                            <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                            <div class="form-label-group">
                            <input type="password" id="password1" name="password1" class="form-control" placeholder="Password" required>
                            <label for="inputConfirmPassword">Konfirmasi Kata Sandi</label>
                            </div>
							<?= form_error('password1', '<small class="text-danger">', '</small>'); ?>
                            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Daftar</button>
                            <a class="d-block text-center mt-2 small" href="<?= base_url('peserta/auth/login'); ?>">Sudah punya akun?</a>
                            <a class="d-block text-center mt-2 small" href="<?= base_url('peserta/auth/lupapsw'); ?>">Lupa kata sandi?</a>
                            <hr class="my-4">
                            <button class="btn btn-lg btn-google btn-block text-uppercase" type="submit"><i class="fab fa-google mr-2"></i> Daftar dengan Google</button>
                            <button class="btn btn-lg btn-facebook btn-block text-uppercase" type="submit"><i class="fab fa-facebook-f mr-2"></i> Daftar dengan Facebook</button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>