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
      <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
    </div>


    </section>
    <section class="content">
        <div class="card">
            <div class="card-header">
            <h3 class="card-title pt-2"> List Materi</h3>
            <div class="card-tools">
                <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAdd">
                <i class="fas fa-plus-circle"></i> Import Excel</button> -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAdd">
                <i class="fas fa-plus-circle"></i> Materi</button>
                <a href="<?= base_url('admin/listkelas'); ?>" class="btn btn-outline-primary">
                <i class="fas fa-arrow-circle-left"></i> Kembali</a>
            </div>
            </div>
            <div class="card-body">
            <?php if ($materi == null) : ?>
                        <!-- Jika Belum Terdapat data -->
                            <div class="col-md">
                                <div class="card-body text-center mt-4">
                                    <img src="<?= base_url('assets/icon/noList.svg'); ?>" alt="noData" class="img-rounded img-responsive img-fluid" width="100">
                                </div>
                                <div class="card-body pt-0 mt-4">
                                    <h3 class="text-center text-bold text-muted">Belum terdapat data</h3>
                                </div>
                            </div>
                    <?php else : ?>
                <?php foreach($materi as $mtr):
                    $id = $mtr['ID_MT'];
                    $nama = $mtr['NM_MT'];
                    ?>
                <div class="card">
                    <div class="card-header bg-dark">
                    <h3 class="card-title pt-2"><?= $nama;?></h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal_tambah">
                        <i class="fas fa-plus-circle"></i> File Materi</button>
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalEdit<?= $id;?>">
                        <i class="fas fa-edit"></i> Edit</button>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalDelete<?= $id;?>">
                        <i class="fas fa-trash"></i> Hapus</button>
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    </div>
                    </div>
                    <div class="card-body">
                    <?php if ($sub == null) : ?>
                        <!-- Jika Belum Terdapat data -->
                            <div class="col-md">
                                <div class="card-body pt-0 mt-4">
                                    <h4 class="text-center text-bold text-muted">Belum terdapat data</h4>
                                </div>
                            </div>
                    <?php else : ?>
                        <?php foreach($sub as $s):
                            $id_sub = $s['ID_SUB'];    
                        ?>
                        <div class="row">
                        <div class="card col-sm-8">
                            <div class="card-header">
                            <h1 class="card-title pt-2"><?= $s['FILE_SUB'];?></h1>
                            <div class="card-tools">
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal_edit_sub<?=$id_sub?>">
                                <i class="fas fa-edit"></i> Edit</button>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="##modal_hapus_sub<?=$id_sub?>">
                                <i class="fas fa-trash"></i> Hapus</button>
                            </div>
                            </div>
                        </div>
                        </div>
                        <?php endforeach;?>
                        <?php endif;?>
                    </div>
                </div>
                <?php endforeach;?>
            <?php endif;?>
            </div>
        </div>
    </section>


<?php 
    $id_kls= $this->uri->segment(4);
?>
<!-- Modal Tambah -->
<div class="modal fade" id="modalAdd" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title">Tambah Materi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url('admin/materi/create')?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                <div class="form-group">
                    <label for="nama">Judul Materi</label>
                    <input type="text" name="nama" class="form-control" placeholder="Nama Menu">
                    <small class="form-text text-success">Contoh: BAB 1 Pengenalan</small>
                    <?= form_error('nama', '<small class="text-danger col-md">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="isi">Isi Konten</label>
                    <textarea class="textarea" name="detail" placeholder="Isi Konten"
                    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                    <small class="form-text text-success">Berisi keterangan kebijakan</small>
                    <?= form_error('detail', '<small class="text-danger col-md">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <input type="hidden" name="id_kelas" value="<?= $id_kls?>" class="form-control" placeholder="Label Icon">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Simpan</button>
                </div>
                </div>
                </div>
            </form>
        </div>
    </div>
    
    
<?php foreach($materi as $p) :
    $id = $p['ID_MT'];
    $nama = $p['NM_MT'];
    $detail = $p['DETAIL_MT'];
    ?>

<form action="<?php echo base_url().'admin/materi/update'?>" method="post" enctype="multipart/form-data">
<div class="modal fade" id="modalEdit<?=$id?>" aria-hidden="true" tabindex="-1">
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
                        <label for="nama">Judul Materi</label>
                        <input type="text" name="nama" value="<?=$nama;?>" class="form-control" placeholder="Nama Menu">
                        <small class="form-text text-success">Contoh: BAB 1 Pengenalan</small>
                        <?= form_error('nama', '<small class="text-danger col-md">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="isi">Isi Konten</label>
                        <textarea class="textarea" name="detail" placeholder="Isi Konten"
                        style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?=$detail?></textarea>
                        <small class="form-text text-success">Berisi keterangan kebijakan</small>
                        <?= form_error('detail', '<small class="text-danger col-md">', '</small>'); ?>
                    </div>
                </div>
                <div class="card-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input type="hidden" name="id_edit" value="<?=$id;?>" required>
                    <input type="hidden" name="id_kelas" value="<?=$id_kls;?>" required>
                    <button type="submit" class="btn btn-warning"><i class="far fa-save"></i> Update</button>
                </div>
                </div>
            </div>
        </div>
    </div>
    </form>

    <form action="<?php echo base_url().'admin/materi/delete'?>" method="post" enctype="multipart/form-data">
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
                        <img class="mt-2 mb-2" src="<?= base_url();?>assets/dist/img/hapus.svg" width=80% alt="delete-img">
                        <h4 class="mb-4">Apakah anda yakin untuk menghapus menu ini?</h4>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input type="hidden" name="delete_id" value="<?=$id;?>" required>
                    <input type="hidden" name="id_kelas" value="<?=$id_kls;?>" required>
                    <button type="submit" class="btn btn-danger"><i class="far fa-save"></i> Hapus</button>
                </div>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>
<?php endforeach; ?>