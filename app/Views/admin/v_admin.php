<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>


<div class="page-heading">
    <h3>Informasi Bank Sampah</h3>
</div>
<style>
    #map {
        width: 75vw;
        height: 45vw;
        z-index: 1;
    }

    @media (max-width: 991px) {
        #map {
            width: 90vw;
            height: 85vw;
            display: flex;
            justify-content: center;
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

<!-- <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script> -->


<script>
    const map = L.map('map').setView([-6.562107, 107.760549], 14);

    const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        // attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);
    <?php foreach ($bank_sampah as $key => $value) { ?>
        L.marker([<?= $value['koordinat'] ?>]).addTo(map).bindPopup("<b>Nama Bank Sampah : <?= $value['nama_bank'] ?></b><br>Total Berat Sampah : <?= $value['total_berat'] ?> kg");
        // .on('click', function() {})
        // .openPopup();
        // map.on('click', onMapClick);
    <?php } ?>

    function onMapClick(e) {
        alert("You clicked the map at " + e.latlng);
    }
</script>


<?php $this->endSection(); ?>