<body style="background-color: #666666;">
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="POST" action="<?= base_url('peserta/auth/register'); ?>">
					<span class="login100-form-title p-b-43">
						DAFTAR AKUN
					</span>
            		<?= $this->session->flashdata('message'); ?>

                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="text" name="nama" required>  
						<span class="focus-input100"></span>
						<span class="label-input100">Nama lengkap</span>
					</div>
                    <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
					
					
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                        <input class="input100" type="email" name="email" required>  
						<span class="focus-input100"></span>
						<span class="label-input100">Email</span>
					</div>
                    <?= form_error('email', '<small class="text-danger">', '</small>'); ?>

                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="number" name="nomorwa" required>  
						<span class="focus-input100"></span>
						<span class="label-input100">No. WhatsApp</span>
					</div>
                    <?= form_error('nomorwa', '<small class="text-danger">', '</small>'); ?>
					
					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" id="password" type="password" name="password" required>
						<span class="focus-input100"></span>
						<span class="label-input100">Password</span>
					</div>
                    <?= form_error('password', '<small class="text-danger">', '</small>'); ?>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" id="password1" type="password" name="password1" required>
						<span class="focus-input100"></span>
						<span class="label-input100">Ulangi Password</span>
					</div>
                    <?= form_error('password1', '<small class="text-danger">', '</small>'); ?>

					<div class="flex-sb-m w-full p-t-3 p-b-32">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								Ingat Saya
							</label>
						</div>

                        <div>
							<a href="<?= base_url('peserta/auth/login'); ?>" class="txt1">
								Sudah daftar ?
                            </a>
                            <br>
                            <a href="<?= base_url('peserta/auth/lupapsw'); ?>" class="txt1">
								Lupa password ?
							</a>
                        </div>
                    
					</div>
			

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Daftar
						</button>
					</div>

				</form>

				<div class="login100-more">
				<img src="<?=base_url()?>assets/icon/Sketsa.svg">
				</div>
			</div>
		</div>
	</div>