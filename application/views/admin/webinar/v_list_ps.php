<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<?php foreach ($list_ps as $list) { ?>
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">List Peserta Webinar <?= str_replace('-', ' ', $list->JUDUL_WEBINAR); ?>
					</h1>
				</div><!-- /.col -->
				<?php } ?>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard'); ?>">Home</a></li>
						<li class="breadcrumb-item active">List Peserta</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
		<div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<section class="content">
		<div class="card">
			<div class="card-header">
			</div>
			<div class="row">
				<div class="col-12">
					<div class="card">
						<!-- /.card-header -->
						<div class="card-body">
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr class="text-center">
										<th>No</th>
										<th>Nama</th>
										<th>Pekerjaan</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1; ?>
									<?php foreach ($list_ps as $list) {
                                ?>
									<tr>
										<td class="text-center" width="100px"><?= $no++ ?></td>
										<td><?= $list->NM_PS; ?></td>
										<td><?= $list->PEKERJAAN; ?></td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
				<!-- /.col -->
			</div>
		</div>
		<!-- /.row -->
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->
