<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><?= $tittle; ?></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active"><?= $tittle; ?></li>
          </ol>
        </div>
      </div>
      <?= $this->session->flashdata('message'); ?>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <img class="profile-user-img img-fluid img-circle" src="<?= base_url(); ?>assets//dist/img/<?= $admin['FTO_ADM']; ?>" alt="User profile picture">
              </div>

              <h3 class="profile-username text-center"><?= $admin['NM_ADM']; ?></h3>
              <?php
              if ($admin['ID_ROLE'] == 1) {
                $role = "ADMIN";
              }

              if ($admin['DATE_CREATE'] == 0) {
                $tgl = "--";
              }
              ?>

              <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                  <b>Hak akses</b> <span class="badge-pill bg-danger text-bold float-right"><?= $role ?></span>
                </li>
                <li class="list-group-item">
                  <b>Terdaftar</b> <span class="badge-pill bg-primary text-bold float-right"><?= $tgl ?></span>
                </li>
              </ul>

              <button class="btn btn-primary btn-block btn-file"><i class="fas fa-images"></i> <b>Ubah Foto Profil</b></button>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->

        <div class="col-md-9">
          <div class="card card-primary card-outline card-outline-tabs">
            <div class="card-header p-0 border-bottom-0">
              <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active tittle" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Profil</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill" href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">Ubah Password</a>
                </li>
              </ul>
            </div>
            <div class="card-body">
              <div class="tab-content" id="custom-tabs-four-tabContent">
                <!-- Profil -->
                <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                  <form class="form-horizontal" action="<?= base_url('admin/profile'); ?>" method="POST">
                    <div class="form-group row">
                      <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control text-capitalize" id="nm" name="nama" placeholder="Name" value="<?= $admin['NM_ADM']; ?>" disabled>
                        <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="email" class="col-sm-2 col-form-label">Email</label>
                      <div class="col-sm-10">
                        <input type="email" class="form-control" id="em" name="email" placeholder="Email" value="<?= $admin['EMAIL_ADM']; ?>" disabled>
                        <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="hp" class="col-sm-2 col-form-label">No Handphone</label>
                      <div class="col-sm-10">
                        <input type="number" class="form-control" id="hp" name="hp" placeholder="No Handphone" value="<?= $admin['HP_ADM']; ?>" disabled>
                        <?= form_error('hp', '<small class="text-danger">', '</small>'); ?>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="Alamat" class="col-sm-2 col-form-label">Alamat</label>
                      <div class="col-sm-10">
                        <textarea class="form-control" id="almt" name="alamat" placeholder="Alamat" disabled><?= $admin['ALMT_ADM']; ?></textarea>
                        <?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="offset-sm-2 col-sm-10">
                        <button type="button" class="btn btn-default" id="btn-cancel" hidden><i class="fas fa-arrow-alt-circle-left"></i> Batal</button>
                        <button type="submit" class="btn btn-primary" id="btn-save" hidden><i class="fas fa-save"></i> Simpan</button>
                        <button type="button" class="btn btn-primary" id="btn-edit"><i class="fas fa-edit"></i> Edit</button>
                      </div>
                    </div>
                  </form>
                </div>

                <!-- Ubah Password -->
                <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">
                  <form class="form-horizontal">
                    <div class="form-group row">
                      <label for="pswlma" class="col-sm-2 col-form-label">Password Lama</label>
                      <div class="col-sm-10">
                        <input type="password" class="form-control" id="pswlma" name="pswlma" placeholder="Password Lama">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="pswbru" class="col-sm-2 col-form-label">Password Baru</label>
                      <div class="col-sm-10">
                        <input type="password" class="form-control" id="pswbru" name="pswbru" placeholder="Password Baru">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="pswbru1" class="col-sm-2 col-form-label">Konfirmasi</label>
                      <div class="col-sm-10">
                        <input type="password" class="form-control" id="pswbru1" name="pswbru1" placeholder="Konfirmasi Password Baru">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="offset-sm-2 col-sm-10">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
      <!-- /.row -->
      </><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->