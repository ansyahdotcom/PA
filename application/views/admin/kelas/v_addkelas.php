<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Form <?= $tittle; ?></h1>
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
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title text-bold">Masukkan Data Kelas Baru</h3>
              <button type="button" class="btn btn-light text-primary float-right text-bold" id="btn-reset"><i class="fas fa-arrow-circle-left"></i> Reset</button>
              <button type="button" class="btn btn-light text-primary float-right mr-2 text-bold" id="btn-newform"><i class="fas fa-plus"></i> Form Baru</button>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <input type="hidden" name="" id="count-form" value="1">
            <form action="<?= base_url('admin/kelas/savekelas'); ?>" method="POST">
              <div class="card-body">
                <div>
                  <h2 class="text-bold text-primary badge-pill bg-warning text-center">Data Ke 1</h2>
                </div>
                <hr>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="namakls">Nama Kelas</label>
                      <input type="text" class="form-control" id="namakls" name="namakls[]" placeholder="Nama kelas">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="link">Link Kelas</label>
                      <input type=text class="form-control" id="link" name="link[]" placeholder="Link kelas">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="harga">Harga Kelas</label>
                      <input type="text" class="form-control" id="harga" name="harga[]" placeholder="Harga kelas">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="diskon">Diskon</label>
                      <input type="text" class="form-control" id="diskon" name="diskon[]" placeholder="Diskon kelas (jikas ada)">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputFile">Gambar Kelas</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input text-gray" id="exampleInputFile" name="gbrkls[]">
                          <label class="custom-file-label" for="exampleInputFile">Pilih Berkas...</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Kategori</label>
                      <select class="custom-select" id="slct-ktg[]">
                        <option class="text-gray" selected disabled>Kategori kelas...</option>
                        <!-- <?php foreach ($ktg as $k) :
                          $id = $k['ID_KTGKLS'];
                          $ktg = $k['KTGKLS'];
                        ?>
                          <option value="<?= $id; ?>"><?= $ktg; ?></option>
                        <?php endforeach; ?> -->
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Deskripsi</label>
                      <textarea class="form-control" rows="6" cols="12" id="deskripsi" name="deskripsi[]" placeholder="Deskripsi kelas"></textarea>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
              <hr>
              <div id="insert-form"></div>
              <!-- Footer -->
              <div class="card-footer">
                <button type="submit" class="btn btn-primary float-right"><i class="fas fa-save"></i> Simpan</button>
              </div>
            </form>
          </div>
          <!-- /.card -->
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->