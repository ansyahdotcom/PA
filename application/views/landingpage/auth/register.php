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
                            <input type="text" id="nama" name="nama" class="form-control" placeholder="Username" required autofocus>
                            <label for="nama">Nama Lengkap</label>
							<?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-label-group">
                            <input type="email" id="email" name="email" class="form-control" placeholder="Email address" required autofocus>
                            <label for="email">Alamat Email</label>
							<?= form_error('email', '<small class="text-danger">', '</small>'); ?>
							</div>
                            <div class="form-label-group">
                            <input type="number" id="nomorwa" name="nomorwa" class="form-control" placeholder="Email address" required autofocus>
                            <label for="nomorwa">Nomer WhatsApp</label>
							<?= form_error('nomorwa', '<small class="text-danger">', '</small>'); ?>
							</div>
                            <div class="form-label-group">
                            <input type="password" id="password" name="password" class="form-control" placeholder="Password" required autofocus>
                            <label for="password">Kata Sandi</label>
                            <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-label-group">
                            <input type="password" id="password1" name="password1" class="form-control" placeholder="Password" required autofocus>
                            <label for="password1">Konfirmasi Kata Sandi</label>
							<?= form_error('password1', '<small class="text-danger">', '</small>'); ?>
                            </div>
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