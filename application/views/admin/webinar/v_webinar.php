<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Webinar</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard'); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Webinar</li>
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
                <a class="btn btn-primary" href="<?= base_url('admin/webinar/tambah_webinar'); ?>"><i class="fas fa-plus"></i>
                    Tambah Webinar</a>
            </div>
        </div>
        <?php foreach ($webinar as $wbnr) {
            $ID_WEBINAR = $wbnr->ID_WEBINAR;
        ?>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                    <!-- Post -->
                                    <div class="post">
                                        <div class="user-block">
                                            <!-- <img class="img-circle img-bordered-sm"
											src="<?= base_url('assets/fotowebinar/' . $wbnr->FOTO_PEMATERI); ?>"> -->
                                            <span class="username m-0 text-lg">
                                                <a class="" href="<?= base_url('admin/webinar/edit_webinar/' . $wbnr->TEMA . '/'); ?>"><?= str_replace('-', ' ', $wbnr->TEMA); ?></a>
                                            </span>
                                            <hr>
                                        </div>
                                        <!-- /.user-block -->
                                        <p>
                                            <table>
                                                <tr>
                                                    <td><b>Pemateri</b> &nbsp;</td>
                                                    <td for="PEMATERI">:&nbsp; <?= $wbnr->PEMATERI; ?></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Platform</b> &nbsp;</td>
                                                    <td for="PLATFORM">:&nbsp; <?= $wbnr->PLATFORM; ?></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Harga</b> &nbsp;</td>
                                                    <td for="HARGA">:&nbsp; <?= $wbnr->HARGA; ?></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Tanggal Webinar</b> &nbsp;</td>
                                                    <td for="TGL_WEB">:&nbsp; <?= date('d F Y', strtotime($wbnr->TGL_WEB)); ?></td>
                                                </tr>
                                            </table>
                                            <br> <br>
                                            <!-- Nyari status web trus ditampilkan sesuai status web -->
                                            <?php
                                            if ($wbnr->ST_POSTWEB == 0) {
                                                echo '<label for="">Draf</label>';
                                            } else {
                                                echo '<label for="">Dipublikasikan</label>';
                                            }
                                            ?>

                                            <label for="TGL_POSTWEB" class="text-sm mr-2"><?= ' | ' . date('d F Y', strtotime($wbnr->TGL_POSTWEB)); ?></label>
                                            <span class="float-right">
                                                <!-- Nyari status web trus mau diposting apa nggak -->
                                                <?php
                                                if ($wbnr->ST_POSTWEB == 0) {
                                                    echo '<button type="button" id="detail" class="btn btn-warning btn-sm btn-round" style="color: white"
												data-toggle="modal" data-target="#modal_posting' . $wbnr->ID_WEBINAR . '">
												<i class="fas fa-arrow-circle-right"></i> Publikasikan</button>';
                                                } else {
                                                    echo '<button type="button" id="detail" class="btn btn-success btn-sm btn-round" style="color: white"
												data-toggle="modal" data-target="#modal_posting' . $wbnr->ID_WEBINAR . '">
												<i class="fas fa-arrow-circle-left"></i> Kembalikan ke draf</button>';
                                                }
                                                ?>
                                                <!-- dilihat tampilan webinarnya sebelum diposting -->
                                                <a class="btn btn-secondary btn-sm btn-round" href="<?= base_url('admin/webinar/pratinjau/' . $wbnr->ID_WEBINAR); ?>"><i class="fas fa-eye"></i> Pratinjau</a>

                                                <!-- edit artikel -->
                                                <a href="<?= base_url('admin/webinar/edit/' . $wbnr->ID_WEBINAR); ?>">
                                                    <button type="button" class="btn btn-primary btn-circle btn-sm">
                                                        <i class="fas fa-edit" style="color: white"></i> Edit
                                                    </button>
                                                </a>
                                                <!-- hapus artikel -->
                                                <button type="button" id="detail" class="btn btn-danger btn-circle btn-sm" data-toggle="modal" data-target="#modal_hapus<?= $wbnr->ID_WEBINAR; ?>" style="color : white"><i class="fas fa-trash"></i> Hapus</button>
                                            </span>
                                        </p>
                                    </div>
                                    <!-- /.post -->
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        <?php } ?>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- modal posting -->
<?php
foreach ($webinar as $wbnr) {
    $ID_WEBINAR = $wbnr->ID_WEBINAR;
    $ST_POSTWEB = $wbnr->ST_POSTWEB;
?>
    <div class="modal fade" id="modal_posting<?= $ID_WEBINAR; ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <?php
                if ($ST_POSTWEB == 0) {
                    echo '<div class="modal-header">
						<h3 class="modal-title" id="myModalLabel">Publikasikan Artikel</h3>
					</div>
					<form action="' . base_url('admin/webinar/pr_webinar') . '" method="post" class="form-horizontal">
						<div class="modal-body">
							<p>Apakah Anda yakin ingin mempublikasikan artikel ini?</p>
						</div>
						<div class="modal-footer">
							<input type="hidden" name="ST_POSTWEB" value="' . $ST_POSTWEB . '">
							<input type="hidden" name="ID_WEBINAR" value="' . $ID_WEBINAR . '">
							<button class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Batal</button>
							<button class="btn btn-primary">Ya</button>
						</div>
					</form>';
                } else {
                    echo '<div class="modal-header">
						<h3 class="modal-title" id="myModalLabel">Kembalikan ke Draf</h3>
					</div>
					<form action="' . base_url('admin/webinar/pr_webinar') . '" method="post" class="form-horizontal">
						<div class="modal-body">
							<p>Apakah Anda ingin mengembalikan artikel ke draf?</p>
						</div>
						<div class="modal-footer">
							<input type="hidden" name="ST_POSTWEB" value="' . $ST_POSTWEB . '">
							<input type="hidden" name="ID_WEBINAR" value="' . $ID_WEBINAR . '">
							<button class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Batal</button>
							<button class="btn btn-primary">Ya</button>
						</div>
					</form>';
                }
                ?>
            </div>
        </div>
    </div>

    <!-- Modal Hapus -->
    <div class="modal fade" id="modal_hapus<?= $ID_WEBINAR; ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel">Hapus Data</h3>
                </div>
                <form action="<?= base_url('admin/webinar/hapus'); ?>" method="post" class="form-horizontal">
                    <div class="modal-body">
                        <p>Apakah Anda yakin ingin menghapus data ini?</p>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="ID_WEBINAR" value="<?= $ID_WEBINAR; ?>">
                        <button class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Batal</button>
                        <button class="btn btn-danger">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>