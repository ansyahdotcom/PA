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
      <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>

    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title float-left">Tabel <?= $tittle; ?></h3>
              <button type="button" class="btn btn-primary text-bold float-right" data-toggle="modal" data-target="#modal-tambah"><i class="fas fa-plus-circle"></i> <?= $tittle; ?></button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr class="text-center">
                    <th>No</th>
                    <!-- <th>Id</th> -->
                    <th>Nama Kelas</th>
                    <th>Link Kelas</th>
                    <th>Harga</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1; ?>
                  <?php foreach ($kelas as $k) :
                    $id = $k['ID_KLS'];
                    $namakls = $k['TITTLE'];
                    $link = $k['PERMALINK'];
                    $harga = $k['PRICE'];
                    $kategori = $k['KTGKLS'];
                    $status = $k['STAT'];
                    $jmldis = $k['DISKON'];
                  ?>
                    <tr>
                      <td class="text-center"><?= $no; ?></td>
                      <!-- <td><?= $id; ?></td> -->
                      <td><?= $namakls; ?></td>
                      <td class="text-center">
                        <a href="<?= $link; ?>" class="btn btn-primary btn-sm text-bold">Akses Kelas</a>
                      </td>
                      <td>Rp. <?= number_format($harga, 0, ".", "."); ?></td>
                      <!-- <td><span class="badge-pill bg-warning text-bold"><?= $kategori; ?></span></td> -->
                      <td class="text-center">
                        <?php if ($status == 0) { ?>
                          <span class="badge-pill bg-dark"><b>Drafted</b></span>
                        <?php } elseif ($status == 1) { ?>
                          <span class="badge-pill bg-success"><b>Published</b></span>
                        <?php } ?>
                      </td>
                      <td class="text-center">
                        <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-detail<?= $id; ?>"><i class="fas fa-edit"></i> <b>Detail</b></button>
                        <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-hapus<?= $id; ?>"><i class="fas fa-trash"></i> <b>Hapus</b></button>
                        <?php if ($status == 1) { ?>
                          <button class="btn btn-sm btn-dark" data-toggle="modal" data-target="#modal-blok<?= $id; ?>"><i class="fas fa-save"></i> <b>Draft</b></button>
                        <?php } elseif ($status == 0) { ?>
                          <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-unblok<?= $id; ?>"><i class="fas fa-arrow-circle-up"></i> <b>Publish</b></button>
                        <?php } ?>
                      </td>
                    </tr>
                    <?php $no++; ?>
                  <?php endforeach; ?>
                </tbody>
                <tfoot>
                  <tr class="text-center">
                    <th>No</th>
                    <!-- <th>Id</th> -->
                    <th>Nama Kelas</th>
                    <th>Link Kelas</th>
                    <th>Harga</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Modal tambah Data -->
  <div class="modal fade" id="modal-tambah">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah <?= $tittle; ?></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="<?= base_url('admin/kelas/saveall'); ?>" class="form-saveall" enctype="multipart/form-data">
          <!-- <?= form_open_multipart('admin/kelas/saveall', ['class' => 'form-saveall valid']); ?> -->
          <div class="card-body">
            <table id="example1" class="table table-sm table-bordered table-striped">
              <thead>
                <tr class="text-center">
                  <th>Nama Kelas</th>
                  <!-- <th>Gambar</th> -->
                  <th>Link Kelas</th>
                  <th>Kategori Kelas</th>
                  <th>Harga</th>
                  <th>Diskon</th>
                  <th>Deskripsi</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody class="add-form">
                <tr class="text-center">
                  <td>
                    <input type="text" class="form-control" name="nama[]" required>
                    <?= form_error('nama[]', '<small class="text-danger">', '</small>'); ?>
                  </td>
                  <!-- <td>
                      <input type="file" class="form-control" name="gbr[]">
                    </td> -->
                  <td>
                    <input type="text" class="form-control" name="link[]" required>
                    <?= form_error('link[]', '<small class="text-danger pl-3">', '</small>'); ?>
                  </td>
                  <td>
                    <select name="ktg[]" id="ktg" class="custom-select slct-ktg">

                    </select>
                  </td>
                  <td>
                    <input type="number" class="form-control" name="hrg[]" required>
                    <?= form_error('hrg[]', '<small class="text-danger pl-3">', '</small>'); ?>
                  </td>
                  <td>
                    <select name="disc[]" id="disc" class="custom-select slct-diskon">

                    </select>
                  </td>
                  <td>
                    <textarea class="form-control" name="deskripsi[]" required></textarea>
                  </td>
                  <td>
                    <button type="button" class="btn btn-primary btn-sm btn-plusfrm text-bold"><i class="fas fa-plus"></i> Form</button>
                  </td>
                </tr>
              </tbody>
              <tfoot>
                <tr class="text-center">
                  <th>Nama Kelas</th>
                  <!-- <th>Gambar</th> -->
                  <th>Link Kelas</th>
                  <th>Kategori Kelas</th>
                  <th>Harga</th>
                  <th>Diskon</th>
                  <th>Deskripsi</th>
                  <th>Aksi</th>
                </tr>
              </tfoot>
            </table>
          </div>
          <div class="modal-footer justify-content-right">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-arrow-circle-left"></i> Tutup</button>
            <button type="submit" class="btn btn-primary btn-saveall"><i class="fas fa-save"></i> Simpan</button>
          </div>
        </form>
        <!-- <?= form_close(); ?> -->
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->


  <?php foreach ($kelas as $k) :
    $id = $k['ID_KLS'];
    $namakls = $k['TITTLE'];
    $link = $k['PERMALINK'];
    $harga = $k['PRICE'];
    $kategori = $k['KTGKLS'];
    $status = $k['STAT'];
    $deskripsi = $k['DESKRIPSI'];
    $diskon = $k['NM_DISKON'];
    $date = $k['DATE_KLS'];
    $last = $k['UPDATE_KLS'];
    $gambar = $k['GBR_KLS'];
    $jmldis = $k['DISKON'];
    $iddis = $k['ID_DISKON'];
    $id_adm = $k['NM_ADM'];
  ?>

    <!-- Modal Detail Data -->
    <div class="modal fade" id="modal-detail<?= $id; ?>">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title tittlekls">Detail <?= $tittle; ?></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="POST" action="<?= base_url('admin/kelas/editkls'); ?>" class="form-editkls valid" enctype="multipart/form-data">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-6">
                  <div class="float-left">
                    <img class="img-fluid img-thumbnail" src="<?= base_url(); ?>assets/dist/img/kelas/<?= $k['GBR_KLS']; ?>" alt="User profile picture" width="300px">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="harga">Status Kelas: </label>
                    <?php if ($status == 0) : ?>
                      <span class="badge-pill bg-dark text-bold btn-block text-center"> Drafted</span>
                    <?php else : ?>
                      <span class="badge-pill bg-success text-bold btn-block text-center"> Published</span>
                    <?php endif; ?>

                    <label for="harga">Diskon Kelas: </label>
                    <?php if ($iddis == 0) : ?>
                      <span class="badge-pill bg-secondary text-bold btn-block text-center">Tidak Ada Diskon</span>
                    <?php else : ?>
                      <span class="badge-pill bg-info text-bold btn-block text-center"><?= $diskon; ?> (<?= $jmldis * 100; ?>%)</span>
                    <?php endif; ?>

                    <label for="harga">Kategori Kelas: </label>
                    <span class="badge-pill bg-warning text-bold btn-block text-center"><?= $kategori; ?></span>

                    <label for="harga">Disusun oleh: </label>
                    <span class="badge-pill bg-gray text-bold btn-block text-center"><?= $id_adm; ?></span>

                    <label for="harga">Link Kelas: </label>
                    <a href="<?= $link; ?>" class="btn btn-primary btn-block text-bold">Akses Kelas</a>
                  </div>
                </div>
              </div>
              <hr>
              <div class="row">
                <input type="text" class="form-control text-bold" id="idkls" name="id" value="<?= $id; ?>" hidden>
                <div class="col-md-6 row-idkls">
                  <div class="form-group">
                    <label for="id">Id</label>
                    <input type="text" class="form-control text-bold" id="id" value="<?= $id; ?>" disabled>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="namakls">Nama Kelas</label>
                    <input type="text" class="form-control text-bold" id="inkls" name="namakls" placeholder="Nama Kelas" value="<?= $namakls; ?>" disabled required>
                    <?= form_error('namakls', '<small class="text-danger">', '</small>'); ?>
                  </div>
                </div>
                <div class="col-md-6 row-ktgkls" hidden>
                  <div class="form-group">
                    <label for="namakls">Kategori Kelas</label>
                    <select name="ktg" id="inkls" class="custom-select slct-ktg text-bold">

                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="number" class="form-control text-bold" id="inkls" name="harga" placeholder="harga" value="<?= $harga; ?>" disabled required>
                    <?= form_error('harga', '<small class="text-danger">', '</small>'); ?>
                  </div>
                </div>
                <div class="col-md-6 row-hrgdiskon">
                  <div class="form-group">
                    <label for="harga">Harga Diskon</label>
                    <input type="number" class="form-control text-bold text-success" id="inkls" name="harga" placeholder="harga" value="<?= $harga - ($harga * $jmldis); ?>" disabled required>
                    <?= form_error('harga', '<small class="text-danger">', '</small>'); ?>
                  </div>
                </div>
                <div class="col-md-6 row-diskon" hidden>
                  <div class="form-group">
                    <label for="diskon">Diskon</label>
                    <select name="diskon" id="inkls" class="custom-select slct-diskon text-bold" disabled>

                    </select>
                  </div>
                </div>
              </div>
              <div class="row edit-gbrkls" hidden>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="hp">Link Kelas</label>
                    <input type="text" class="form-control text-bold" id="inkls" name="link" placeholder="link" value="<?= $link; ?>" required>
                    <?= form_error('link', '<small class="text-danger">', '</small>'); ?>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="email">Edit Gambar</label>
                    <div class="input-group mb-3">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="gbrkls" name="gbrkls" value="<?= $gambar; ?>" aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label" for="gbrkls">Pilih file...</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="email">Deskripsi</label>
                    <textarea type="text" class="form-control text-bold" id="inkls" name="deskripsi" disabled required><?= $deskripsi; ?></textarea>
                    <?= form_error('deskripsi', '<small class="text-danger">', '</small>'); ?>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <?php if ($date == 0) : ?>
                    <b>Dibuat pada tanggal:</b> <span class="badge-pill bg-secondary text-bold">--</span>
                  <?php else : ?>
                    <b>Dibuat pada tanggal:</b> <span class="badge-pill bg-primary text-bold"><?= date('d F Y', $date); ?></span>
                  <?php endif; ?>
                </div>
                <div class="col-md-6">
                  <?php if ($last == 0) : ?>
                    <b>Terakhir diupdate tanggal:</b> <span class="badge-pill bg-secondary text-bold">--</span>
                  <?php else : ?>
                    <b>Terakhir diupdate tanggal:</b> <span class="badge-pill bg-warning text-bold"><?= date('d F Y', $last); ?></span>
                  <?php endif; ?>
                </div>
              </div>
            </div>
            <div class="modal-footer justify-content-right">
              <button type="button" class="btn btn-danger" id="cancel-kls" data-dismiss="modal"><i class="fas fa-arrow-circle-left"></i> Tutup</button>
              <button type="button" class="btn btn-primary" id="edit-kls"><i class="fas fa-edit"></i> Edit</button>
              <button type="submit" class="btn btn-primary" id="save-kls" hidden><i class="fas fa-save"></i> Simpan</button>
            </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <!-- Modal Hapus Data -->
    <div class="modal fade" id="modal-hapus<?= $id; ?>">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Hapus <?= $tittle; ?></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="<?= base_url('admin/kelas/hapuskls'); ?>" method="POST">
            <div class="modal-body">
              <p>Apakah anda yakin ingin menghapus data dari <b><?= $namakls; ?></b>?</p>
              <input type="hidden" name="id" value="<?= $id; ?>">
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
              <button type="submit" class="btn btn-danger">Ya</button>
            </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <!-- Modal Draft Data -->
    <div class="modal fade" id="modal-blok<?= $id; ?>">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Draft <?= $tittle; ?></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="<?= base_url('admin/kelas/draftkls'); ?>" method="POST">
            <div class="modal-body">
              <p>Apakah anda yakin ingin mendraft data kelas <b><?= $namakls; ?></b>?</p>
              <input type="hidden" name="id" value="<?= $id; ?>">
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
              <button type="submit" class="btn btn-danger">Ya</button>
            </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <!-- Modal Unblok Data -->
    <div class="modal fade" id="modal-unblok<?= $id; ?>">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Publish <?= $tittle; ?></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="<?= base_url('admin/kelas/publishkls'); ?>" method="POST">
            <div class="modal-body">
              <p>Apakah anda yakin ingin mempublish data <b><?= $namakls; ?></b>?</p>
              <input type="hidden" name="id" value="<?= $id; ?>">
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
              <button type="submit" class="btn btn-danger">Ya</button>
            </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
  <?php endforeach; ?>