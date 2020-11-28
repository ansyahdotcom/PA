<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">List Peserta</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard'); ?>">Home</a></li>
                        <li class="breadcrumb-item active">List Peserta</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="card-header">
            <div class="text-right">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modal-tambah">
                    <i class="fas fa-plus"></i> Tambahkan Peserta</button>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Judul Kelas</th>
                                    <th>Nama Peserta</th>
                                    <th>No HP Peserta</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($listpeserta as $lps) {
                                ?>
                                    <tr>
                                        <td class="text-center" width="100px"><?= $no++ ?></td>
                                        <td><?= $lps->TITTLE; ?></td>
                                        <td><?= $lps->NM_PS; ?></td>
                                        <td><?= $lps->HP_PS; ?></td>
                                        <td class="text-center" width="150px">
                                            <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-edit<?= $lps->ID_KLS; ?>"><b><i class="fas fa-edit"></i>
                                                    Edit</b></button>
                                            <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal_hapus<?= $lps->ID_KLS; ?>"><i class="fas fa-trash"></i>
                                                <b>Hapus</b></button>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
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

<?php
foreach ($listpeserta as $lps) {
    $ID_KLS = $lps->ID_KLS;
    $ID_PS = $lps->ID_PS;
?>
    <!-- modal hapus data list peserta -->
    <div class="modal fade" id="modal_hapus<?= $lps->ID_KLS; ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel">Hapus Data</h3>
                </div>
                <form action="<?= base_url('admin/listpeserta/hapus'); ?>" method="post" class="form-horizontal">
                    <div class="modal-body">
                        <p>Apakah Anda yakin ingin menghapus data ini?</p>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="ID_KLS" value="<?= $lps->ID_KLS; ?>">
                        <button class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Batal</button>
                        <button class="btn btn-danger">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal edit list peserta -->
    <div class="modal fade" id="modal-edit<?= $lps->ID_KLS; ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title title-1" id="myModalLabel">Edit List Peserta</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?= base_url('admin/listpeserta/update_peserta'); ?>">
                    <div class="modal-body">
                        <input type="hidden" name="ID_KLS" value="<?php echo $lps->ID_KLS ?>" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="save-btn" class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php } ?>

<!-- Modal tambah list peserta -->
<div class="modal fade" id="modal-tambah" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title title-1" id="myModalLabel">Tambah Peserta</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?= base_url('admin/listpeserta/tambah_peserta'); ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="ID_KLS" name="ID_KLS" value="<?= $ID_KLST; ?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="save-btn" class="btn btn-success">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>