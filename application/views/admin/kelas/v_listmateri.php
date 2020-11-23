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
    </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="card">
            <div class="card-header">
            <h3 class="card-title pt-2">List Materi</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAdd">
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
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalEdit<?= $id;?>">
                        <i class="fas fa-edit"></i> Edit</button>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalDelete<?= $id;?>">
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