<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?> | SigeBank</title>
    <link rel="stylesheet" href="<?= base_url('template/') ?>assets/css/main/app.css">
    <link rel="stylesheet" href="<?= base_url('template/') ?>assets/css/pages/auth.css">
    <link rel="shortcut icon" href="<?= base_url('template/') ?>assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="<?= base_url('template/') ?>assets/images/logo/favicon.png" type="image/png">
    <!-- sweet alert -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-default@4/default.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
</head>

<body class="bg-success">
    <?php if (session()->getFlashdata('pesan')) { ?>
        <script>
            Swal.fire(
                'Gagal!',
                '<?= session()->getFlashdata('pesan') ?>',
                'error'
            )
        </script>
    <?php } ?>
    <div id="auth">

        <div class="row h-100 text-center d-flex justify-content-center">
            <div class="col-lg-8 col-12">
                <div id="auth-left">

                    <div class="card">
                        <div class="card-header">
                            <h4>Login Sige-Bank</h4>
                            <img src="<?= base_url('assets/logo.jpg') ?>" alt="logo sigebank" class="w-25">
                        </div>
                        <div class="card-body">
                            <?php
                            $errors = session()->getFlashdata('errors');
                            if (!empty($errors)) { ?>
                                <div class="alert alert-danger" role="alert">
                                    <ul>
                                        <?php foreach ($errors as $key => $value) { ?>
                                            <li><?= esc($value); ?></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            <?php  } ?>
                            <form action="<?= base_url('login') ?>" method="post">
                                <div class="form-group position-relative has-icon-left mb-4">
                                    <input type="text" name="username" class="form-control form-control-xl" placeholder="Username">
                                    <div class="form-control-icon">
                                        <i class="bi bi-person"></i>
                                    </div>
                                </div>
                                <div class="form-group position-relative has-icon-left mb-4">
                                    <input type="password" name="password" class="form-control form-control-xl" placeholder="Password">
                                    <div class="form-control-icon">
                                        <i class="bi bi-shield-lock"></i>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success btn-block btn-lg shadow-lg mt-5">Log in</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</body>

</html>