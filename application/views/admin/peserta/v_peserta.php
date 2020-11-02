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
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?= $tittle; ?></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr class="text-center">
                    <th>No</th>
                    <th>Id</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1; ?>
                  <?php foreach ($ps as $p) :
                    $id = $p['ID_PS'];
                    $nama = $p['NM_PS'];
                    $email = $p['EMAIL_PS'];
                    $status = $p['ACTIVE'];
                  ?>
                  <tr>
                    <td class="text-center"><?= $no; ?></td>
                    <td><?= $id; ?></td>
                    <td><?= $nama; ?></td>
                    <td><?= $email; ?></td>
                    <td class="text-center">
                      <?php if ($status == 0) {?>
                        <span class="badge-pill bg-danger"><b>Belum Aktivasi</b></span>
                      <?php } else {?>
                        <span class="badge-pill bg-success"><b>Aktif</b></span>
                      <?php } ?>
                    </td>
                    <td class="text-center">
                      <button class="btn btn-sm btn-primary"><b>Detail</b></button>
                      <button class="btn btn-sm btn-danger"><b>Hapus</b></button>
                    </td>
                  </tr>
                  <?php $no++; ?>
                  <?php endforeach; ?>
                </tbody>
                <tfoot>
                  <tr class="text-center">
                    <th>No</th>
                    <th>Id</th>
                    <th>Nama</th>
                    <th>Email</th>
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