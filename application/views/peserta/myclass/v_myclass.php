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
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Detail Kelas</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body pt-0 mt-2">
                            <div class="row">
                                <div class="col-7">
                                    <h4 class="text-bold"><b><?= $myclass['TITTLE']; ?></b></h4>
                                    <h5 class="text-muted"> <?= $myclass['DESKRIPSI']; ?></h5>
                                    <ul class="ml-4 mb-0 fa-ul text-muted">
                                        <?php
                                        if ($myclass['KTGKLS'] === "Dasar") {
                                            $class = "btn-outline-success";
                                        } elseif ($myclass['KTGKLS'] === "Lanjutan") {
                                            $class = "btn-outline-warning";
                                        } elseif ($myclass['KTGKLS'] === "Advance") {
                                            $class = "btn-outline-danger";
                                        }
                                        ?>
                                    </ul>
                                    <span class="btn <?= $class; ?> btn-block shadow">
                                        <i class="fas fa-lg fa-arrow-circle-up"></i>
                                        <span class="text-bold">
                                            Level:
                                        </span> <?= $myclass['KTGKLS']; ?>
                                    </span>
                                </div>
                                <div class="col-5 text-center">
                                    <img src="<?= base_url('assets/dist/img/kelas/' . $myclass['GBR_KLS']); ?>" alt="" class="img-rounded img-responsive img-fluid shadow-lg">
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <a href="<?= $myclass['PERMALINK']; ?>" type="submit" class="btn btn-primary btn-block text-bold">Akses Kelas</a>
                        </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->

                <!-- Right column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title">Materi & Tugas</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">File input</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="">Upload</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->