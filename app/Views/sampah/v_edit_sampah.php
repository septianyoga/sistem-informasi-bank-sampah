<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>


<div class="page-heading">
    <h3>Edit Sampah</h3>
</div>
<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <span>Edit Data Sampah</span>
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
                <form action="<?= base_url('kelola_sampah/proses_edit') ?>" method="post">
                    <input type="hidden" name="id_sampah" value="<?= $data['id_sampah'] ?>">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="helperText">Nama Bank Sampah</label>
                                <fieldset class="form-group">
                                    <select name="id_bank_sampah" class="form-select" id="basicSelect">
                                        <?php foreach ($bank_sampah as $val) { ?>
                                            <option value="<?= $val['id_bank_sampah'] ?>" <?= $data['id_bank_sampah'] == $val['id_bank_sampah'] ? 'selected' : '' ?>><?= $val['nama_bank'] ?></option>
                                        <?php } ?>
                                    </select>
                                </fieldset>
                            </div>
                            <div class="form-group">
                                <label for="basicInput">Jumlah</label>
                                <input type="number" name="jumlah_sampah" class="form-control" id="basicInput" placeholder="Masukan Jumlah Sampah" value="<?= $data['jumlah_sampah'] ?>">
                            </div>

                            <div class="form-group">
                                <label for="helpInputTop">Berat dalam kilogram</label>
                                <input type="number" name="berat_sampah" class="form-control" id="helpInputTop" placeholder="Masukan Berat Sampah" value="<?= $data['berat_sampah'] ?>">
                            </div>

                            <div class="form-group">
                                <label for="helperText">Jenis</label>
                                <fieldset class="form-group">
                                    <select name="jenis" class="form-select" id="basicSelect">
                                        <option value="Organik" <?= $data['jenis'] == 'Organik' ? 'selected' : '' ?>>Organik</option>
                                        <option value="Anorganik" <?= $data['jenis'] == 'Anorganik' ? 'selected' : '' ?>>Anorganik</option>
                                    </select>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                    <a href="<?= base_url('kelola_sampah') ?>" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-success ml-1" data-bs-dismiss="modal">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Edit</span>
                    </button>
                </form>
            </div>
        </div>

    </section>
</div>
<?php $this->endSection(); ?>