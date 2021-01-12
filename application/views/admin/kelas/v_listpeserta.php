<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark"><?= $tittle; ?></h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard'); ?>">Home</a></li>
						<li class="breadcrumb-item"><a href="<?= base_url('admin/kelas'); ?>">Data Kelas</a></li>
						<li class="breadcrumb-item active"><?= $tittle; ?></li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
		<div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-12">
				<div class="card">
                    <div class="card-header bg-dark">
                        <h3 class="card-title float-left text-bold">Kelas <?= $nmkelas['TITTLE']; ?></h3>
						<a href="<?= base_url('admin/kelas'); ?>" class="btn btn-primary float-right"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
                    </div>
					<!-- /.card-header -->
					<div class="card-body">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr class="text-center">
									<th>No</th>
									<th>Nama</th>
									<th>Pekerjaan</th>
									<th>Progress Belajar</th>
									<th>Sertifikat</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php $i = 1; ?>
								<?php foreach ($listpeserta as $l) : ?>
									<tr class="justify-content-md-center">
										<td class="text-center" width="100px"><?= $i++ ?></td>
										<td><?= $l['NM_PS']; ?></td>
										<td width="150px"><?= $l['PEKERJAAN']; ?></td>
										<td>
											<div class="progress" style="height: 30px">
												<div class="progress-bar text-bold" role="progressbar" style="width: <?= ($jmltugas*(100/$jmltugas))-(($jmltugas-$submit)*(100/$jmltugas)); ?>%;" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"><?= ($jmltugas*(100/$jmltugas))-(($jmltugas-$submit)*(100/$jmltugas)); ?>%</div>
											</div>
										</td>
										<td class="text-center" width="170px">
											<?php
											$file_sertif = $this->db->get_where('sertifikat', [
												'ID_PS' => $l['ID_PS'],
												'ID_KLS' => $l['ID_KLS']
											])->row_array();

											$progress = ($jmltugas*(100/$jmltugas))-(($jmltugas-$submit)*(100/$jmltugas));
											?>
											<div class="row">
												<div class="col-md-12">
													<?php if ($file_sertif == "" || $progress == 100) : $disabled="" ?>
														<span class="btn btn-sm btn-secondary text-bold">
															<i class="fas fa-file-pdf mr-2"></i>
															Belum Menerima
														</span>
													<?php else : $disabled="disabled" ?>
														<a href="<?= base_url('assets/dist/img/sertifikat/' . $file_sertif['SERTIFIKAT']); ?>" target="_blank" class="btn btn-sm btn-success text-bold">
															<i class="fas fa-file-pdf mr-2"></i>
															Lihat Sertifikat
														</a>
													<?php endif; ?>
												</div>
											</div>
										</td>
										<td class="text-center" width="150px">
											<!-- <div class="row">
												<div class="col-md-12">
													<button class="btn btn-sm btn-primary text-bold btn-block" data-toggle="modal" data-target="#"><i class="fas fa-edit"></i>
														Detail
													</button>
												</div>
											</div> -->
											<div class="row">
												<div class="col-md-12">
													<button class="btn btn-sm btn-warning text-bold btn-block" data-toggle="modal" data-target="#modal_hapus<?= $l['ID_PS']; ?>" <?= $disabled; ?>><i class="fas fa-certificate"></i>
														Upload Sertifikat
													</button>
												</div>
											</div>
										</td>
									</tr>
								<?php endforeach; ?>
							</tbody>
							<tfoot>
								<tr class="text-center">
									<th>No</th>
									<th>Nama</th>
									<th>Pekerjaan</th>
									<th>Progress Belajar</th>
									<th>Sertifikat</th>
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

<?php foreach ($listpeserta as $l) : ?>
	<!-- Modal upload sertifikat -->
	<div class="modal fade" id="modal_hapus<?= $l['ID_PS']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title" id="myModalLabel">Upload Sertifikat</h3>
				</div>
				<?php echo form_open_multipart('admin/kelas/sertifikat/' . $l['ID_KLS']); ?>
				<input type="hidden" name="idps" value="<?= $l['ID_PS']; ?>">
				<div class="modal-body">
					<div class="form-group">
						<label for="nama">Nama Peserta</label>
						<input type="nama" class="form-control" name="nama" value="<?= $l['NM_PS']; ?>" disabled>
						<?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
					</div>
					<div class="form-group">
						<label for="email">Sertifikat</label>
						<div class="input-group">
							<div class="custom-file">
								<input type="file" class="custom-file-input" name="sertif">
								<label class="custom-file-label" for="sertif">Pilih file...</label>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Batal</button>
					<button class="btn btn-primary">Simpan</button>
				</div>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
<?php endforeach; ?>