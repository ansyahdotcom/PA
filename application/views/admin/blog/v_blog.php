<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Blog</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard'); ?>">Home</a></li>
						<li class="breadcrumb-item active">Blog</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
		<?= $this->session->flashdata('message'); ?>
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<!-- <h3 class="card-title">Tabel Blog</h3> -->
						<div class="text-right">
							<a class="btn btn-primary" href="<?= base_url('admin/blog/tulis_blog');?>">Tulis artikel</a>
						</div>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<table id="example2" class="table table-bordered table-hover">
							<thead>
								<tr>
									<th class="col-1">Nomor</th>
									<th>Judul</th>
									<th>Kategori</th>
									<th>Tags</th>
									<th>Isi</th>
									<th>Action</th>
								</tr>
							</thead>
							<?php 
                                $i = 1;
                            	foreach($blog as $blg){ ?>
							<tbody>
								<tr>
									<td align="center"><?= $i++; ?></td>
									<td><?= $blg->JUDUL_POST; ?></td>
									<td><?= $blg->NM_CT; ?></td>
									<td><?= $blg->NM_TAGS; ?></td>
									<td><textarea name="" id="" rows="5" disabled><?= $blg->KONTEN_POST; ?></textarea></td>
									<td>
										<button type="button" id="edit_status" class="btn btn-warning btn-xs btn-round"
											data-toggle="modal"
											data-target="#modal_edit_status'.$pnd->ID_PND.'">Posting</button>
										<button type="button" id="edit_status" class="btn btn-primary btn-xs btn-round"
											data-toggle="modal"
											data-target="#modal_edit_status'.$pnd->ID_PND.'">Ubah</button>
										<button type="button" id="edit_status" class="btn btn-danger btn-xs btn-round"
											data-toggle="modal"
											data-target="#modal_edit_status'.$pnd->ID_PND.'">Hapus</button>
										
									</td>
								</tr>
							</tbody>
							<?php } ?>
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
