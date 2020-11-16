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
        <div>
            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tabel <?= $tittle; ?></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Besar Diskon</th>
                                    <th>Nama Diskon</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($dis as $d) :
                                    $id = $d['ID_DISKON'];
                                    $diskon = $d['DISKON'];
                                    $nama = $d['NM_DISKON'];
                                    $status = $d['STATUS'];
                                    $date = $d['DATE_CREATE'];
                                    $last = $d['LAST_UPDATE'];
                                ?>
                                    <tr>
                                        <td class="text-center"><?= $no; ?></td>
                                        <!-- <td><?= $id; ?></td> -->
                                        <td><?= $diskon * 100; ?> %</td>
                                        <td><?= $nama; ?></td>
                                        <td class="text-center">
                                            <?php if ($status == 0) { ?>
                                                <span class="badge-pill bg-danger"><b>Nonaktif</b></span>
                                            <?php } elseif ($status == 1) { ?>
                                                <span class="badge-pill bg-success"><b>Aktif</b></span>
                                            <?php } ?>
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-detail<?= $id; ?>"><i class="fas fa-edit"></i> <b>Detail</b></button>
                                            <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-hapus<?= $id; ?>"><i class="fas fa-trash"></i> <b>Hapus</b></button>
                                            <?php if ($status == 1) { ?>
                                                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-blok<?= $id; ?>"><i class="fas fa-ban"></i> <b>Nonaktifkan</b></button>
                                            <?php } elseif ($status == 0) { ?>
                                                <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-unblok<?= $id; ?>"><i class="fas fa-check"></i> <b>Aktifkan</b></button>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <?php $no++; ?>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Besar Diskon</th>
                                    <th>Nama Diskon</th>
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

<?php foreach ($dis as $d) :
    $id = $d['ID_DISKON'];
    $diskon = $d['DISKON'];
    $nama = $d['NM_DISKON'];
    $status = $d['STATUS'];
    $date = $d['DATE_CREATE'];
    $last = $d['LAST_UPDATE'];
?>

    <!-- Modal Detail Data -->
    <div class="modal fade" id="modal-detail<?= $id; ?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Detail Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form role="form">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="diskon">Besar Diskon</label>
                                    <input type="number" class="form-control text-bold" id="diskon" name="diskon" placeholder="Diskon" value="<?= $diskon * 100; ?>" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="id">Nama Diskon</label>
                                    <input type="text" class="form-control text-bold" id="nama" name="nama" plasceholder="Nama diskon" value="<?= $nama; ?>" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php if ($status == 0) : ?>
                                        <b>Status:</b> <span class="badge-pill bg-danger text-bold text-center btn-block">Nonaktif</span>
                                    <?php elseif ($status == 1) : ?>
                                        <b>Status:</b> <span class="badge-pill bg-success text-bold text-center btn-block">Aktif</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <?php if ($date == 0) : ?>
                                    <b>Dibuat pada tanggal:</b> <span class="badge-pill bg-secondary text-bold btn-block">--</span>
                                <?php else : ?>
                                    <b>Dibuat pada tanggal:</b> <span class="badge-pill bg-primary text-bold btn-block"><?= date('d F Y', $date); ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-4">
                                <?php if ($last == 0) : ?>
                                    <b>Terakhir diupdate tanggal:</b> <span class="badge-pill bg-secondary text-bold btn-block">--</span>
                                <?php else : ?>
                                    <b>Terakhir diupdate tanggal:</b> <span class="badge-pill bg-warning text-bold btn-block"><?= date('d F Y', $last); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-right">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
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
                    <h4 class="modal-title">Hapus Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/peserta/hapus'); ?>" method="POST">
                    <div class="modal-body">
                        <p>Apakah anda yakin ingin menghapus data dari <b><?= $nama; ?></b>?</p>
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

    <!-- Modal Blokir Data -->
    <div class="modal fade" id="modal-blok<?= $id; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Blokir</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/peserta/blok'); ?>" method="POST">
                    <div class="modal-body">
                        <p>Apakah anda yakin ingin memblokir akun <b><?= $nama; ?></b>?</p>
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
                    <h4 class="modal-title">Buka Blokir</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/peserta/unblok'); ?>" method="POST">
                    <div class="modal-body">
                        <p>Apakah anda yakin ingin membuka blokir akun <b><?= $nama; ?></b>?</p>
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