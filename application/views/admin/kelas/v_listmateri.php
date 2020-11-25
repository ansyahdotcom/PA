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
      <?= $this->session->flashdata('message'); ?>
    </div><!-- /.container-fluid -->


    </section>
    <section class="content">
        <div class="card">
            <div class="card-header">
            <h3 class="card-title pt-2">List Materi</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-tambah">
                <i class="fas fa-plus"></i> Materi</button>
            </div>
            </div>
            <div class="card-body">
                <?php foreach($materi as $mtr):
                    $id = $mtr['ID_MT'];
                    $nama = $mtr['NM_MT'];
                    ?>
                <div class="card">
                    <div class="card-header bg-dark">
                    <h3 class="card-title pt-2"><?= $nama;?></h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalSubMenu<?= $id;?>">
                        <i class="fas fa-plus"></i> Sub Menu</button>
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-edit<?= $id;?>">
                        <i class="fas fa-edit"></i> Edit</button>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal_hapus<?= $id;?>">
                        <i class="fas fa-trash-alt"></i> Hapus</button>
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    </div>
                    </div>
                    <div class="card-body">
                        <div class="card">
                            <div class="card-header">
                            <h3 class="card-title pt-2">Sub Menu</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalEditSub">
                                <i class="fas fa-edit"></i> Edit</button>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalDelete">
                                <i class="fas fa-trash-alt"></i> Hapus</button>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
        </div>
    </section>
</div>

<?php foreach($materi as $mtr) {
  $id = $mtr['ID_MT'];
  $nama = $mtr['NM_MT'];
?>
<div class="modal fade" id="modal_hapus<?= $id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel">Hapus Data</h3>
                </div>
                <form action="<?= base_url('admin/materi/hapus'); ?>" method="post" class="form-horizontal">
                    <div class="modal-body">
                        <p>Apakah Anda yakin ingin menghapus data ini?</p>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="ID_MT" value="<?= $id; ?>">
                        <button class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Batal</button>
                        <button class="btn btn-danger">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal edit Tags -->
    <div class="modal fade" id="modal-edit<?= $id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title title-1" id="myModalLabel">Edit Materi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?= base_url('admin/materi/update_materi'); ?>">
                    <div class="modal-body">
                        <input type="hidden" readonly name="ID_MT" value="<?= $id; ?>" class="form-control">
                        <div class="form-group">
                        <input type="text" name="NM_MT" id="NM_MT" class="form-control"
							            autocomplete="off" value="<?= $nama; ?>">
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

<div class="modal fade" id="modal-tambah" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title title-1" id="myModalLabel">Tambah Materi</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="post" action="<?= base_url('admin/materi/tambah_materi'); ?>">
				<div class="modal-body">
					<div class="form-group">
          <input type="hidden" class="form-control" id="ID_MT" name="ID_MT" value="<?= $id; ?>">
						<input required type="text" name="NM_MT" id="NM_MT" class="form-control" placeholder="Masukkan Nama Materi . ." aria-describedby="namamateri" maxlength="100">
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" id="save-btn" class="btn btn-success">Tambah</button>
				</div>
			</form>
		</div>
	</div>
</div>
