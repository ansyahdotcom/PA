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
                <?php foreach($data as $row):
                    $id = $row['ID_NV'];
                    $nama = $row['NM_NV'];
                    $slug = $row['LINK_NV'];
                    ?>
                <div class="card">
                    <div class="card-header bg-dark">
                    <h3 class="card-title pt-2"><?= $row['NM_NV'];?></h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalSubMenu<?= $id;?>">
                        <i class="fas fa-plus"></i> Sub Menu</button>
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalEdit<?= $id;?>">
                        <i class="fas fa-edit"></i> Edit</button>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalDelete<?= $id;?>">
                        <i class="fas fa-trash-alt"></i> Hapus</button>
                    </div>
                    </div>
                        <?php
                            $parent=$row['ID_NV'];
                            $query = $this->db->query("SELECT * FROM navbar WHERE PR_ID='$parent'");
                            foreach ($query->result_array() as $i) :
                            $id_nav = $i['ID_NV'];
                            $nama_nav = $i['NM_NV'];
                            $slug_nav = $i['LINK_NV'];
                        ?>
                    <div class="card-body">
                        <div class="card">
                            <div class="card-header">
                            <h3 class="card-title pt-2"><?= $i['NM_NV'];?></h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalEditSub<?= $id_nav;?>">
                                <i class="fas fa-edit"></i> Edit</button>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalDelete<?= $id;?>">
                                <i class="fas fa-trash-alt"></i> Hapus</button>
                            </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
                <?php endforeach;?>
            </div>
        </div>
        </section>

</div>