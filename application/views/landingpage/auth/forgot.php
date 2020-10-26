<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="./css/login.css">

        <title><?= $tittle; ?></title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-xl-9 mx-auto">
                    <div class="card card-signin flex-row my-5">
                        <div class="card-img-left d-none d-md-flex">
                        </div>
                        <div class="card-body">
                        <h5 class="card-title text-center">Lupa Kata Sandi</h5>
                        <?= $this->session->flashdata('message'); ?>
                        <form class="form-signin text-center" action="<?= base_url('peserta/auth/lupapsw'); ?>" method="POST">
                            <img src="./img/forgot.svg" width="150" alt="lupasandi">
                            <div class="form-label-group text-left">
                                <label for="inputEmail">Alamat Email</label>
                                <input type="email" id="email" class="form-control" name="email" placeholder="Email" required>
                            </div>
                            <?= form_error('email', '<small class="text-danger">', '</small>'); ?>

                            <small class="text-success mt-1">
                                <p>Masukkan Email Anda, Kami akan mengirimkan link untuk mengganti password</p>
                            </small>
                            <button class="btn btn-lg btn-primary btn-block" type="submit">Kirim</button>
                            <a class="d-block text-center mt-2 small" href="<?= base_url('peserta/auth/login'); ?>">Sudah punya akun?</a>
                            <a class="d-block text-center mt-2 small" href="<?= base_url('peserta/auth/register'); ?>">Belum punya akun?</a>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    </body>
</html>