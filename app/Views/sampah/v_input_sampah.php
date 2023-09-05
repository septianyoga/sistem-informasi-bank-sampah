<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>


<div class="page-heading">
    <h3>Input Sampah</h3>
</div>
<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <span>Input Data Sampah</span>
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
                <div class="row">
                    <form action="<?= base_url('input_sampah') ?>" method="post">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="helperText">Nama Bank Sampah</label>
                                <fieldset class="form-group">
                                    <select name="id_bank_sampah" class="form-select" id="basicSelect">
                                        <option value="">-- Pilih --</option>
                                        <?php foreach ($data as $row) { ?>
                                            <option value="<?= $row['id_bank_sampah'] ?>"><?= $row['nama_bank'] ?></option>
                                        <?php } ?>
                                    </select>
                                </fieldset>
                            </div>
                            <div class="form-group">
                                <label for="basicInput">Jumlah Sampah per Trashbag</label>
                                <input type="number" name="jumlah_sampah" class="form-control" id="basicInput" placeholder="Masukan Jumlah Sampah per Trashbag">
                            </div>
                            <div class="form-group">
                                <label for="basicInput">Berat Sampah (kg)</label>
                                <input type="number" name="berat_sampah" class="form-control" id="basicInput" placeholder="Masukan Berat dalam Kilogram">
                            </div>
                            <div class="form-group">
                                <label for="helperText">Jenis Sampah</label>
                                <fieldset class="form-group">
                                    <select name="jenis" class="form-select" id="basicSelect">
                                        <option value="">-- Pilih --</option>
                                        <option value="Organik">Organik</option>
                                        <option value="Anorganik">Anorganik</option>
                                    </select>
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>
</div>

<?php $this->endSection(); ?>