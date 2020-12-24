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
		</div><!-- /.container-fluid -->
	</section>
	<section class="content">
        <div class="card">
            <!-- <div class="card-header">
            <div class="card-tools">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAdd">
                <i class="fas fa-plus-circle"></i>Sertifikat</button>
            </div>
            </div> -->
            <div class="card-body">
            <?php foreach($cek as $mtr):
                    $id = $mtr['ID_MT'];
                    $nama = $mtr['NM_MT'];
                    ?>
                <div class="card">
                    <div class="card-header">
                    <h3 class="card-title pt-2"><?= $nama;?></h3>
                    <div class="card-tools">
						<div class="form-check-lg">
							<input class="form-check-input position-static" type="checkbox" value="">
						</div>
                    </div>
                    </div>
                    <div class="card-body">
                        <?php
                        $id = $mtr['ID_MT'];
                        $query = $this->db->query("SELECT * FROM materi_sub, materi WHERE materi.ID_MT = materi_sub.ID_MT AND materi.ID_MT ='$id'");
                        $sub = $query->result_array();
                        foreach ($sub as $i) :
                            $id_sub = $i['ID_SUB'];
                            $nm_sub = $i['NM_SUB'];
                            ?> 
                        <div class="row">
                        <div class="card col-sm-12 bg-navy mt-2">
                            <div class="card-header">
                                <h1 class="card-title mt-2"><i class="<?=$i['ICON_SUB'];?> fa-lg mr-2"></i> <?= str_replace( '_', ' ', $i['FILE_SUB']);?></h1>
                                <div class="card-tools pb-2">
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal_edit_sub<?=$id_sub;?>">
                                    <i class="fas fa-download"></i></button>
                                </div>
                            </div>
                        </div>
                        </div>
                        <?php endforeach;?>
                        <!-- Tugas -->
                        <?php
                        $id = $mtr['ID_MT'];
                        $query = $this->db->query("SELECT * FROM tugas, materi WHERE materi.ID_MT = tugas.ID_MT AND tugas.ID_MT = '$id'");
                        $tugas = $query->result_array();
                        foreach ($tugas as $i) :
                            $id_tg = $i['ID_TG'];
                            $nm_tg = $i['DETAIL_TG'];
                            ?> 
                        <div class="row">
							<div class="card bg-blue col-sm-12 mt-2">
								<div class="status mt-2">
									<h5 class="card-title badge badge-secondary m-2">Belum mengerjakan</h5>
									<h5 class="card-title badge badge-warning m-2"><i class="fas fa-stopwatch"></i> 25 Desember 2020</h5>
								</div>
								<div class="card-header">
									<h1 class="card-title mt-2"><i class="<?= $i['ICON_TG']?> fa-lg mr-2"></i> <?= $i['NM_TG'];?></h1>
									<div class="card-tools pb-2">
										<a href="<?=base_url()?>peserta/tugas/detail/<?=$id_tg?>" class="btn btn-warning">
											<i class="fas fa-eye"></i> Detail
										</a>
									</div>
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
