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
						<li class="breadcrumb-item"><a href="#">Home</a></li>
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
						<h3 class="card-title">Tabel Blog</h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<table id="example2" class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>Nomor</th>
									<th>Judul</th>
                                    <th>Kategori</th>
                                    <th>Post</th>
								</tr>
                            </thead>
                            <?php 
                                $i = 1;
                            ?>
                            <tbody>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td></td>
                                    <td></td>
                                    <td><input type="checkbox" name="" id=""></td>
                                </tr>
                            </tbody>
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
