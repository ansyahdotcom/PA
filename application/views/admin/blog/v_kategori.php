<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Kategori</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard'); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Kategori</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <?= $this->session->flashdata('message'); ?>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="card-header">
            <div class="text-right">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modal-tambah"><i class="fas fa-plus"></i> Tambah Kategori</button>
            </div>
        </div>
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
                                    <th>ID Kategori</th>
                                    <th>Nama Kategori</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($kategori as $ktg) {
                                ?>
                                    <tr>
                                        <td class="text-center"><?= $no++ ?></td>
                                        <td><?= $ktg->ID_CT; ?></td>
                                        <td><?= $ktg->NM_CT; ?></td>
                                        <td class="text-center">
                                            <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-edit<?= $ktg->ID_CT; ?>"><b><i class="fas fa-edit"></i> Edit</b></button>
                                            <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal_hapus<?= $ktg->ID_CT; ?>"><i class="fas fa-trash"></i> <b>Hapus</b></button>
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
foreach ($kategori as $ktg) {
    $ID_CT = $ktg->ID_CT;
    $ID_CT = $ktg->NM_CT;
?>
    <!-- modal hapus data pendaftaran -->
    <div class="modal fade" id="modal_hapus<?= $ktg->ID_CT; ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel">Hapus Data</h3>
                </div>
                <form action="<?= base_url('admin/kategori/hapus'); ?>" method="post" class="form-horizontal">
                    <div class="modal-body">
                        <p>Apakah Anda yakin ingin menghapus data ini?</p>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="ID_CT" value="<?= $ktg->ID_CT; ?>">
                        <button class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Batal</button>
                        <button class="btn btn-danger">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal edit kategori -->
    <div class="modal fade" id="modal-edit<?= $ktg->ID_CT; ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title title-1" id="myModalLabel">Edit Kategori</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?= base_url('admin/kategori/edit_kategori'); ?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <select name="ID_CT" id="ID_CT" class="form-control">
                                <option disabled>Pilih Kategori</option>
                                <?php foreach ($kategori as $ktg) { ?>
                                    <option value="<?= $ktg->ID_CT; ?>" <?= $ktg->ID_CT ? "selected" : null ?>><?= $ktg->NM_CT; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="save-btn" class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php } ?>

<!-- Modal tambah kategori -->
<div class="modal fade" id="modal-tambah" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title title-1" id="myModalLabel">Tambah Kategori</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?= base_url('admin/kategori/tambah_kategori'); ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="ID_CT" name="ID_CT" value="<?= $ID_CTT; ?>">
                        <input type="text" class="form-control" name="NM_CT" autocomplete="off" autofocus>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="save-btn" class="btn btn-success">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>