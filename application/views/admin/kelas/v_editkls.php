<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="tittlekls"><?= $tittle; ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard'); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/kelas'); ?>">Data Kelas</a></li>
                        <li class="breadcrumb-item tittlekls active"><?= $tittle; ?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <?php
    $id = $kelas['ID_KLS'];
    $namakls = $kelas['TITTLE'];
    $tgl_daftar = $kelas['TGL_PENDAFTARAN'];
    $tgl_penutupan = $kelas['TGL_PENUTUPAN'];
    $tgl_mulai = $kelas['TGL_MULAI'];
    $tgl_selesai = $kelas['TGL_SELESAI'];
    $lok_kls = $kelas['LOK_KLS'];
    $hari = $kelas['HARI'];
    $jam_mulai = $kelas['JAM_MULAI'];
    $jam_selesai = $kelas['JAM_SELESAI'];
    $harga = $kelas['PRICE'];
    $kategori = $kelas['KTGKLS'];
    $status = $kelas['STAT'];
    $deskripsi = $kelas['DESKRIPSI'];
    $diskon = $kelas['NM_DISKON'];
    $date = $kelas['DATE_KLS'];
    $last = $kelas['UPDATE_KLS'];
    $gambar = $kelas['GBR_KLS'];
    $jmldis = $kelas['DISKON'];
    $iddis = $kelas['ID_DISKON'];
    $id_adm = $kelas['NM_ADM'];
    ?>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title text-bold">Form <span class="tittlekls text-bold"><?= $tittle; ?></span></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="<?= base_url('admin/kelas/detailkls/' . $id); ?>" class="form-editkls" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="text-center img-kls">
                                            <img class="img-fluid img-responsive img-rounded shadow" src="<?= base_url(); ?>assets/dist/img/kelas/<?= $kelas['GBR_KLS']; ?>" alt="User profile picture" width="300px">
                                        </div>
                                        <div class="form-group img-edit" hidden>
                                            <div class="form-group text-center" style="position: relative;">
                                                <span class="img-div">
                                                    <div class="text-center img-placeholder" onClick="triggerClick()">
                                                        <h3 class="profile-username text-center text-bold">Edit Gambar Kelas</h3>
                                                        <label class="sm-0 text-primary"><small>(Klik gambar di bawah untuk mengganti)</small></label>
                                                    </div>
                                                    <div>
                                                        <img class="img-fluid img-responsive img-rounded shadow" src="<?= base_url(); ?>assets/dist/img/kelas/<?= $kelas['GBR_KLS']; ?>" onClick="triggerClick()" id="profileDisplay" width="250px">
                                                    </div>
                                                </span>
                                                <input type="file" name="gbrkls" value="<?= $kelas['GBR_KLS']; ?>" onChange="displayImage(this)" id="profileImage" class="form-control" style="display: none;" accept="image/x-png,image/gif,image/jpeg">
                                                <?= form_error('image', '<small class="text-danger pl-3">', '</small>'); ?>
                                                <label class="text-bold text-gray">Gambar Kelas</label>
                                                <div>
                                                    <small class="text-danger text-bold">(Ukuran file gambar max 2 mb.)</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="harga">Status Kelas: </label>
                                            <?php if ($status == 0) : ?>
                                                <span class="badge-pill bg-dark text-bold btn-block text-center"> Drafted</span>
                                            <?php else : ?>
                                                <span class="badge-pill bg-success text-bold btn-block text-center"> Published</span>
                                            <?php endif; ?>

                                            <label for="harga">Kategori Kelas: </label>
                                            <span class="badge-pill bg-warning text-bold btn-block text-center"><?= $kategori; ?></span>

                                            <label for="harga">Disusun oleh: </label>
                                            <span class="badge-pill bg-gray text-bold btn-block text-center"><?= $id_adm; ?></span>

                                            <label for="harga">Link Kelas: </label>
                                            <a href="<?= base_url('admin/materi/materikelas/' . $id); ?>" class="btn btn-primary btn-block text-bold">Akses Kelas</a>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <input type="text" class="form-control text-bold" id="idkls" name="id" value="<?= $id; ?>" hidden>
                                    <div class="col-md-6 row-idkls">
                                        <div class="form-group">
                                            <label for="id">ID Kelas</label>
                                            <input type="text" class="form-control" id="id" value="<?= $id; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="namakls">Nama Kelas</label>
                                            <input type="text" class="form-control" id="inkls" name="namakls" placeholder="Nama Kelas" value="<?= $namakls; ?>" disabled required>
                                            <?= form_error('namakls', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6 row-ktgkls" hidden>
                                        <div class="form-group">
                                            <label for="ktg">Kategori Kelas</label>
                                            <select name="ktg" id="inkls" class="custom-select slct-ktg" required>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                if ($tgl_daftar == "" || $tgl_daftar == "1970-01-01") :
                                    $daftar = "Tanggal belum diset !";
                                else :
                                    $daftar = date('d F Y H:i', strtotime($tgl_daftar));
                                endif;

                                if ($tgl_penutupan == "" || $tgl_penutupan == "1970-01-01") :
                                    $penutupan = "Tanggal belum diset !";
                                else :
                                    $penutupan = date('d F Y H:i', strtotime($tgl_penutupan));
                                endif;

                                if ($tgl_mulai == "" || $tgl_mulai == "1970-01-01") :
                                    $mulai = "Tanggal belum diset !";
                                else :
                                    $mulai = date('d F Y', strtotime($tgl_mulai));
                                endif;

                                if ($tgl_selesai == "" || $tgl_selesai == "1970-01-01") :
                                    $selesai = "Tanggal belum diset !";
                                else :
                                    $selesai = date('d F Y', strtotime($tgl_selesai));
                                endif;
                                ?>
                                <div class="row">
                                    <div class="col-md-6 tgl_daftar">
                                        <div class="form-group">
                                            <label for="tgl_daftar">Tanggal Pembukaan Pendaftaran</label>
                                            <div class="input-group">
                                                <input type="text" data-toggle="datetimepicker" data-target=".pendaftaran" class="form-control pendaftaran" id="inkls" name="tgl_daftar" value="<?= $daftar; ?>" autocomplete="off" placeholder="dd/mm/yyyy 00:00" disabled>
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="far fa-calendar-alt"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 tgl_penutupan">
                                        <div class="form-group">
                                            <label for="tgl_penutupan">Tanggal Penutupan Pendaftaran</label>
                                            <div class="input-group">
                                                <input type="text" data-toggle="datetimepicker" data-target=".penutupan" class="form-control penutupan" id="inkls" name="tgl_penutupan" value="<?= $penutupan; ?>" autocomplete="off" placeholder="dd/mm/yyyy 00:00" disabled>
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="far fa-calendar-alt"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 tgl_mulai">
                                        <div class="form-group">
                                            <label for="tgl_mulai">Tanggal Mulai Kelas</label>
                                            <div class="input-group">
                                                <input type="text" data-toggle="datetimepicker" data-target=".mulai" class="form-control mulai" id="inkls" name="tgl_mulai" value="<?= $mulai; ?>" autocomplete="off" placeholder="dd/mm/yyyy" disabled>
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="far fa-calendar-alt"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 tgl_selesai">
                                        <div class="form-group">
                                            <label for="tgl_selesai">Tanggal Selesai Kelas</label>
                                            <div class="input-group">
                                                <input type="text" data-toggle="datetimepicker" data-target=".selesai" class="form-control selesai" id="inkls" name="tgl_selesai" value="<?= $selesai; ?>" autocomplete="off" placeholder="dd/mm/yyyy" disabled>
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="far fa-calendar-alt"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 lok_kls1">
                                        <div class="form-group">
                                            <label for="lok_kls">Lokasi</label>
                                            <input type="text" class="form-control" value="<?= $lok_kls; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6 lok_kls" hidden>
                                        <div class="form-group">
                                            <label for="lok_kls">Lokasi</label>
                                            <select name="lok_kls" id="lok_kls" class="form-control" required>
                                                <option value="">--Pilih--</option>
                                                <option value="Online Class" <?= $lok_kls == "Online Class" ? "selected" : "" ?>>Online Class</option>
                                                <option value="Offline Class" <?= $lok_kls == "Offline Class" ? "selected" : "" ?>>Offline Class</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 hari1">
                                        <div class="form-group">
                                            <label for="">Hari Pelaksanaan</label>
                                            <input type="text" class="form-control" value="<?= $hari; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6 hari" hidden>
                                        <div class="form-group">
                                            <label for="">Hari Pelaksanaan</label>
                                            <select name="hari" id="hari" required class="form-control">
                                                <option value="">--Pilih--</option>
                                                <option value="3 Hari (Senin-Rabu)" <?= $hari == "3 Hari (Senin-Rabu)" ? "selected" : "" ?>>3 Hari (Senin-Rabu)</option>
                                                <option value="4 Hari (Senin-Kamis)" <?= $hari == "4 Hari (Senin-Kamis)" ? "selected" : "" ?>>4 Hari (Senin-Kamis)</option>
                                                <option value="5 Hari (Senin-Jumat)" <?= $hari == "5 Hari (Senin-Jumat)" ? "selected" : "" ?>>5 Hari (Senin-Jumat)</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="jam_mulai">Jam Mulai Kelas</label>
                                            <div class="input-group">
                                                <input type="text" data-toggle="datetimepicker" data-target=".jam_mulai" class="form-control jam_mulai" value="<?= $jam_mulai; ?>" id="inkls" name="jam_mulai" autocomplete="off" placeholder="00:00" disabled>
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="far fa-clock"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="jam_selesai">Jam Selesai Kelas</label>
                                            <div class="input-group">
                                                <input type="text" data-toggle="datetimepicker" data-target=".jam_selesai" class="form-control jam_selesai" value="<?= $jam_selesai; ?>" id="inkls" name="jam_selesai" autocomplete="off" placeholder="00:00" disabled>
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="far fa-clock"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 edit1">
                                        <div class="form-group">
                                            <label for="harga">Harga</label>
                                            <input type="text" class="form-control" id="inkls" name="harga" placeholder="harga" value="Rp. <?= number_format($harga, "0", ".", "."); ?>" disabled required>
                                            <?= form_error('harga', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-12 edit" hidden>
                                        <div class="form-group">
                                            <label for="harga">Harga</label>
                                            <input type="number" class="form-control" id="inkls" name="harga" placeholder="harga" value="<?= $harga; ?>" disabled required>
                                            <?= form_error('harga', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <input type="text" value="<?= $gambar; ?>" name="old" hidden>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="email">Deskripsi</label>
                                            <textarea class="form-control inkls" id="inkls" name="deskripsi" style="weight: 300px" disabled required><?= $deskripsi; ?></textarea>
                                            <?= form_error('deskripsi', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <?php if ($date == 0) : ?>
                                            <b>Dibuat pada tanggal:</b> <span class="badge-pill bg-secondary text-bold">--</span>
                                        <?php else : ?>
                                            <b>Dibuat pada tanggal:</b> <span class="badge-pill bg-primary text-bold"><?= date('d F Y', $date); ?></span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-md-6">
                                        <?php if ($last == 0) : ?>
                                            <b>Terakhir diupdate tanggal:</b> <span class="badge-pill bg-secondary text-bold">--</span>
                                        <?php else : ?>
                                            <b>Terakhir diupdate tanggal:</b> <span class="badge-pill bg-warning text-bold"><?= date('d F Y', $last); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <a href="<?= base_url('admin/kelas'); ?>" class="btn btn-default" id="back-kls"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
                                <button type="button" class="btn btn-danger" id="cancel-kls" data-dismiss="modal" hidden><i class="fas fa-arrow-circle-left"></i> Batal</button>
                                <button type="button" class="btn btn-primary" id="edit-kls"><i class="fas fa-edit"></i> Edit</button>
                                <button type="submit" class="btn btn-primary" id="save-kls" hidden><i class="fas fa-save"></i> Simpan</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->