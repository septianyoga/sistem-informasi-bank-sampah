<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?> | SigeBank</title>

    <link rel="stylesheet" href="<?= base_url('template/') ?>assets/css/main/app.css">
    <link rel="shortcut icon" href="<?= base_url('assets/logo.ico') ?>" type="image/png">

    <link rel="stylesheet" href="<?= base_url('template/') ?>assets/css/shared/iconly.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

</head>

<body class="overflow-hidden">
    <div id="app">
        <div id="main" class="layout-horizontal">
            <header class="">
                <div class="header-top bg-success">
                    <div class="container">
                        <div class="logo d-flex align-items-center">
                            <a href="index.html"><img src="<?= base_url('assets/logo-no-bg.png') ?>" style="width: 100%; height: 50px;" alt="Logo"></a>
                            <h3 class="text-white mt-2 judul">Sistem Informasi Geografis Bank Sampah</h3>
                        </div>
                        <div class="header-top-right">

                            <a href="<?= base_url('login') ?>" class="btn btn-light">Login</a>
                            <!-- Burger button responsive -->
                        </div>
                    </div>
                </div>
            </header>

            <div class="content-wrapper ">
                <style>
                    #map {
                        width: 100%;
                        height: 85vh;
                        z-index: 1;
                    }

                    @media (max-width: 991px) {
                        #map {
                            width: 100%;
                            height: 175vw;
                            display: flex;
                            justify-content: center;
                        }

                        body {
                            overflow-x: hidden;
                        }

                        .judul {
                            font-size: 2vh;
                        }
                    }
                </style>
                <div class="page-content">
                    <div class="row" id="gis">
                        <div class="col-12 d-flex jusitfy-content-center">
                            <div id="map"></div>
                        </div>
                    </div>
                </div>

            </div>

            <footer>
                <div class="container">
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
    <script src="<?= base_url('template/') ?>assets/js/bootstrap.js"></script>
    <script src="<?= base_url('template/') ?>assets/js/app.js"></script>
    <script src="<?= base_url('template/') ?>assets/js/pages/dashboard.js"></script>
    <script>
        const map = L.map('map').setView([-6.562107, 107.760549], 14);

        const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            // attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);
        <?php foreach ($bank_sampah as $key => $value) { ?>
            L.marker([<?= $value['koordinat'] ?>]).addTo(map).bindPopup("<b>Nama Bank Sampah : <?= $value['nama_bank'] ?></b><br>Total Berat Sampah : <?= $value['total_berat'] ?> kg");
        <?php } ?>
    </script>
</body>

</html>