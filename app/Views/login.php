<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SanityMate | <?= $judul ?></title>
    <!-- Google Font: Source Sans Pro -->

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->

    <link rel="stylesheet" href="<?= base_url() ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->

    <link rel="stylesheet" href="<?= base_url() ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->

    <link rel="stylesheet" href="<?= base_url() ?>/dist/css/adminlte.min.css">


    <link rel="shortcut icon" type="image/png" href="<?= base_url() ?>/favicon.png">

</head>

<body class="hold-transition login-page">

    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-secondary">
            <div class="card-header text-center">
                <p class="h1"><b>SanityMate</b><br>Login</p>
                <img src="<?= base_url('/img/login.png') ?>" width='250px' alt="Logo login"
                    class="img-fluid mx-auto d-block">
            </div>
            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger" role="alert">
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>
            <div class="card-body">
                <b>
                    <p class="login-box-msg">Silahkan Login Terlebih Dahulu</p>
                </b><br>
                <?= form_open('auth/login') ?>
                <div class="input-group mb-3">
                    <input name="login" id="login" type="text" class="form-control" placeholder="Username atau Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input name="password" id="password" type="password" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-secondary btn-block">Login</button>
                    </div>
                    <!-- /.col -->
                </div>
                <?= form_close(); ?>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->

    <script src="<?= base_url() ?>/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->

    <script src="<?= base_url() ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->

    <script src="<?= base_url() ?>/dist/js/adminlte.min.js"></script>

</body>

</html>