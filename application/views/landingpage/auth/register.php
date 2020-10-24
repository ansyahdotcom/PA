<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/login.css">

    <title>Register Page</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-xl-9 mx-auto">
                <div class="card card-signin flex-row my-5">
                    <div class="card-img-left d-none d-md-flex">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-center">Daftar Akun</h5>
                        <?= $this->session->flashdata('message'); ?>
                        <form class="form-signin" action="<?= base_url('peserta/auth/register'); ?>" method="POST">
                            <div class="form-label-group">
                                <label for="inputUserame">Nama Lengkap</label>
                                <input type="text" id="name" class="form-control" name="name" placeholder="Nama Lengkap" required autofocus>
                            </div>
                            <?= form_error('name', '<small class="text-danger">', '</small>'); ?>

                            <div class="form-label-group mt-3">
                                <label for="inputEmail">Alamat Email</label>
                                <input type="email" id="email" class="form-control" name="email" placeholder="Email" required>
                            </div>
                            <?= form_error('email', '<small class="text-danger">', '</small>'); ?>

                            <!-- <hr> -->

                            <div class="form-label-group mt-3">
                                <label for="inputPassword">Kata Sandi</label>
                                <input type="password" id="password" class="form-control" name="password" placeholder="Password" required>
                            </div>
                            <?= form_error('password', '<small class="text-danger">', '</small>'); ?>

                            <div class="form-label-group mt-3">
                                <label for="inputConfirmPassword">Konfirmasi Kata Sandi</label>
                                <input type="password" id="password1" class="form-control" name="password1" placeholder="Konfirmasi Password" required>
                            </div>
                            <?= form_error('password1', '<small class="text-danger">', '</small>'); ?>

                            <div class="mt-3">
                                <button class="btn btn-lg btn-primary btn-block" type="submit">Daftar</button>
                            </div>
                            <a class="d-block text-center mt-2 small" href="<?= base_url('peserta/auth/login'); ?>">Sudah punya akun?</a>
                            <a class="d-block text-center mt-2 small" href="forgot.html">Lupa kata sandi?</a>
                            <hr class="my-4">
                            <button class="btn btn-lg btn-google btn-block text-uppercase" type="submit"><i class="fab fa-google mr-2"></i> Daftar dengan Google</button>
                            <button class="btn btn-lg btn-facebook btn-block text-uppercase" type="submit"><i class="fab fa-facebook-f mr-2"></i> Daftar dengan Facebook</button>
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