<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?> | SigeBank</title>

    <link rel="stylesheet" href="<?= base_url('template/') ?>assets/css/main/app.css">
    <link rel="stylesheet" href="<?= base_url('template/') ?>assets/css/main/app-dark.css">
    <link rel="shortcut icon" href="<?= base_url('assets/logo.ico') ?>" type="image/png">

    <link rel="stylesheet" href="<?= base_url('template/') ?>assets/css/shared/iconly.css">
    <link rel="stylesheet" href="<?= base_url('template/') ?>assets/extensions/simple-datatables/style.css">
    <link rel="stylesheet" href="<?= base_url('template/') ?>assets/css/pages/simple-datatables.css">
    <script src="<?= base_url('template/') ?>assets/extensions/jquery/jquery.min.js"></script>
    <!-- sweet alert -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-default@4/default.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <style>
    </style>
</head>

<body>
    <?php if (session()->getFlashdata('pesan')) { ?>
        <script>
            Swal.fire(
                'Berhasil!',
                '<?= session()->getFlashdata('pesan') ?>',
                'success'
            )
        </script>
    <?php } ?>
    <?php if (session()->getFlashdata('error')) { ?>
        <script>
            Swal.fire(
                'Gagal!',
                '<?= session()->getFlashdata('error') ?>',
                'error'
            )
        </script>
    <?php } ?>
    <div id="app">
        <?= $this->include('layout/nav'); ?>

        <div class="ps-3 pe-3">
            <?= $this->renderSection('content'); ?>
            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>Copyright <script>
                                document.write(new Date().getFullYear())
                            </script> &copy; SigeBank.</p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    </div>
    <script src="<?= base_url('template/') ?>assets/js/bootstrap.js"></script>
    <script src="<?= base_url('template/') ?>assets/js/app.js"></script>

    <!-- Need: Apexcharts -->
    <!-- <script src="<?= base_url('template/') ?>assets/extensions/apexcharts/apexcharts.min.js"></script> -->
    <script src="<?= base_url('template/') ?>assets/js/pages/dashboard.js"></script>
    <script src="<?= base_url('template/') ?>assets/extensions/simple-datatables/umd/simple-datatables.js"></script>
    <script src="<?= base_url('template/') ?>assets/js/pages/simple-datatables.js"></script>

</body>

</html>