  <!-- Content Wrapper. Contains page content -->
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
  		<div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>

  	</section>

  	<!-- Main content -->
  	<section class="content">
  		<div class="row">
  			<div class="col-12">
  				<div class="card">
  					<div class="card-header">
  						<button type="button" class="btn btn-primary text-bold float-right" data-toggle="modal"
  							data-target="#modal-tambah"><i class="fas fa-plus-circle"></i> <?= $tittle; ?></button>
  					</div>
  					<!-- /.card-header -->
  					<div class="card-body">
  						<table id="example1" class="table table-bordered table-striped">
  							<thead>
  								<tr class="text-center">
  									<th>No</th>
  									<!-- <th>Id</th> -->
  									<th>Nama Kelas</th>
  									<th>Tanggal</th>
  									<!-- <th>Link Kelas</th> -->
  									<th>Harga</th>
  									<th>Status</th>
  									<th>Aksi</th>
  								</tr>
  							</thead>
  							<tbody>
  								<?php $no = 1; ?>
  								<?php foreach ($kelas as $k) :
                    $id = $k['ID_KLS'];
                    $namakls = $k['TITTLE'];
                    $tgl_mulai = $k['TGL_MULAI'];
                    $tgl_selesai = $k['TGL_SELESAI'];
                    $link = $k['PERMALINK'];
                    $harga = $k['PRICE'];
                    $kategori = $k['KTGKLS'];
                    $status = $k['STAT'];
                    $jmldis = $k['DISKON'];
                  ?>
  								<tr>
  									<td class="text-center"><?= $no; ?></td>
  									<!-- <td><?= $id; ?></td> -->
  									<td><?= $namakls; ?></td>
  									<td>
  										<p><?= 'Mulai : '. date('d F Y', strtotime($tgl_mulai)); ?></p>
  										<p><?= 'Selesai : '. date('d F Y', strtotime($tgl_selesai)); ?></p>
  									</td>
  									<!-- <td class="text-center">
                        <a href="<?= $link; ?>" class="btn btn-primary btn-sm text-bold">Akses Kelas</a>
                      </td> -->
  									<td>Rp. <?= number_format($harga, 0, ".", "."); ?></td>
  									<!-- <td><span class="badge-pill bg-warning text-bold"><?= $kategori; ?></span></td> -->
  									<td class="text-center">
  										<?php if ($status == 0) { ?>
  										<span class="badge-pill bg-dark"><b>Drafted</b></span>
  										<?php } elseif ($status == 1) { ?>
  										<span class="badge-pill bg-success"><b>Published</b></span>
  										<?php } ?>
  									</td>
  									<td class="text-center">
  										<button class="btn btn-sm btn-primary" data-toggle="modal"
  											data-target="#modal-detail<?= $id; ?>"><i class="fas fa-edit"></i>
  											<b>Detail</b></button>
  										<a class="btn btn-sm btn-warning" type="button"
  											href="<?= base_url('admin/materi/materikelas/'). $id; ?>"><i
  												class="fas fa-edit"></i> <b>Materi</b></a>
  										<button class="btn btn-sm btn-danger" data-toggle="modal"
  											data-target="#modal-hapus<?= $id; ?>"><i class="fas fa-trash"></i>
  											<b>Hapus</b></button>
  										<?php if ($status == 1) { ?>
  										<button class="btn btn-sm btn-dark" data-toggle="modal"
  											data-target="#modal-blok<?= $id; ?>"><i class="fas fa-save"></i>
  											<b>Draft</b></button>
  										<?php } elseif ($status == 0) { ?>
  										<button class="btn btn-sm btn-success" data-toggle="modal"
  											data-target="#modal-unblok<?= $id; ?>"><i
  												class="fas fa-arrow-circle-up"></i>
  											<b>Publish</b></button>
  										<?php } ?>
  									</td>
  								</tr>
  								<?php $no++; ?>
  								<?php endforeach; ?>
  							</tbody>
  							<tfoot>
  								<tr class="text-center">
  									<th>No</th>
  									<th>Nama Kelas</th>
  									<th>Tanggal</th>
  									<!-- <th>Link Kelas</th> -->
  									<th>Harga</th>
  									<th>Status</th>
  									<th>Aksi</th>
  								</tr>
  							</tfoot>
  						</table>
  					</div>
  					<!-- /.card-body -->
  				</div>
  				<!-- /.card -->
  			</div>
  			<!-- /.col -->
  		</div>
  		<!-- /.row -->
  	</section>
  	<!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Modal tambah data -->
  <div class="modal fade" id="modal-tambah">
  	<div class="modal-dialog modal-lg">
  		<div class="modal-content">
  			<div class="modal-header">
  				<h4 class="modal-title">Tambah <?= $tittle; ?></h4>
  				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  					<span aria-hidden="true">&times;</span>
  				</button>
  			</div>
  			<form method="POST" action="<?= base_url('admin/kelas/saveall'); ?>" enctype="multipart/form-data">
  				<div class="card-body">
  					<div class="row">
  						<div class="col-md-6">
  							<div class="form-group">
  								<label for="namakls">Nama Kelas</label>
  								<input type="text" class="form-control" name="namakls" placeholder="Nama Kelas"
  									required autocomplete="off">
  								<?= form_error('namakls', '<small class="text-danger">', '</small>'); ?>
  							</div>
  						</div>
  						<div class="col-md-6">
  							<div class="form-group">
  								<label for="namakls">Kategori Kelas</label>
  								<select name="ktg" class="custom-select slct-ktg" required>

  								</select>
  							</div>
  						</div>
  					</div>
  					<div class="row">
  						<div class="col-md-6">
  							<div class="form-group">
  								<label for="tgl_mulai">Tanggal Mulai</label>
  								<input class="form-control" type="date" name="tgl_mulai">
  							</div>
  						</div>
  						<div class="col-md-6">
  							<div class="form-group">
  								<label for="tgl_selesai">Tanggal Selesai</label>
  								<input class="form-control" type="date" name="tgl_selesai">
  							</div>
  						</div>
  					</div>
  					<div class="row">
  						<div class="col-md-6">
  							<div class="form-group">
  								<label for="lok_kls">Lokasi</label>
  								<select name="lok_kls" id="lok_kls" class="form-control">
  									<option value="Online Class">Online Class</option>
  								</select>
  							</div>
  						</div>
  						<div class="col-md-6">
  							<div class="form-group">
  								<label for="hari">Hari Pelaksanaan</label>
  								<select name="hari" id="hari" class="form-control">
  									<option value="3 Hari (Senin-Rabu)">3 Hari (Senin-Rabu)</option>
  									<option value="4 Hari (Senin-Kamis)">4 Hari (Senin-Kamis)</option>
  									<option value="5 Hari (Senin-Jumat)">5 Hari (Senin-Jumat)</option>
  									<option value="6 Hari (Senin-Sabtu)">6 Hari (Senin-Sabtu)</option>
  									<option value="7 Hari (Senin-Minggu)">7 Hari (Senin-Minggu)</option>
  								</select>
  							</div>
  						</div>
  					</div>
  					<div class="row">
  						<div class="col-md-6">
  							<div class="form-group">
  								<label for="jam_mulai">Jam Mulai</label>
  								<input class="form-control" type="text" autocomplete="off" required
  									placeholder="Contoh 08.00">
  							</div>
  						</div>
  						<div class="col-md-6">
  							<div class="form-group">
  								<label for="jam_selesai">Jam Selesai</label>
  								<input class="form-control" type="text" autocomplete="off" required
  									placeholder="Contoh 11.00">
  							</div>
  						</div>
  					</div>
  					<div class="row">
  						<div class="col-md-6">
  							<div class="form-group">
  								<label for="harga">Harga</label>
  								<input type="number" class="form-control" name="harga" placeholder="harga" required>
  								<?= form_error('harga', '<small class="text-danger">', '</small>'); ?>
  							</div>
  						</div>
  						<div class="col-md-6">
  							<div class="form-group">
  								<label for="email">Gambar Kelas</label>
  								<div class="input-group mb-3">
  									<div class="custom-file">
  										<input type="file" class="custom-file-input" name="gbrkls">
  										<label class="custom-file-label" for="gbrkls">Pilih file...</label>
  									</div>
  								</div>
  							</div>
  						</div>
  						<!-- <div class="col-md-6 row-diskon" hidden>
                  <div class="form-group">
                    <label for="diskon">Diskon</label>
                    <select name="diskon" id="inkls" class="custom-select slct-diskon" disabled>

                    </select>
                  </div>
                </div> -->
  					</div>
  					<div class="row">
  						<div class="col-md-12">
  							<div class="form-group">
  								<label for="hp">Link Kelas</label>
  								<input type="text" class="form-control" name="link" placeholder="link" required>
  								<?= form_error('link', '<small class="text-danger">', '</small>'); ?>
  							</div>
  						</div>
  					</div>
  					<div class="row">
  						<div class="col-md-12">
  							<div class="form-group">
  								<label for="email">Deskripsi</label>
  								<textarea class="form-control" id="compose-textarea" name="deskripsi"
  									style="weight: 300px" required></textarea>
  								<?= form_error('deskripsi', '<small class="text-danger">', '</small>'); ?>
  							</div>
  						</div>
  					</div>
  				</div>
  				<div class="modal-footer justify-content-right">
  					<button type="button" class="btn btn-danger" data-dismiss="modal"><i
  							class="fas fa-arrow-circle-left"></i>
  						Tutup</button>
  					<button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
  				</div>
  			</form>
  		</div>
  		<!-- /.modal-content -->
  	</div>
  	<!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->


  <?php foreach ($kelas as $k) :
    $id = $k['ID_KLS'];
	$namakls = $k['TITTLE'];
	$tgl_mulai = $k['TGL_MULAI'];
	$tgl_selesai = $k['TGL_SELESAI'];
	$lok_kls = $k['LOK_KLS'];
	$hari = $k['HARI'];
	$jam_mulai = $k['JAM_MULAI'];
	$jam_selesai = $k['JAM_SELESAI'];
    $link = $k['PERMALINK'];
    $harga = $k['PRICE'];
    $kategori = $k['KTGKLS'];
    $status = $k['STAT'];
    $deskripsi = $k['DESKRIPSI'];
    $diskon = $k['NM_DISKON'];
    $date = $k['DATE_KLS'];
    $last = $k['UPDATE_KLS'];
    $gambar = $k['GBR_KLS'];
    $jmldis = $k['DISKON'];
    $iddis = $k['ID_DISKON'];
    $id_adm = $k['NM_ADM'];
  ?>

  <!-- Modal Detail Data -->
  <div class="modal fade" id="modal-detail<?= $id; ?>">
  	<div class="modal-dialog modal-lg">
  		<div class="modal-content">
  			<div class="modal-header">
  				<h4 class="modal-title tittlekls">Detail <?= $tittle; ?></h4>
  				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  					<span aria-hidden="true">&times;</span>
  				</button>
  			</div>
  			<form method="POST" action="<?= base_url('admin/kelas/editkls'); ?>" class="form-editkls"
  				enctype="multipart/form-data">
  				<div class="card-body">
  					<div class="row">
  						<div class="col-sm-6">
  							<div class="float-left">
  								<img class="img-fluid img-responsive img-rounded shadow"
  									src="<?= base_url(); ?>assets/dist/img/kelas/<?= $k['GBR_KLS']; ?>"
  									alt="User profile picture" width="300px">
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

  								<!-- <label for="harga">Diskon Kelas: </label>
                    <?php if ($iddis == 0) : ?>
                      <span class="badge-pill bg-secondary text-bold btn-block text-center">Tidak Ada Diskon</span>
                    <?php else : ?>
                      <span class="badge-pill bg-info text-bold btn-block text-center"><?= $diskon; ?> (<?= $jmldis * 100; ?>%)</span>
                    <?php endif; ?> -->

  								<label for="harga">Kategori Kelas: </label>
  								<span
  									class="badge-pill bg-warning text-bold btn-block text-center"><?= $kategori; ?></span>

  								<label for="harga">Disusun oleh: </label>
  								<span
  									class="badge-pill bg-gray text-bold btn-block text-center"><?= $id_adm; ?></span>

  								<label for="harga">Link Kelas: </label>
  								<a href="<?= $link; ?>" class="btn btn-primary btn-block text-bold">Akses Kelas</a>
  							</div>
  						</div>
  					</div>
  					<hr>
  					<div class="row">
  						<input type="text" class="form-control text-bold" id="idkls" name="id" value="<?= $id; ?>"
  							hidden>
  						<div class="col-md-6 row-idkls">
  							<div class="form-group">
  								<label for="id">Id</label>
  								<input type="text" class="form-control text-bold" id="id" value="<?= $id; ?>"
  									disabled>
  							</div>
  						</div>
  						<div class="col-md-6">
  							<div class="form-group">
  								<label for="namakls">Nama Kelas</label>
  								<input type="text" class="form-control text-bold" id="inkls" name="namakls"
  									placeholder="Nama Kelas" value="<?= $namakls; ?>" disabled required>
  								<?= form_error('namakls', '<small class="text-danger">', '</small>'); ?>
  							</div>
  						</div>
  						<div class="col-md-6 row-ktgkls" hidden>
  							<div class="form-group">
  								<label for="ktg">Kategori Kelas</label>
  								<select name="ktg" id="inkls" class="custom-select slct-ktg text-bold" required>

  								</select>
  							</div>
  						</div>
  					</div>
  					<div class="row">
  						<div class="col-md-6 tgl_mulai1">
  							<div class="form-group">
  								<label for="tgl_mulai1">Tanggal Mulai</label>
  								<input type="text" class="form-control" name="tgl_mulai1"
  									value="<?= date('d F Y', strtotime($tgl_mulai)); ?>" disabled>
  							</div>
  						</div>
  						<div class="col-md-6 tgl_mulai" hidden>
  							<div class="form-group">
  								<label for="tgl_mulai">Tanggal Mulai</label>
  								<input type="date" class="form-control" name="tgl_mulai" required>
  							</div>
  						</div>
  						<div class="col-md-6 tgl_selesai1">
  							<div class="form-group">
  								<label for="tgl_selesai1">Tanggal Selesai</label>
  								<input type="text" class="form-control" name="tgl_selesai1"
  									value="<?= date('d F Y', strtotime($tgl_selesai)); ?>" disabled>
  							</div>
  						</div>
  						<div class="col-md-6 tgl_selesai" hidden>
  							<div class="form-group">
  								<label for="tgl_selesai">Tanggal Selesai</label>
  								<input type="date" class="form-control" name="tgl_selesai" required>
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
  									<option value="Online Class">Online Class</option>
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
  									<option value="3 Hari (Senin-Rabu)">3 Hari (Senin-Rabu)</option>
  									<option value="4 Hari (Senin-Kamis)">4 Hari (Senin-Kamis)</option>
  									<option value="5 Hari (Senin-Jumat)">5 Hari (Senin-Jumat)</option>
  									<option value="6 Hari (Senin-Sabtu)">6 Hari (Senin-Sabtu)</option>
  									<option value="7 Hari (Senin-Minggu)">7 Hari (Senin-Minggu)</option>
  								</select>
  							</div>
  						</div>
  					</div>
  					<div class="row">
  						<div class="col-md-12 edit1">
  							<div class="form-group">
  								<label for="harga">Harga</label>
  								<input type="number" class="form-control text-bold" id="inkls" name="harga"
  									placeholder="harga" value="<?= $harga; ?>" disabled required>
  								<?= form_error('harga', '<small class="text-danger">', '</small>'); ?>
  							</div>
  						</div>
  						<div class="col-md-6 edit" hidden>
  							<div class="form-group">
  								<label for="harga">Harga</label>
  								<input type="number" class="form-control text-bold" id="inkls" name="harga"
  									placeholder="harga" value="<?= $harga; ?>" disabled required>
  								<?= form_error('harga', '<small class="text-danger">', '</small>'); ?>
  							</div>
  						</div>
  						<input type="text" value="<?= $gambar; ?>" name="old" hidden>
  						<div class="col-md-6 edit" hidden>
  							<div class="form-group">
  								<label for="email">Edit Gambar</label>
  								<div class="input-group mb-3">
  									<div class="custom-file">
  										<input type="file" class="custom-file-input" id="gbrkls" name="gbrkls"
  											aria-describedby="inputGroupFileAddon01">
  										<label class="custom-file-label" for="gbrkls">Pilih file...</label>
  									</div>
  								</div>
  							</div>
  						</div>
  						<!-- <div class="col-md-6 row-hrgdiskon">
                  <div class="form-group">
                    <label for="harga">Harga Diskon</label>
                    <input type="number" class="form-control text-bold text-success" id="inkls" name="harga" placeholder="harga" value="<?= $harga - ($harga * $jmldis); ?>" disabled required>
                    <?= form_error('harga', '<small class="text-danger">', '</small>'); ?>
                  </div>
                </div> -->
  						<!-- <div class="col-md-6 row-diskon" hidden>
                  <div class="form-group">
                    <label for="diskon">Diskon</label>
                    <select name="diskon" id="inkls" class="custom-select slct-diskon text-bold" disabled>

                    </select>
                  </div>
                </div> -->
  					</div>
  					<div class="row edit-link">
  						<div class="col-md-12">
  							<div class="form-group">
  								<label for="hp">Edit Link Kelas</label>
  								<input type="text" class="form-control text-bold" id="inkls" name="link"
  									placeholder="link" value="<?= $link; ?>" required disabled>
  								<?= form_error('link', '<small class="text-danger">', '</small>'); ?>
  							</div>
  						</div>
  					</div>
  					<div class="row">
  						<div class="col-md-12">
  							<div class="form-group">
  								<label for="email">Deskripsi</label>
  								<textarea class="form-control text-bold inkls" id="compose-textarea" name="deskripsi"
  									style="weight: 300px" required><?= $deskripsi; ?></textarea>
  								<?= form_error('deskripsi', '<small class="text-danger">', '</small>'); ?>
  							</div>
  						</div>
  					</div>
  					<div class="row">
  						<div class="col-md-6">
  							<?php if ($date == 0) : ?>
  							<b>Dibuat pada tanggal:</b> <span class="badge-pill bg-secondary text-bold">--</span>
  							<?php else : ?>
  							<b>Dibuat pada tanggal:</b> <span
  								class="badge-pill bg-primary text-bold"><?= date('d F Y', $date); ?></span>
  							<?php endif; ?>
  						</div>
  						<div class="col-md-6">
  							<?php if ($last == 0) : ?>
  							<b>Terakhir diupdate tanggal:</b> <span
  								class="badge-pill bg-secondary text-bold">--</span>
  							<?php else : ?>
  							<b>Terakhir diupdate tanggal:</b> <span
  								class="badge-pill bg-warning text-bold"><?= date('d F Y', $last); ?></span>
  							<?php endif; ?>
  						</div>
  					</div>
  				</div>
  				<div class="modal-footer justify-content-right">
  					<button type="button" class="btn btn-danger" id="cancel-kls" data-dismiss="modal"><i
  							class="fas fa-arrow-circle-left"></i> Tutup</button>
  					<button type="button" class="btn btn-primary" id="edit-kls"><i class="fas fa-edit"></i>
  						Edit</button>
  					<button type="submit" class="btn btn-primary" id="save-kls" hidden><i class="fas fa-save"></i>
  						Simpan</button>
  				</div>
  			</form>
  		</div>
  		<!-- /.modal-content -->
  	</div>
  	<!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <!-- Modal Hapus Data -->
  <div class="modal fade" id="modal-hapus<?= $id; ?>">
  	<div class="modal-dialog">
  		<div class="modal-content">
  			<div class="modal-header">
  				<h4 class="modal-title">Hapus <?= $tittle; ?></h4>
  				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  					<span aria-hidden="true">&times;</span>
  				</button>
  			</div>
  			<form action="<?= base_url('admin/kelas/hapuskls'); ?>" method="POST">
  				<div class="modal-body">
  					<p>Apakah anda yakin ingin menghapus data dari <b><?= $namakls; ?></b>?</p>
  					<input type="hidden" name="id" value="<?= $id; ?>">
  				</div>
  				<div class="modal-footer justify-content-between">
  					<button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
  					<button type="submit" class="btn btn-danger">Ya</button>
  				</div>
  			</form>
  		</div>
  		<!-- /.modal-content -->
  	</div>
  	<!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <!-- Modal Draft Data -->
  <div class="modal fade" id="modal-blok<?= $id; ?>">
  	<div class="modal-dialog">
  		<div class="modal-content">
  			<div class="modal-header">
  				<h4 class="modal-title">Draft <?= $tittle; ?></h4>
  				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  					<span aria-hidden="true">&times;</span>
  				</button>
  			</div>
  			<form action="<?= base_url('admin/kelas/draftkls'); ?>" method="POST">
  				<div class="modal-body">
  					<p>Apakah anda yakin ingin mendraft data kelas <b><?= $namakls; ?></b>?</p>
  					<input type="hidden" name="id" value="<?= $id; ?>">
  				</div>
  				<div class="modal-footer justify-content-between">
  					<button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
  					<button type="submit" class="btn btn-danger">Ya</button>
  				</div>
  			</form>
  		</div>
  		<!-- /.modal-content -->
  	</div>
  	<!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <!-- Modal Unblok Data -->
  <div class="modal fade" id="modal-unblok<?= $id; ?>">
  	<div class="modal-dialog">
  		<div class="modal-content">
  			<div class="modal-header">
  				<h4 class="modal-title">Publish <?= $tittle; ?></h4>
  				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  					<span aria-hidden="true">&times;</span>
  				</button>
  			</div>
  			<form action="<?= base_url('admin/kelas/publishkls'); ?>" method="POST">
  				<div class="modal-body">
  					<p>Apakah anda yakin ingin mempublish data <b><?= $namakls; ?></b>?</p>
  					<input type="hidden" name="id" value="<?= $id; ?>">
  				</div>
  				<div class="modal-footer justify-content-between">
  					<button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
  					<button type="submit" class="btn btn-danger">Ya</button>
  				</div>
  			</form>
  		</div>
  		<!-- /.modal-content -->
  	</div>
  	<!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
  <?php endforeach; ?>
