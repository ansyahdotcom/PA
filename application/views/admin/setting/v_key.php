<div class="content-wrapper">
        <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1><?= $tittle?></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active"><?= $tittle?></li>
                </ol>
            </div>
            </div>
            <?= $this->session->flashdata('message'); ?>
        </div>
        </section>

        <section class="content">
        <div class="card">
            <div class="card-header">
            <h3 class="card-title pt-2">Manajemen Kunci API</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAdd">
                <i class="fas fa-plus"></i> Data</button>
            </div>
            </div>
            <div class="card-body">
                    <div class="container">
                        <div class="row">
                                <?php foreach($data as $row):
                                $id = $row['ID_KEY'];
                                $nama = $row['NM_KEY'];
                                $key1 = $row['KEY_1'];
                                $key2 = $row['KEY_2'];
                                $status = $row['STATUS'];
                            ?>
                            <div class="col-md-6">
                                <div class="card">
                                <div class="card-header bg-primary">
                                    <h3 class="card-title pt-2"><?= $nama;?></h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalEditSub">
                                        <i class="fas fa-edit"></i> Edit</button>
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalDelete">
                                        <i class="fas fa-trash-alt"></i> Hapus</button>
                                    </div>
                                </div>
                                    <div class="card-body">
                                            <form role="form">
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="namaKey">Nama Key</label>
                                                        <input type="email" class="form-control" name="nama" id="nama" value="<?= $nama;?>" placeholder="Masukkan Nama">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="key1">Key 1</label>
                                                        <div class="input-group mb-3">
                                                            <input type="password" class="form-control" id="key1" name="key1" value="<?= $key1;?>" placeholder="Key 1">
                                                            <div class="input-group-append">
                                                            <div class="input-group-text">
                                                                <a href="#" class="text-secondary" id="key-click">
                                                                <i class="fas fa-eye" id="icon"></i>
                                                                </a>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="key2">Key 2</label>
                                                        <div class="input-group mb-3">
                                                            <input type="password" class="form-control" id="key2" name="key2" value="<?= $key2;?>" placeholder="Key 2">
                                                            <div class="input-group-append">
                                                            <div class="input-group-text">
                                                                <a href="#" class="text-secondary" id="key-click1">
                                                                <i class="fas fa-eye" id="icon"></i>
                                                                </a>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="status">Status</label>
                                                        <select class="form-control" id="status" name="status">
                                                        <option value="1">Aktif</option>
                                                        <option value="0">Non-Aktif</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </form>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<form action="<?php echo base_url().'admin/key/insert'?>" method="post" enctype="multipart/form-data">
    <div class="modal fade" id="modalAdd" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                <h4 class="modal-title">Tambah Key</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="namaKey">Nama Key</label>
                        <input type="text" name="nama" class="form-control" placeholder="Nama Menu">
                        <?= form_error('nama', '<small class="text-danger col-md">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="key1">Kode Key 1</label>
                        <input type="text" name="key1" class="form-control" placeholder="Nama Menu">
                        <?= form_error('key1', '<small class="text-danger col-md">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="key2">Kode Key 2</label>
                        <input type="text" name="key2" class="form-control" placeholder="Nama Menu">
                        <?= form_error('key2', '<small class="text-danger col-md">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status">
                            <option value="1">Aktif</option>
                            <option value="0">Non-Aktif</option>
                        </select>
                        <?= form_error('status', '<small class="text-danger col-md">', '</small>'); ?>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Simpan</button>
                </div>
            </div>
        </div>
    </div>
    </form>