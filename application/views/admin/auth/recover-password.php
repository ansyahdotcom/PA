<div class="card">
  <div class="card-body login-card-body">
    <div class="login-logo">
      <a href="<?= base_url('admin/auth') ?>">
        <img src="<?= base_url(); ?>assets/dist/img/PA-white.svg" alt="PA Logo" class="brand-image" width="150px" style="opacity: .8">
      </a>
    </div>
    <!-- /.login-logo -->
    <p class="login-box-msg"><b>Masukkan</b> Password Baru Anda!</p>
    <div class="alert alert-success alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<h6 class="tex-center"><b>Email Anda: </b><?= $this->session->userdata('reset_email'); ?></h6>
    </div>
    
    
    <?= $this->session->flashdata('message'); ?>
    <form action="<?= base_url('admin/auth/recoverpsw'); ?>" method="post">
      <div class="input-group mb-3">
        <input type="password" class="form-control" name="password" placeholder="Password baru">
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-lock logos"></span>
          </div>
        </div>
      </div>
      <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
      
      <div class="input-group mb-3">
        <input type="password" class="form-control" name="newpassword" placeholder="Konfirmasi password baru">
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-lock logos"></span>
          </div>
        </div>
      </div>
      <?= form_error('newpassword', '<small class="text-danger">', '</small>'); ?>
      
      <div class="row">
        <div class="col-12 btn-login">
          <button type="submit" class="btn btn-light btn-block">Ubah password</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <p class="mb-1">
      <a href="<?= base_url('admin/auth'); ?>">Batal ubah password?</a>
    </p>
  </div>
  <!-- /.login-card-body -->
</div>
</div>
<!-- /.login-box -->