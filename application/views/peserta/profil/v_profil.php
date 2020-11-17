<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active"></li>
          </ol>
        </div>
      </div>
      <div class="flash-data" data-flashdata=""</div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile" id="img">
              <div class="text-center">
                <!-- <img class="profile-user-img img-circle" src="<?= base_url(); ?>assets//dist/img/admin/<?= $peserta['FTO_PS']; ?>" alt="User profile picture"> -->
                <img class="img-fluid img-thumbnail" src="" alt="User profile picture">
              </div>

              <h3 class="profile-username text-center text-bold"></h3>
              

              <ul class="list-group mb-3">
                <li class="list-group-item">
                  <b>Hak akses</b> <span class="badge-pill bg-danger text-bold float-right"></span>
                </li>
                <li class="list-group-item">
                  <b>Terdaftar</b> <span class="badge-pill bg-primary text-bold float-right"></span>
                </li>
              </ul>
              <!-- <button type="button" class="btn btn-primary btn-block" id="btn-ubhgbr"><i class="fas fa-images"></i> Ubah Gambar</button> -->
            </div>

            <div class="card-body box-profil" id="imgedit" hidden>
              
                <div class="form-group">
                  <div class="form-group text-center" style="position: relative;">
                    <span class="img-div">
                      <div class="text-center img-placeholder" onClick="triggerClick()">
                        <h3 class="profile-username text-center text-bold">Edit Foto Profil</h3>
                        <label class="sm-0 text-primary"><small>(Klik gambar di bawah untuk mengganti)</small></label>
                      </div>
                      <div>
                        <img src="" onClick="triggerClick()" id="profileDisplay" width="200px">
                      </div>
                    </span>
                    <input type="file" name="image" value="" onChange="displayImage(this)" id="profileImage" class="form-control" style="display: none;">
                    <?= form_error('image', '<small class="text-danger pl-3">', '</small>'); ?>
                    <label class="text-bold text-gray">Foto Profil</label>
                    <div>
                      <small class="text-danger text-bold">(Ukuran file gambar max 2 mb.)</small>
                    </div>
                  </div>
                </div>
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
                  <!-- <form class="form-horizontal" action="<?= base_url('admin/profile'); ?>" method="POST"> -->
                    <div class="form-group row">
                      <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                      <div class="input-group mb-1 col-sm-10">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" id="nm" name="nama" placeholder="Nama Lengkap" value="" disabled>
                      </div>
                      <div class="offset-sm-2">
                        
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="email" class="col-sm-2 col-form-label">Email</label>
                      <div class="input-group mb-1 col-sm-10">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        </div>
                        <input type="email" class="form-control" id="em" name="email" placeholder="Email" value="" disabled>
                      </div>
                      <div class="offset-sm-2">
                        
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="hp" class="col-sm-2 col-form-label">No Handphone</label>
                      <div class="input-group mb-1 col-sm-10">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-phone"></i></span>
                        </div>
                        <input type="number" class="form-control" id="hp" name="hp" placeholder="No Handphone" value="" disabled>
                      </div>
                      <div class="offset-sm-2">
                        
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="alamat" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                      <div class="input-group mb-1 col-sm-10">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-venus-mars"></i></span>
                        </div>
                        <input type="text" class="form-control" id="jk" name="jeniskelamin" value="" disabled>
                      </div>
                      <div class="offset-sm-2">
                        
                      </div>
                    <div class="form-group row">
                      <label for="alamat" class="col-sm-2 col-form-label">Pekerjaan</label>
                      <div class="input-group mb-1 col-sm-10">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-user-tie"></i></span>
                        </div>
                        <input type="text" class="form-control" id="pekerjaan" name="perkerjaan" value="" disabled>
                      </div>
                      <div class="offset-sm-2">
                        
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="alamat" class="col-sm-2 col-form-label">Agama</label>
                      <div class="input-group mb-1 col-sm-10">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-praying-hands"></i></span>
                        </div>
                        <input type="text" class="form-control" id="agama" name="agama" value=">" disabled>
                      </div>
                      <div class="offset-sm-2">
                        
                    </div>
                    <div class="form-group row">
                      <label for="alamat" class="col-sm-2 col-form-label">Kota Asal</label>
                      <div class="input-group mb-1 col-sm-10">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-city"></i></span>
                        </div>
                        <input type="text" class="form-control" id="kota" name="kotaasal" value="" disabled>
                      </div>
                      <div class="offset-sm-2">
                        
                    </div>
                    <div class="form-group row">
                      <div class="offset-sm-2 col-sm-10">
                        <button type="button" class="btn btn-default" id="btn-cancel" hidden><i class="fas fa-arrow-alt-circle-left"></i> Batal</button>
                        <button type="submit" class="btn btn-primary" id="btn-save" hidden><i class="fas fa-save"></i> Simpan</button>
                        <button type="button" class="btn btn-primary" id="btn-edit"><i class="fas fa-edit"></i> Edit</button>
                      </div>
                    </div>
                  <?= form_close() ?>
                </div>

                <!-- Ubah Password -->
                <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">
                  <form class="form-horizontal" action="<?= base_url('admin/profile/editpsw'); ?>" method="POST">
                    <div class="form-group row">
                      <label for="pswlma" class="col-sm-3 col-form-label">Password Sekarang</label>
                      <div class="input-group mb-1 col-sm-9">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        </div>
                        <input type="password" class="form-control" id="pswlma" name="pswlma" placeholder="Password Sekarang">
                      </div>
                      <div class="offset-sm-3">
                        <?= form_error('pswlma', '<small class="text-danger">', '</small>'); ?>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="pswbru" class="col-sm-3 col-form-label">Password Baru</label>
                      <div class="input-group mb-1 col-sm-9">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        </div>
                        <input type="password" class="form-control" id="pswbru" name="pswbru" placeholder="Password Baru">
                      </div>
                      <div class="offset-sm-3">
                        <?= form_error('pswbru', '<small class="text-danger">', '</small>'); ?>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="pswbru1" class="col-sm-3 col-form-label">Ulangi Password Baru</label>
                      <div class="input-group mb-1 col-sm-9">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        </div>
                        <input type="password" class="form-control" id="pswbru1" name="pswbru1" placeholder="Ulangi Password Baru">
                      </div>
                      <div class="offset-sm-3">
                        <?= form_error('pswbru1', '<small class="text-danger">', '</small>'); ?>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="offset-sm-3 col-sm-9">
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