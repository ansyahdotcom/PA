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
              
                if ($admin['DATE_CREATE'] == 0 ){
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

              <button class="btn btn-primary btn-block" data-toggle="tab" data-target="#profil"><b>Selengkapnya</b></button>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="card">
            <div class="card-header p-2">
              <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#profil" data-toggle="tab">Profil</a></li>
                <li class="nav-item"><a class="nav-link" href="#edit" data-toggle="tab">Edit Profil</a></li>
                <li class="nav-item"><a class="nav-link" href="#ubahpsw" data-toggle="tab">Ubah Password</a></li>
              </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">
                <div class="active tab-pane" id="profil">
                  <form class="form-horizontal">
                    <div class="form-group row">
                      <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                      <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputName" placeholder="Name">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                      <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputName2" placeholder="Name">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                      <div class="col-sm-10">
                        <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="offset-sm-2 col-sm-10">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-edit"></i> Edit</button>
                      </div>
                    </div>
                  </form>
                </div>
                <!-- /.tab-pane -->

                <div class="tab-pane" id="edit">
                  <form class="form-horizontal">
                    <div class="form-group row">
                      <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                      <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputName" placeholder="Name">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                      <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputName2" placeholder="Name">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                      <div class="col-sm-10">
                        <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="offset-sm-2 col-sm-10">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                      </div>
                    </div>
                  </form>
                </div>
                <!-- /.tab-pane -->

                <div class="tab-pane" id="ubahpsw">
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
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div><!-- /.card-body -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->