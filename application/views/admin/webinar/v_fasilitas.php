<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Fasilitas</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard'); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Fasilitas</li>
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
                <button class="btn btn-primary" data-toggle="modal" data-target="#modal-tambah"><i class="fas fa-plus"></i> Tambah Fasilitas</button>
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
                                    <th>Nama Fasilitas</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($fasilitas as $fas) {
                                ?>
                                    <tr>
                                        <td class="text-center" width="100px"><?= $no++ ?></td>
                                        <td><?= $fas->NM_FA; ?></td>
                                        <td class="text-center" width="150px">
                                            <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-edit<?= $fas->ID_FA; ?>"><b><i class="fas fa-edit"></i>
                                                    Edit</b></button>
                                            <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal_hapus<?= $fas->ID_FA; ?>"><i class="fas fa-trash"></i>
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
foreach ($fasilitas as $fas) {
    $ID_FA = $fas->ID_FA;
    $NM_FA = $fas->NM_FA;
?>
    <!-- modal hapus data pendaftaran -->
    <div class="modal fade" id="modal_hapus<?= $fas->ID_FA; ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel">Hapus Data</h3>
                </div>
                <form action="<?= base_url('admin/fasilitas/hapus'); ?>" method="post" class="form-horizontal">
                    <div class="modal-body">
                        <p>Apakah Anda yakin ingin menghapus data ini?</p>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="ID_FA" value="<?= $fas->ID_FA; ?>">
                        <button class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Batal</button>
                        <button class="btn btn-danger">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal edit fasilitas-->
    <div class="modal fade" id="modal-edit<?= $fas->ID_FA; ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title title-1" id="myModalLabel">Edit Fasilitas</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?= base_url('admin/fasilitas/update_fasilitas'); ?>">
                    <div class="modal-body">
                        <input type="hidden" readonly name="ID_FA" value="<?php echo $fas->ID_FA ?>" class="form-control">
                        <div class="form-group">
                            <input type="text" name="NM_FA" id="NM_FA" class="form-control" autocomplete="off" value="<?= $fas->NM_FA; ?>">
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

<!-- Modal tambah fasilitas -->
<div class="modal fade" id="modal-tambah" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title title-1" id="myModalLabel">Tambah Fasilitas</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?= base_url('admin/fasilitas/tambah_fasilitas'); ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="ID_FA" name="ID_FA" value="<?= $ID_FAS; ?>">

                        <input required type="text" name="NM_FA" id="NM_FA" class="form-control" placeholder="Masukkan Nama Fasilitas . ." aria-describedby="namakafasilitas" maxlength="100" autocomplete="off">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="save-btn" class="btn btn-success">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>