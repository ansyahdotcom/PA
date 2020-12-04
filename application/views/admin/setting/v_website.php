<div class="content-wrapper">
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
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
        </div>
    </section>

    <section class="content">
        <div id="main-wrapper">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header bg-primary">
                            <h3 class="card-title">BackUp DB</h3>
                            <!-- <div class="card-tools">
                            </div> -->
                        </div>
                        <div class="card-body text-center">
                            <div class="gambar">
                                <img src="<?= base_url(); ?>assets/dist/img/backup.svg" width="200" alt="halo">
                                <p class="card-text text-sucess mb-5">Backup DB dapat digunakan untuk membuat backup database terkini.</p>
                            </div>
                            <a href="<?= base_url('admin/website/backup_db');?>" class="btn btn-primary"><i class="fas fa-file-download"></i> Backup DB</a>
                        </div>
                        <!-- /.card-body -->
                        <!-- <div class="card-footer">
                            The footer of the card
                        </div> -->
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header bg-primary">
                            <h3 class="card-title">Restore DB</h3>
                            <!-- <div class="card-tools">
                            </div> -->
                        </div>
                        <div class="card-body text-center">
                            <div class="gambar">
                                <img src="<?= base_url(); ?>assets/dist/img/restore.svg" width="200" alt="halo">
                                <p class="card-text text-sucess mt-3 mb-4">Restore DB dapat digunakan meng-upload atau mengganti database.</p>
                                <form action="<?php echo base_url().'admin/website/restore_db'?>" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="file">Upload database (.sql)</label>
                                        <input type="file" name="file" class="form-control-file" id="file">
                                    </div>
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-file-upload"></i> Restore DB</button>
                                </form>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <!-- <div class="card-footer">
                            The footer of the card
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>