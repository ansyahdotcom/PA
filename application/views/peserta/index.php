<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Dashboard</h1>
          <!-- <input type="email" name="em" id="em" value="<?= $this->session->userdata('email'); ?>"> -->
        </div><!-- /.col -->
        <!-- <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard v1</li>
              </ol>
            </div>/.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
  </div>
  <!-- /.content-header -->
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row justify-content-center">
        <div class="col-sm-12">
          <div class="alert alert-primary alert-sm" role="alert">
            <div class="row">
              <div class="col-sm-10">
                <h5 class="alert-heading">Selamat Datang!</h5>
                <p>Halo, <?= $peserta['NM_PS']; ?> anda login sebagai <?php if ($this->session->userdata('role') == 2) {
                                                                        echo "Peserta";
                                                                      } ?>. Jika kamu telah membayar dan belum diproses oleh admin, bisa hubungi CS.</p>
              </div>
              <div class="col-sm-2">
                <img" src="<?= base_url(); ?>assets/dist/img/program/study.svg" width="100" alt="halo">
              </div>
            </div>
            <hr>
            <p class="mb-0">Untuk mengetahui mekanisme pembelajaran bisa menggunakan FAQ, atau download panduan melaui <a href="#">link ini</a>.</p>
          </div>
        </div>
        <div class="col-lg-4 col-6">
          <!-- small box -->
          <div class="small-box bg-light shadow">
            <div class="inner">
              <h3>0</h3>
              <p class="text-uppercase">
                <center>Sertifikat</center>
              </p>
            </div>
            <div class="icon">
              <i class="fas fa-certificate"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-6">
          <!-- small box -->
          <div class="small-box bg-light shadow">
            <div class="inner">
              <h3>0</h3>
              <p>
                <center>Transaksi</center>
              </p>
            </div>
            <div class="icon">
              <i class="fas fa-shopping-cart"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-6">
          <!-- small box -->
          <div class="small-box bg-light shadow">
            <div class="inner">
              <h3>0</h3>
              <p>
                <center>Beli Kelas</center>
              </p>
            </div>
            <div class="icon">
              <i class="fab fa-leanpub"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- ./col -->

      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-5 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="card">
            <div class="card-header text-center">
              <a href="<?= base_url() ?>peserta/dashboard">
                <div class="kelas">
                  <img src="<?= base_url() ?>assets/icon/noClass.svg" width="350" alt="kelas">
                </div>
                <h5 class="mt-3 mb-3">Belum ada kelas</h5>
              </a>
            </div>
          </div>
          <!-- /.card -->
        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-7 connectedSortable">
          <!-- Map card -->
          <div class="card">
            <div class="card-header text-center">
              <a href="<?= base_url() ?>peserta/dashboard">
                <div class="tugas">
                  <img src="<?= base_url() ?>assets/icon/noList.svg" width="260" alt="tugas">
                </div>
                <h5 class="mt-3 mb-3">Belum ada jadwal</h5>
              </a>
            </div>
          </div>
          <!-- /.card -->
        </section>
      </div>

      <div class="row">
        <section class="col-lg-12 connectedSortable">
          <div class="card">
            <div class="card-header">
              <h4>
                FAQ
              </h4>
              <div class="accordion" id="accordionExample">
                <div class="card">
                  <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                      <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Bagaimana cara untuk mengakses pembelajaran ?
                      </button>
                    </h2>
                  </div>

                  <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header" id="headingTwo">
                    <h2 class="mb-0">
                      <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Bagaimana cara mendapatkan E-Sertifikat ?
                      </button>
                    </h2>
                  </div>
                  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body">
                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                    </div>
                  </div>
                </div>
              </div>
        </section>


        <!-- right col -->
      </div>
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->