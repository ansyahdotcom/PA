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
            <h3 class="card-title pt-2">Navigasi Halaman</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAdd">
                <i class="fas fa-plus"></i> Menu</button>
            </div>
            </div>
            <div class="card-body">
                <?php foreach($data->result() as $row):
                    $id = $row->ID_NV;
                    $nama = $row->NM_NV;
                    $slug = $row->LINK_NV;
                    ?>
                <div class="card">
                    <div class="card-header bg-dark">
                    <h3 class="card-title pt-2"><?= $row->NM_NV;?></h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalSubMenu<?= $id;?>">
                        <i class="fas fa-plus"></i> Sub Menu</button>
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalEdit<?= $id;?>">
                        <i class="fas fa-edit"></i> Edit</button>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalDelete<?= $id;?>">
                        <i class="fas fa-trash-alt"></i> Hapus</button>
                    </div>
                    </div>
                    <div class="card-body">
                        <?php
                            $parent_id=$row->ID_NV;
                            $query = $this->db->query("SELECT * FROM navbar WHERE PR_ID='$parent_id'");
                            foreach ($query->result() as $i) :
                            $navbar_id= $i->ID_NV;
                            $nama_sub = $i->NM_NV;
                            $slug_sub = $i->LINK_NV;
                        ?>
                        <div class="card">
                            <div class="card-header">
                            <h3 class="card-title pt-2"><?= $i->NM_NV;?></h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalEditSub<?=$navbar_id;?>">
                                <i class="fas fa-edit"></i> Edit</button>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalDelete<?= $navbar_id;?>">
                                <i class="fas fa-trash-alt"></i> Hapus</button>
                            </div>
                            </div>
                        </div>
                        <?php endforeach;?>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
        </div>
        </section>
    </div>

    <form action="<?php echo base_url().'admin/navigasi/insert'?>" method="post" enctype="multipart/form-data">
    <div class="modal fade" id="modalAdd" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                <h4 class="modal-title">Tambah Menu</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Menu</label>
                        <input type="text" name="nama" class="form-control" placeholder="Nama Menu">
                        <?= form_error('nama', '<small class="text-danger col-md">', '</small>'); ?>
                    </div>
                    <div class="form-group input-group mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><?php echo site_url();?></span>
                    </div>
                    <input type="text" name="link" class="form-control" placeholder="Link">
                    <?= form_error('link', '<small class="text-danger col-md">', '</small>'); ?>
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
    
    <form action="<?php echo base_url().'admin/navigasi/insert_submenu'?>" method="post" enctype="multipart/form-data">
    <div class="modal fade" id="modalSubMenu<?=$id;?>" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                <h4 class="modal-title">Tambah Sub Menu</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Sub Menu</label>
                        <input type="text" name="nama" class="form-control" placeholder="Nama Menu">
                    </div>
                    <div class="form-group input-group mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><?php echo site_url();?></span>
                    </div>
                    <input type="text" name="link" class="form-control" placeholder="Link">
                </div>
                </div>
                <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <input type="hidden" name="id_submenu" value="<?=$id;?>" required>
                <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Simpan</button>
                </div>
            </div>
        </div>
    </div>
    </form>

    <form action="<?php echo base_url().'admin/navigasi/update'?>" method="post" enctype="multipart/form-data">
    <div class="modal fade" id="modalEditSub<?=$navbar_id;?>" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                <h4 class="modal-title">Edit Sub Menu</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Label Menu</label>
                        <input type="text" name="nama" value="<?=$nama_sub?>" class="form-control" placeholder="Nama Menu">
                    </div>
                    <div class="form-group input-group mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><?php echo site_url();?></span>
                    </div>
                    <input type="text" name="link" value="<?=$slug_sub?>" class="form-control" placeholder="Link">
                </div>
                </div>
                <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <input type="hidden" name="id_navbar" value="<?=$navbar_id?>" required>
                <button type="submit" class="btn btn-warning"><i class="far fa-save"></i> Update</button>
                </div>
            </div>
        </div>
    </div>
    </form>

    <form action="<?php echo base_url().'admin/navigasi/update'?>" method="post" enctype="multipart/form-data">
    <div class="modal fade" id="modalEdit<?=$id;?>" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                <h4 class="modal-title">Edit Menu</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Label Menu</label>
                        <input type="text" name="nama" value="<?=$nama?>" class="form-control" placeholder="Nama Menu">
                    </div>
                    <div class="form-group input-group mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><?php echo site_url();?></span>
                    </div>
                    <input type="text" name="link" value="<?=$slug?>" class="form-control" placeholder="Link">
                </div>
                </div>
                <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <input type="hidden" name="id_navbar" value="<?=$id?>" required>
                <button type="submit" class="btn btn-warning"><i class="far fa-save"></i> Update</button>
                </div>
            </div>
        </div>
    </div>
    </form>

    <form action="<?php echo base_url().'admin/navigasi/delete'?>" method="post" enctype="multipart/form-data">
    <div class="modal fade" id="modalDelete<?=$id;?>" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                <h4 class="modal-title">Hapus Menu</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body justify-content-center">
                    <div class="text-center">
                        <img class="mt-2 mb-2" src="https://image.freepik.com/free-vector/business-people-asking-questions-flat-vector-illustration_74855-4771.jpg" width=80% alt="not-login">
                        <h4 class="mb-4">Apakah anda yakin untuk menghapus menu ini?</h4>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <input type="hidden" name="id_delete" value="<?=$id;?>" required>
                <button type="submit" class="btn btn-danger"><i class="far fa-save"></i> Hapus</button>
                </div>
            </div>
        </div>
    </div>
    </form>