<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>


<div class="page-heading">
    <h3>Data Sampah</h3>
</div>
<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <span>Kelola Sampah</span>
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
                <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Bank Sampah</th>
                            <th>Jumlah Sampah</th>
                            <th>Berat Sampah</th>
                            <th>Jenis Sampah</th>
                            <th>Status</th>
                            <th class="text-center">Opsi</th>
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
                            <td class="text-center">
                                <a href="<?= base_url('kelola_sampah/' . $row['id_sampah']) ?>" class="btn btn-info btn-sm"><i class="bi bi-pen"></i> Edit</a>
                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#verif-<?= $row['id_sampah'] ?>"><i class="bi bi-trash"></i> Hapus</button>
                            </td>
                        </tr>
                    <?php } ?>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>

<?php foreach ($data as $val) { ?>
    <div class="modal fade text-left" id="verif-<?= $val['id_sampah'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel1">Basic Modal</h5>
                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah anda yakin ingin menghapus sampah <?= $val['nama_bank'] ?> dengan berat <?= $val['berat_sampah'] ?> kg ?</p>
                    <form action="<?= base_url('kelola_sampah/hapus') ?>" method="post" id="form-sampah-<?= $val['id_sampah'] ?>">
                        <input type="hidden" name="id_sampah" value="<?= $val['id_sampah'] ?>">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button type="submit" class="btn btn-danger ml-1" data-bs-dismiss="modal" onclick="document.getElementById('form-sampah-<?= $val['id_sampah'] ?>').submit();">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Hapus</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php $this->endSection(); ?>