<body style="background-color: #666666;">
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="POST" action="<?= base_url('peserta/auth/login'); ?>">
					<span class="login100-form-title p-b-43">
						DAFTAR AKUN
					</span>
					<?= $this->session->flashdata('message'); ?>
                    <div class="form-group">
						<label for="nm_ps">Nama lengkap</label>
						<input type="text" class="form-control" id="nama" required>
					</div>
					
					
					<div class="form-group">
						<label for="email_ps">Email</label>
						<input type="email" class="form-control" id="email" aria-describedby="emailHelp">
					</div>

                    <div class="form-group">
						<label for="psw_ps">No. WhatsApp</label>
						<input type="number" class="form-control" id="nomor">
					</div>
					
					
					<div class="form-group">
						<label for="psw_ps">Password</label>
						<input type="password" class="form-control" id="password">
					</div>

                    <div class="form-group">
						<label for="psw_ps">Ulangi Password</label>
						<input type="password" class="form-control" id="password1">
					</div>

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
                            <a href="forgot.html" class="txt1">
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