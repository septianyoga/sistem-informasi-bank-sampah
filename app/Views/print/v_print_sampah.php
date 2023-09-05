<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<style>
    @media print {
        .print {
            display: none;
        }
    }
</style>

<div class="page-heading">
    <h3>Data Sampah</h3>
</div>
<div class="page-content">
    <section class="section">
        <div class="card" id="printArea">
            <div class="card-header ">
                <span id="judul">Print Sampah</span>
            </div>
            <div class="card-body">
                <form action="<?= base_url('print_sampah') ?>" method="get">
                    <div class="row">
                        <div class="col-12 col-lg-3">
                            <div class="form-group">
                                <label for="basicInput">Dari Tanggal</label>
                                <input type="date" name="dari" class="form-control" id="basicInput" placeholder="Masukan Jumlah Sampah per Trashbag" value="<?= isset($_GET['dari']) ? $_GET['dari'] : date('Y-m-d') ?>">
                            </div>
                        </div>
                        <div class="col-12 col-lg-3">
                            <div class="form-group">
                                <label for="basicInput">Sampah Tanggal</label>
                                <input type="date" name="sampai" class="form-control" id="basicInput" placeholder="Masukan Jumlah Sampah per Trashbag" value="<?= isset($_GET['sampai']) ? $_GET['sampai'] : date('Y-m-d') ?>">
                            </div>
                        </div>
                        <div class="col-12 col-lg-3 d-flex align-items-center ">
                            <button type="submit" class="btn btn-success print"><i class="bi bi-search"></i> Cari</button>
                        </div>
                    </div>
                </form>
                <?php if (isset($_GET['dari'])) { ?>
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Bank Sampah</th>
                                <th>Jumlah Sampah</th>
                                <th>Berat Sampah</th>
                                <th>Jenis Sampah</th>
                                <th>Status</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <?php
                        $no = 1;
                        foreach ($data as $row) { ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $row['nama_bank'] ?></td>
                                <td><?= $row['jumlah_sampah'] ?></td>
                                <td><?= $row['berat_sampah'] ?></td>
                                <td><?= $row['jenis'] ?></td>
                                <td><?= $row['status'] ?></td>
                                <td><?= $row['tanggal_sampah'] ?></td>
                            </tr>
                        <?php } ?>
                        <tbody>
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-end">
                        <!-- <a target="_blank" href="<?= base_url('print_sampah/print') ?>" class="btn btn-primary">Print</a> -->
                        <button class="btn btn-primary print" onclick="printSampah()">Print</button>
                    </div>
                <?php } ?>
            </div>
        </div>

    </section>
</div>

<script>
    function printSampah() {
        $('.print').addClass('d-none');
        $('.dataTable-top').addClass('d-none');
        $('#judul').addClass('d-flex justify-content-center fs-4 fw-bolder')
        var printContent = document.getElementById('printArea').innerHTML;
        var originalContent = document.body.innerHTML;
        document.body.innerHTML = printContent;
        window.print();
        document.body.innerHTML = originalContent;
        window.location.reload();
        // window.onbeforeprint = function() {
        //     alert('tes')
        // }
    }
</script>
<?php $this->endSection(); ?>